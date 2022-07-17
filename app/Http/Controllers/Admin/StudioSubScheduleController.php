<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleModel;
use App\Models\SubScheduleModel;
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
        $schedule = "$request->reserved";
        $reservedSchedule = date('H:i:s', strtotime($schedule));
        
        // TODO: STUDIO RESERVED IN THE SAME DAY VALIDATION
        $scheduleInSameDateExist = SubScheduleModel::with('schedule')
                            ->where('schedule_id', $scheduleID)
                            ->where('studio_reserved', $reservedSchedule)    
                            ->exists();

        if($request->validated()):
            if($scheduleInSameDateExist):
                Alert::toast('Schedule already reserved on this date, please try another schedule', 'error');
                return redirect()->back();
            endif;

            SubScheduleModel::create([
                'schedule_id' => $scheduleID,
                'studio_reserved' => $reservedSchedule
            ]);

            Alert::toast('New schedule reserved success', 'success');
            return redirect()->route('schedules.index');
        endif;

        Alert::toast('Something went wrong, please try again', 'error');
        return redirect()->route('schedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = ScheduleModel::with('subSchedule')->findOrFail($id);
        $openHour = date('H', strtotime($schedule->open_hours));
        $closeHour = date('H', strtotime($schedule->close_hour));
        $intervalTime = $closeHour - $openHour;

        return view('pages.admin.StudioSchedule.update', [
            'schedule' => $schedule,
            'intervalTime' => $intervalTime,
            'openHour' => $openHour
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
