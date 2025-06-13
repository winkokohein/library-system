<?php

namespace Modules\Author\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Author\Repositories\AuthorRepository;
use Modules\Author\Http\Requests\ManageAuthorRequest;

class AuthorTableController extends Controller
{
    /**
     * @var AuthorRepository
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
     * @param ManageAuthorRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAuthorRequest $request)
    {
        return DataTables::of($this->author->getForDataTable())
            ->editColumn('updated_at', function ($author) {
                return $author->updated_at;
            })
            ->addColumn('actions', function ($author) {
                return $author->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
