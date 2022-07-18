<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleModel;
use App\Models\CustomerModel;
use App\Http\Requests\Client\BookingRequest;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = ScheduleModel::with('subSchedule')
                            ->orderBy('date', 'desc')
                            ->get();
        
        return view('pages.client.booking', ['schedules' => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        // 1. Create random number for reservation number
        $count = 1;
        $bookCode = "BK";
        $createdAt = now()->format('dmyHi');
        $random = Str::random(2);
        $reservationNumber = sprintf('%03s', $bookCode, $random, $createdAt);
        dd($reservationNumber);
        // 2. Get Customer ID / Customer unique Data
        // 3. Convert bookSchedule into time data type
        if($request->validated()):


        endif;
        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
