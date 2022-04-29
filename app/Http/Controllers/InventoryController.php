<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Company;
use App\Models\CountType;
use App\Models\Inventory;
use App\Models\InventoryTypeCode;
use App\Models\RatePlanCode;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = Inventory::with([
            'company_list',
            'inventory_type_code_list',
            'rate_plan_code_list',
            'count_type_list'
        ])->get();
        return view('inventory.index')->with([
            'inventory' => $inventory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();
        $inventoryTypeCode = InventoryTypeCode::all();
        $countType = CountType::all();
        return view('inventory.create')->with([
            'company' => $company,
            'inventory_type_code' => $inventoryTypeCode,
            'count_type' => $countType
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryRequest $request, Inventory $inventory)
    {
        // Validate
        $validated = $request->validated();

        $inventory->company_id = $request->company;
        $inventory->inventory_type_code_id = $request->itcode;
        $inventory->rate_plan_code_id = $request->rpcode;
        $inventory->count_type_id = $request->ctype;
        $inventory->count = $request->count;
        $inventory->start_date = $request->start_date;
        $inventory->end_date = $request->end_date;
        $inventory->save();

        return redirect()->route('inventory.index')->with('success_add', 'Record added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::all();
        $inventoryTypeCode = InventoryTypeCode::all();
        $countType = CountType::all();
        $ratePlanCode = RatePlanCode::all();

        $inventory = Inventory::findOrFail($id);

        return view('inventory.edit')->with([
            'inventory' => $inventory,
            'company' => $company,
            'inventory_type_code' => $inventoryTypeCode,
            'count_type' => $countType,
            'rate_plan_code' => $ratePlanCode
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryRequest $request, $id)
    {
        // Validate
        $validated = $request->validated();

        $inventory = Inventory::findOrFail($id);
        $inventory->company_id = $request->company;
        $inventory->inventory_type_code_id = $request->itcode;
        $inventory->rate_plan_code_id = $request->rpcode;
        $inventory->count_type_id = $request->ctype;
        $inventory->count = $request->count;
        $inventory->start_date = $request->start_date;
        $inventory->end_date = $request->end_date;
        $inventory->save();

        return redirect()->route('inventory.index')->with('success_update', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventory::destroy($id);
        return redirect()->route('inventory.index')->with('success_delete', 'Record deleted successfully');
    }

    /**
     * This is Rate Plan Code List
     * As per Inventory Type Code List ID is selected
     */
    public function rate_plan_code_list(Request $request)
    {
        // Display the room list based on the given location
        $itcode_id = $request->itcode_id;
        return RatePlanCode::where('inventory_type_code_id', $itcode_id)->get();
    }

}
