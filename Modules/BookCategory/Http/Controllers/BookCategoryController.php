<?php

namespace Modules\BookCategory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\BookCategory\Entities\BookCategory;
use Modules\BookCategory\Http\Requests\ManageBookCategoryRequest;
use Modules\BookCategory\Http\Requests\CreateBookCategoryRequest;
use Modules\BookCategory\Http\Requests\UpdateBookCategoryRequest;
use Modules\BookCategory\Http\Requests\ShowBookCategoryRequest;
use Modules\BookCategory\Repositories\BookCategoryRepository;

class BookCategoryController extends Controller
{
 /**
     * @var BookCategoryRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageBookCategoryRequest $request)
    {
        return view('bookcategory::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageBookCategoryRequest $request)
    {
        return view('bookcategory::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateBookCategoryRequest $request)
    {
        $this->bookcategory->create($request->except('_token','_method'));
        return redirect()->route('admin.bookcategory.index')->withFlashSuccess(trans('bookcategory::alerts.backend.bookcategory.created'));
    }

    /**
     * @param BookCategory              $bookcategory
     * @param ManageBookCategoryRequest $request
     *
     * @return mixed
     */
    public function edit(BookCategory $bookcategory, ManageBookCategoryRequest $request)
    {
        return view('bookcategory::edit')
            ->withBookCategory($bookcategory);
    }

    /**
     * @param BookCategory              $bookcategory
     * @param UpdateBookCategoryRequest $request
     *
     * @return mixed
     */
    public function update(BookCategory $bookcategory, UpdateBookCategoryRequest $request)
    {
        $this->bookcategory->updateById($bookcategory->id,$request->except('_token','_method'));

        return redirect()->route('admin.bookcategory.index')->withFlashSuccess(trans('bookcategory::alerts.backend.bookcategory.updated'));
    }

    /**
     * @param BookCategory              $bookcategory
     * @param ManageBookCategoryRequest $request
     *
     * @return mixed
     */
    public function show(BookCategory $bookcategory, ShowBookCategoryRequest $request)
    {
        return view('bookcategory::show')->withBookCategory($bookcategory);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(BookCategory $bookcategory)
    {
        $this->bookcategory->deleteById($bookcategory->id);

        return redirect()->route('admin.bookcategory.index')->withFlashSuccess(trans('bookcategory::alerts.backend.bookcategory.deleted'));
    }
}
