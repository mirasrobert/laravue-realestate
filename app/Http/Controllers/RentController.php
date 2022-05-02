<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentRequest;
use App\Models\Rent;
use Illuminate\Http\Request;
use App\Http\Resources\RentResource;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RentResource::collection(Rent::all());
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
        $rent = Rent::find($id);
        if(!$rent) {
            return response()->json(['message' => 'Rent not found'], 404);
        }
        return new RentResource($rent);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRentRequest $request, $id)
    {
        $rent = Rent::find($id);
        if(!$rent) {
            return response()->json(['message' => 'Rent not found'], 404);
        }

        $rent->update($request->validated());

        return new RentResource($rent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rent = Rent::find($id);
        if(!$rent) {
            return response()->json(['message' => 'Rent not found'], 404);
        }
        $rent->delete();
        return response()->json(['message' => 'Rent deleted'], 200);
    }
}
