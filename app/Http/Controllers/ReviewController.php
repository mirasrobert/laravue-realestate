<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Auth middleware
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\ReviewResource
     */
    public function index()
    {
        return ReviewResource::collection(Review::with('user')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreReviewRequest  $request
     * @return App\Http\Resources\ReviewResource
     */
    public function store(StoreReviewRequest $request)
    {
        $review = Review::where('rent_id', $request->rent_id)
                ->where('user_id', auth()->id())
                ->exists();
        // If there is no a review
        if(!$review) {
            return new ReviewResource(auth()->user()->reviews()->create($request->validated()));
        }

        // Prevent user from adding another review
        return response()->json(['error' => 'You already reviewed this rent'], 403);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return App\Http\Resources\ReviewResource
     */
    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json([
            'message' => 'Review deleted successfully',
        ], 200);
    }
}
