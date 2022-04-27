<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryTypeCodeRequest;
use App\Http\Resources\InventoryTypeCodeResource;
use App\Models\InventoryTypeCode;
use Illuminate\Http\Request;

class InventoryTypeCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InventoryTypeCodeResource::collection(InventoryTypeCode::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryTypeCodeRequest $request)
    {
        $inventoryTypeCode = InventoryTypeCode::create($request->validated());
        return new InventoryTypeCodeResource($inventoryTypeCode);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryTypeCode  $inventoryTypeCode
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryTypeCode $inventoryTypeCode)
    {
        return new InventoryTypeCodeResource($inventoryTypeCode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventoryTypeCode  $inventoryTypeCode
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryTypeCodeRequest $request, InventoryTypeCode $inventoryTypeCode)
    {
        $inventoryTypeCode->update($request->validated());
        return new InventoryTypeCodeResource($inventoryTypeCode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryTypeCode  $inventoryTypeCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryTypeCode $inventoryTypeCode)
    {
        $inventoryTypeCode->delete();
        return response()->noContent();
    }
}
