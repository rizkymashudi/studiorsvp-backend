<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleModel;
use App\Models\SubScheduleModel;
use App\Models\ReservationModel;
use App\Http\Requests\Admin\SubScheduleRequest;
use Illuminate\Http\Request;
use Alert;


class StudioSubScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(SubScheduleRequest $request)
    {        
        $scheduleID = $request->scheduleID;
        // Convert string to time
        foreach($request->reserved as $reserved):
            $schedule = "$reserved";
            $reservedDate = date('H:i:s', strtotime($schedule));
            $reservedSchedules[] = $reservedDate;
        endforeach;

        foreach ($reservedSchedules as $reservedSchedule):
            // TODO: STUDIO RESERVED IN THE SAME DAY VALIDATION
            $scheduleInSameDateExist = SubScheduleModel::with('schedule')
                                    ->where('schedule_id', $scheduleID)
                                    ->where('studio_reserved', $reservedSchedule)    
                                    ->exists();
            if($scheduleInSameDateExist):
                break;
            endif;
        endforeach;

        // TODO: Check if update new studio schedule doesn't same with rent schedule on reservation
        $rentSchedule = ReservationModel::select('rent_schedule')
                                        ->where('reservations_number', $request->reservationNumber)
                                        ->first();

        $totalSchedule = count($reservedSchedules);
    
        if($request->validated()):
            if($scheduleInSameDateExist):
                Alert::toast('Schedule already reserved on this date, please try another schedule', 'error');
                return redirect()->back();
            endif;

            if(!in_array($rentSchedule->rent_schedule, $reservedSchedules)):
                Alert::toast("Update schedule doesn't match the hours booked", "error");
                return redirect()->back();
            endif;

            if($totalSchedule < $request->bookedDuration || $totalSchedule > $request->bookedDuration):
                Alert::toast("Schedule less than duration booked", "error");
                return redirect()->back();
            endif;
            
            foreach ($reservedSchedules as $reserved): 
                SubScheduleModel::create([
                    'schedule_id' => $scheduleID,
                    'studio_reserved' => $reserved
                ]);
            endforeach;

            Alert::toast('New schedule reserved success', 'success');
            return redirect()->route('reservations.index');
        endif;

        Alert::toast('Something went wrong, please try again', 'error');
        return redirect()->route('reservations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $reservationNumber = $slug;
        $booking = ReservationModel::select('booking_date', 'rent_schedule', 'duration')
                                        ->where('reservations_number', $slug)
                                        ->firstOrFail();

        $schedule = ScheduleModel::with('subSchedule')
                                    ->where('date', $booking->booking_date)
                                    ->firstOrFail();
   
        $openHour = date('H', strtotime($schedule->open_hours));
        $closeHour = date('H', strtotime($schedule->close_hour));
        $intervalTime = $closeHour - $openHour;

        return view('pages.admin.StudioSchedule.update', [
            'schedule' => $schedule,
            'intervalTime' => $intervalTime,
            'openHour' => $openHour,
            'reservationNumber' => $reservationNumber,
            'booking' => $booking
        ]);
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
