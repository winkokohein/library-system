<?php

namespace Modules\Borrow\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Borrow\Repositories\BorrowRepository;
use Modules\Borrow\Http\Requests\ManageBorrowRequest;

class BorrowTableController extends Controller
{
    /**
     * @var BorrowRepository
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
     * @param ManageBorrowRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBorrowRequest $request)
    {
        return DataTables::of($this->borrow->getForDataTable())
            ->editColumn('customer_id', function ($borrow) {
                return $borrow->customer->name;
            })
            ->editColumn('updated_at', function ($borrow) {
                return $borrow->updated_at;
            })
            ->editColumn('borrow_date', function ($borrow) {
                return explode(' ',$borrow->borrow_date)[0];
            })
            ->editColumn('due_date', function ($borrow) {
                return explode(' ',$borrow->due_date)[0];
            })
            ->addColumn('actions', function ($borrow) {
                return $borrow->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
