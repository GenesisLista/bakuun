<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingChannelRequest;
use App\Http\Resources\BookingChannelResource;
use App\Models\BookingChannel;

class BookingChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookingChannelResource::collection(BookingChannel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingChannelRequest $request)
    {
        $bookingChannel = BookingChannel::create($request->validated());
        return new BookingChannelResource($bookingChannel);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingChannel  $bookingChannel
     * @return \Illuminate\Http\Response
     */
    public function show(BookingChannel $bookingChannel)
    {
        return new BookingChannelResource($bookingChannel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingChannel  $bookingChannel
     * @return \Illuminate\Http\Response
     */
    public function update(BookingChannelRequest $request, BookingChannel $bookingChannel)
    {
        $bookingChannel->update($request->validated());
        return new BookingChannelResource($bookingChannel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingChannel  $bookingChannel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingChannel $bookingChannel)
    {
        $bookingChannel->delete();
        return response()->noContent();
    }
}
