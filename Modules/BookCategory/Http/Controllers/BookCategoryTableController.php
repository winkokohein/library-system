<?php

namespace Modules\BookCategory\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\BookCategory\Repositories\BookCategoryRepository;
use Modules\BookCategory\Http\Requests\ManageBookCategoryRequest;

class BookCategoryTableController extends Controller
{
    /**
     * @var BookCategoryRepository
     */
    protected $bookcategory;

    /**
     * @param BookCategoryRepository $bookcategory
     */
    public function __construct(BookCategoryRepository $bookcategory)
    {
        $this->bookcategory = $bookcategory;
    }

    /**
     * @param ManageBookCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBookCategoryRequest $request)
    {
        return DataTables::of($this->bookcategory->getForDataTable())
            ->editColumn('updated_at', function ($bookcategory) {
                return $bookcategory->updated_at;
            })
            ->addColumn('actions', function ($bookcategory) {
                return $bookcategory->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
