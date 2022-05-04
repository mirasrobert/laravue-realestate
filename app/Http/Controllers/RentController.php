<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentRequest;
use App\Models\Rent;
use Illuminate\Http\Request;
use App\Http\Resources\RentResource;

class RentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rent::with('images')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRentRequest $request)
    {
        return auth()->user()->rents()->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rent = Rent::with(['images', 'reviews.user' => function ($query) {
            $query->select('id', 'name')
                ->orderBy('created_at', 'desc');
        }])
        ->withAvg('reviews', 'rating')
        ->findOrFail($id);

        return new RentResource($rent);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $user_id
     * @return \App\Http\Resources\RentResource;
     */
    public function userRents($user_id) {
        $rents = Rent::with(['images' => function ($query) {
            $query->select('id', 'imageable_type', 'imageable_id', 'url')
                ->orderBy('created_at', 'desc');
        }])
        ->where('user_id', $user_id)
        ->latest()
        ->get();

        return $rents;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRentRequest $request, Rent $rent)
    {
        $rent->update($request->validated());
        return new RentResource($rent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        $rent->delete();
        return response()->json(['message' => 'Rent deleted'], 200);
    }
}