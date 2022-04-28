<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatePlanCode;
use App\Http\Requests\UpdateRatePlanCode;
use App\Models\InventoryTypeCode;
use App\Models\RatePlanCode;
use Illuminate\Http\Request;

class RatePlanCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratePlanCode = RatePlanCode::with([
            'inventory_type_code'
        ])->get();
        return view('rate_plan_code.index')->with([
            'rate_plan_code' => $ratePlanCode
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventoryTypeCode = InventoryTypeCode::all();
        return view('rate_plan_code.create')->with([
            'inventory_type_code' => $inventoryTypeCode
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRatePlanCode $request, RatePlanCode $rpcode)
    {
        // Validate
        $validated = $request->validated();

        $rpcode->inventory_type_code_id = $request->itcode;
        $rpcode->rate_plan_code = $request->name;
        $rpcode->save();

        return redirect()->route('rate-plan-code.index')->with('success_add', 'Record added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RatePlanCode  $ratePlanCode
     * @return \Illuminate\Http\Response
     */
    public function show(RatePlanCode $ratePlanCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RatePlanCode  $ratePlanCode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Display the form
        $inventoryTypeCode = InventoryTypeCode::all();
        $ratePlanCode = RatePlanCode::findOrFail($id);
        return view('rate_plan_code.edit')->with([
            'rate_plan_code' => $ratePlanCode,
            'inventory_type_code' => $inventoryTypeCode
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RatePlanCode  $ratePlanCode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRatePlanCode $request, $id)
    {
        // Validate
        $validated = $request->validated();

        $ratePlanCode = RatePlanCode::findOrFail($id);
        $ratePlanCode->inventory_type_code_id = $request->itcode;
        $ratePlanCode->rate_plan_code = $request->name;
        $ratePlanCode->save();

        return redirect()->route('rate-plan-code.index')->with('success_update', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RatePlanCode  $ratePlanCode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RatePlanCode::destroy($id);
        return redirect()->route('rate-plan-code.index')->with('success_delete', 'Record deleted successfully');
    }
}
