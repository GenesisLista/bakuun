<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountTypeRequest;
use App\Http\Resources\CountTypeResource;
use App\Models\CountType;

class CountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CountTypeResource::collection(CountType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountTypeRequest $request)
    {
        $countType = CountType::create($request->validated());
        return new CountTypeResource($countType);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountType  $countType
     * @return \Illuminate\Http\Response
     */
    public function show(CountType $countType)
    {
        return new CountTypeResource($countType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CountType  $countType
     * @return \Illuminate\Http\Response
     */
    public function update(CountTypeRequest $request, CountType $countType)
    {
        $countType->update($request->validated());
        return new CountTypeResource($countType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountType  $countType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountType $countType)
    {
        $countType->delete();
        return response()->noContent();
    }
}
