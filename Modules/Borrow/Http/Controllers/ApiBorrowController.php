<?php

namespace Modules\Borrow\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Book\Entities\Book;
use Modules\Borrow\Entities\Borrow;
use Modules\Borrow\Http\Requests\ManageBorrowRequest;
use Modules\Borrow\Http\Requests\CreateBorrowRequest;
use Modules\Borrow\Http\Requests\UpdateBorrowRequest;
use Modules\Borrow\Http\Requests\ShowBorrowRequest;
use Modules\Borrow\Repositories\BorrowRepository;
use Modules\DeliveryFee\Entities\DeliveryFee;

class ApiBorrowController extends Controller
{
 /**
     * @var BorrowRepository
     * @var CategoryRepository
     */
    protected $borrow;

    /**
     * @param BorrowRepository $borrow
     */
    public function __construct(BorrowRepository $borrow)
    {
        $this->borrow = $borrow;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageBorrowRequest $request)
    {
        return view('borrow::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageBorrowRequest $request)
    {
        return view('borrow::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */

    public function store(CreateBorrowRequest $request)
    {
        $items = $request->input('items');
        $errors = [];

        // Check book availability
        foreach ($items as $item) {
            $book = Book::find($item['book_id']);
            if (!$book) {
                $errors[] = "Book ID {$item['book_id']} not found.";
            } elseif ($book->available_quantity < $item['quantity']) {
                $errors[] = "Book Name {$book->book_name} does not have enough available quantity. Requested: {$item['quantity']}, Available: {$book->available_quantity}.";
            }
        }

        if (!empty($errors)) {
            return response()->json([
                'message' => 'One or more books are unavailable in the requested quantity.',
                'errors' => $errors
            ], 422);
        }

        // Prepare borrow data
        $input = $request->all();
        $customer = auth()->user()->customer;

        $data = [
            'customer_id'     => $customer->id,
            'borrow_date'     => $input['borrow_date'],
            'due_date'        => date('Y-m-d', strtotime($input['borrow_date'] . ' +7 days')),
            'used_delivery'   => $input['used_delivery'],
            'payment_method'  => 'COD',
            'delivery_fee'    => $input['used_delivery']
                ? optional(DeliveryFee::where('township_id', $input['delivery_township_id'] ?? $customer->township->id)->first())->amount ?? 0
                : 0,
            'notes'           => $input['notes'] ?? null,
        ];

        // Create borrow record
        $borrow = $this->borrow->create($data);

        // Create borrow items and update book quantities
        foreach ($items as $item) {
            $borrow->borrowItem()->create([
                'borrow_id' => $borrow->id,
                'book_id'   => $item['book_id'],
                'quantity'  => $item['quantity'],
            ]);

            // Reduce the available quantity
            Book::where('id', $item['book_id'])->decrement('available_quantity', $item['quantity']);
        }

        return api_response($borrow, 200);
    }


    /**
     * @param Borrow              $borrow
     * @param ManageBorrowRequest $request
     *
     * @return mixed
     */
    public function edit(Borrow $borrow, ManageBorrowRequest $request)
    {
        return view('borrow::edit')
            ->withBorrow($borrow);
    }

    /**
     * @param Borrow              $borrow
     * @param UpdateBorrowRequest $request
     *
     * @return mixed
     */
    public function update(Borrow $borrow, UpdateBorrowRequest $request)
    {
        $this->borrow->updateById($borrow->id,$request->except('_token','_method'));

        return redirect()->route('admin.borrow.index')->withFlashSuccess(trans('borrow::alerts.backend.borrow.updated'));
    }

    /**
     * @param Borrow              $borrow
     * @param ManageBorrowRequest $request
     *
     * @return mixed
     */
    public function show(Borrow $borrow, ShowBorrowRequest $request)
    {
        return view('borrow::show')->withBorrow($borrow);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Borrow $borrow)
    {
        $this->borrow->deleteById($borrow->id);

        return redirect()->route('admin.borrow.index')->withFlashSuccess(trans('borrow::alerts.backend.borrow.deleted'));
    }
}
