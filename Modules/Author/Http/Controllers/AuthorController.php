<?php

namespace Modules\Author\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Author\Entities\Author;
use Modules\Author\Http\Requests\ManageAuthorRequest;
use Modules\Author\Http\Requests\CreateAuthorRequest;
use Modules\Author\Http\Requests\UpdateAuthorRequest;
use Modules\Author\Http\Requests\ShowAuthorRequest;
use Modules\Author\Repositories\AuthorRepository;

class AuthorController extends Controller
{
 /**
     * @var AuthorRepository
     * @var CategoryRepository
     */
    protected $author;

    /**
     * @param AuthorRepository $author
     */
    public function __construct(AuthorRepository $author)
    {
        $this->author = $author;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageAuthorRequest $request)
    {
        return view('author::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageAuthorRequest $request)
    {
        return view('author::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAuthorRequest $request)
    {
        $this->author->create($request->except('_token','_method'));
        return redirect()->route('admin.author.index')->withFlashSuccess(trans('author::alerts.backend.author.created'));
    }

    /**
     * @param Author              $author
     * @param ManageAuthorRequest $request
     *
     * @return mixed
     */
    public function edit(Author $author, ManageAuthorRequest $request)
    {
        return view('author::edit')
            ->withAuthor($author);
    }

    /**
     * @param Author              $author
     * @param UpdateAuthorRequest $request
     *
     * @return mixed
     */
    public function update(Author $author, UpdateAuthorRequest $request)
    {
        $this->author->updateById($author->id,$request->except('_token','_method'));

        return redirect()->route('admin.author.index')->withFlashSuccess(trans('author::alerts.backend.author.updated'));
    }

    /**
     * @param Author              $author
     * @param ManageAuthorRequest $request
     *
     * @return mixed
     */
    public function show(Author $author, ShowAuthorRequest $request)
    {
        return view('author::show')->withAuthor($author);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Author $author)
    {
        $this->author->deleteById($author->id);

        return redirect()->route('admin.author.index')->withFlashSuccess(trans('author::alerts.backend.author.deleted'));
    }
}
