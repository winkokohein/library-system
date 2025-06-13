<?php

namespace Modules\Book\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Book\Entities\Book;
use Modules\Author\Entities\Author;
use Modules\BookCategory\Entities\BookCategory;
use Modules\Book\Http\Requests\ManageBookRequest;
use Modules\Book\Http\Requests\CreateBookRequest;
use Modules\Book\Http\Requests\UpdateBookRequest;
use Modules\Book\Http\Requests\ShowBookRequest;
use Modules\Book\Repositories\BookRepository;

class BookController extends Controller
{
 /**
     * @var BookRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageBookRequest $request)
    {
        return view('book::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageBookRequest $request)
    {
        $authors = Author::all();
        $book_categories = BookCategory::all();
        return view('book::create')->with([
            'authors' => $authors,
            'book_categories' => $book_categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateBookRequest $request)
    {
        $this->book->create($request->except('_token','_method'));
        return redirect()->route('admin.book.index')->withFlashSuccess(trans('book::alerts.backend.book.created'));
    }

    /**
     * @param Book              $book
     * @param ManageBookRequest $request
     *
     * @return mixed
     */
    public function edit(Book $book, ManageBookRequest $request)
    {
        $authors = Author::all();
        $book_categories = BookCategory::all();
        return view('book::edit')
            ->with([
            'authors' => $authors,
            'book_categories' => $book_categories,
            'book' => $book,
        ]);
    }

    /**
     * @param Book              $book
     * @param UpdateBookRequest $request
     *
     * @return mixed
     */
    public function update(Book $book, UpdateBookRequest $request)
    {
        $this->book->updateById($book->id,$request->except('_token','_method'));

        return redirect()->route('admin.book.index')->withFlashSuccess(trans('book::alerts.backend.book.updated'));
    }

    /**
     * @param Book              $book
     * @param ManageBookRequest $request
     *
     * @return mixed
     */
    public function show(Book $book, ShowBookRequest $request)
    {
        return view('book::show')->withBook($book);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Book $book)
    {
        $this->book->deleteById($book->id);

        return redirect()->route('admin.book.index')->withFlashSuccess(trans('book::alerts.backend.book.deleted'));
    }
}
