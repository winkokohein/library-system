<?php

namespace Modules\Borrow\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Borrow\Entities\Borrow;
use Modules\Borrow\Http\Requests\ManageBorrowRequest;
use Modules\Borrow\Http\Requests\CreateBorrowRequest;
use Modules\Borrow\Http\Requests\UpdateBorrowRequest;
use Modules\Borrow\Http\Requests\ShowBorrowRequest;
use Modules\Borrow\Repositories\BorrowRepository;

class BorrowController extends Controller
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
        $this->borrow->create($request->except('_token','_method'));
        return redirect()->route('admin.borrow.index')->withFlashSuccess(trans('borrow::alerts.backend.borrow.created'));
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
