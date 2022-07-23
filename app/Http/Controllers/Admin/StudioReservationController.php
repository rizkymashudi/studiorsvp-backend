<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReservationModel;
use App\Models\ScheduleModel;
use App\Models\SubScheduleModel;
use Illuminate\Http\Request;
use Alert;

class StudioReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomingReservations = ReservationModel::with('customer')
                                                ->where('reservation_status', 'PENDING')
                                                ->get();
                                                
        return view('pages.admin.Reservations.index', [
            'incomingReservations' => $incomingReservations
        ]);
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
    public function store(Request $request)
    {
        //
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
        $status = $request->reservation_status;
        $reservation = ReservationModel::findOrFail($id);

        if(empty($reservation->payment_proof)):
            Alert::toast('Change status failed, please wait until customers upload payment proof', 'error');
            return redirect()->back();
        endif;

        $reservation->update([
            'reservation_status' => $status
        ]);

        Alert::toast('Change booking status success', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $reservation = ReservationModel::findOrFail($id);

       $date = $reservation->booking_date;
       $scheduleID = ScheduleModel::select('id')->where('date', $date)->first();
       $subScheduleExist = SubScheduleModel::select('studio_reserved')
                                            ->where('schedule_id', $scheduleID->id)
                                            ->exists();
       if($subScheduleExist):
            Alert::toast('Delete fail, this reservation already have running schedule reserved', 'error');
            return redirect()->back();
       endif;

       Alert::toast('Data berhasil dihapus', 'success');
       return redirect()->back();
    }
}
