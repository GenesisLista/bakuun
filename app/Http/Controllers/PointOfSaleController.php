<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePointOfSaleRequest;
use App\Http\Requests\UpdatePointOfSaleRequest;
use App\Models\BookingChannel;
use App\Models\Company;
use App\Models\PointOfSale;
use Illuminate\Http\Request;

class PointOfSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pointOfSale = PointOfSale::with([
            'booking_channel',
            'company',
            'inventory_list',
        ])->get();
        return view('point_of_sale.index')->with([
            'point_of_sale' => $pointOfSale
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookingChannel = BookingChannel::all();
        $companyName = Company::all();
        return view('point_of_sale.create')->with([
            'booking_channel' => $bookingChannel,
            'company_name' => $companyName
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePointOfSaleRequest $request, PointOfSale $pointOfSale)
    {
        // Validate
        $validated = $request->validated();

        $pointOfSale->booking_channel_id = $request->bchannel;
        $pointOfSale->company_id = $request->cname;
        $pointOfSale->save();

        return redirect()->route('pos.index')->with('success_add', 'Record added successfully');
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
        $pointOfSale = PointOfSale::findOrFail($id);
        $bookingChannel = BookingChannel::all();
        $companyName = Company::all();
        return view('point_of_sale.edit')->with([
            'point_of_sale' => $pointOfSale,
            'booking_channel' => $bookingChannel,
            'company_name' => $companyName
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePointOfSaleRequest $request, $id)
    {
        // Validate
        $validated = $request->validated();

        $pointOfSale = PointOfSale::findOrFail($id);
        $pointOfSale->booking_channel_id = $request->bchannel;
        $pointOfSale->company_id = $request->cname;
        $pointOfSale->save();

        return redirect()->route('pos.index')->with('success_update', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PointOfSale::destroy($id);
        return redirect()->route('pos.index')->with('success_delete', 'Record deleted successfully');
    }
}
