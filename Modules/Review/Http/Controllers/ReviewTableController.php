<?php

namespace Modules\Review\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Review\Repositories\ReviewRepository;
use Modules\Review\Http\Requests\ManageReviewRequest;

class ReviewTableController extends Controller
{
    /**
     * @var ReviewRepository
     */
    protected $review;

    /**
     * @param ReviewRepository $review
     */
    public function __construct(ReviewRepository $review)
    {
        $this->review = $review;
    }

    /**
     * @param ManageReviewRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageReviewRequest $request)
    {
        return DataTables::of($this->review->getForDataTable())
            ->editColumn('customer_id', function ($review) {
                return $review->customer->name;
            })
            ->editColumn('book_id', function ($review) {
                return $review->book->book_name;
            })
            ->addColumn('actions', function ($review) {
                return $review->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
