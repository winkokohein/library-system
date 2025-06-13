<?php

namespace Modules\Book\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Book\Repositories\BookRepository;
use Modules\Book\Http\Requests\ManageBookRequest;

class BookTableController extends Controller
{
    /**
     * @var BookRepository
     */
    protected $book;

    /**
     * @param BookRepository $book
     */
    public function __construct(BookRepository $book)
    {
        $this->book = $book;
    }

    /**
     * @param ManageBookRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBookRequest $request)
    {
        return DataTables::of($this->book->getForDataTable())
            // ->editColumn('updated_at', function ($book) {
            //     return $book->updated_at;
            // })
            ->editColumn('author_id', function ($book) {
                return $book->author->name;
            })
            ->editColumn('book_category_id', function ($book) {
                return $book->bookCategory->name;
            })
            ->addColumn('actions', function ($book) {
                return $book->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
