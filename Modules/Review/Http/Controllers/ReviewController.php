<?php

namespace Modules\Review\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Review\Entities\Review;
use Modules\Review\Http\Requests\ManageReviewRequest;
use Modules\Review\Http\Requests\CreateReviewRequest;
use Modules\Review\Http\Requests\UpdateReviewRequest;
use Modules\Review\Http\Requests\ShowReviewRequest;
use Modules\Review\Repositories\ReviewRepository;

class ReviewController extends Controller
{
 /**
     * @var ReviewRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageReviewRequest $request)
    {
        return view('review::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageReviewRequest $request)
    {
        return view('review::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateReviewRequest $request)
    {
        $data = $request->all();
        $data['customer_id'] = auth()->user()->customer->id;
        $data['book_id']     = $request->id;
        // dd($data);
        $this->review->create($data);
        return api_response(['message'=> 'Review make Success'],200);
    }

    /**
     * @param Review              $review
     * @param ManageReviewRequest $request
     *
     * @return mixed
     */
    public function edit(Review $review, ManageReviewRequest $request)
    {
        return view('review::edit')
            ->withReview($review);
    }

    /**
     * @param Review              $review
     * @param UpdateReviewRequest $request
     *
     * @return mixed
     */
    public function update(Review $review, UpdateReviewRequest $request)
    {
        $this->review->updateById($review->id,$request->except('_token','_method'));

        return redirect()->route('admin.review.index')->withFlashSuccess(trans('review::alerts.backend.review.updated'));
    }

    /**
     * @param Review              $review
     * @param ManageReviewRequest $request
     *
     * @return mixed
     */
    public function show(Review $review, ShowReviewRequest $request)
    {
        return view('review::show')->withReview($review);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Review $review)
    {
        $this->review->deleteById($review->id);

        return redirect()->route('admin.review.index')->withFlashSuccess(trans('review::alerts.backend.review.deleted'));
    }
}
