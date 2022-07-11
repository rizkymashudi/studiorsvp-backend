<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleModel;
use App\Http\Requests\Admin\StudioSchedulesRequest;
use Illuminate\Http\Request;
use Alert;

class StudioScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = ScheduleModel::all();
        return view('pages.admin.StudioSchedule.index', ['schedules' => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.StudioSchedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudioSchedulesRequest $request)
    {

        if($request->validated()):
            $date = date_create($request->date);
            $dateConverted = date_format($date, 'Y-m-d');
            ScheduleModel::create([
                'date' => $dateConverted,
                'session_available' => $request->session_available,
                'session_reserved' => $request->session_reserved,
                'open_hours' => $request->open_hours
            ]);
            
        else:
            Alert::toast('Gagal mengubah data', 'error');
        endif;
        
        Alert::toast('Data berhasil diubah', 'success');
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
        $schedule = ScheduleModel::findOrFail($id);
        $date = date_create($schedule->date);
        $scheduleDate = date_format($date, 'Y/m/d');
        return view('pages.admin.StudioSchedule.edit')->with([
            'schedule' => $schedule,
            'scheduleDate' => $scheduleDate
        ]);
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
        $schedule = ScheduleModel::findOrFail($id);
        $schedule->delete();

        Alert::toast('Data berhasil dihapus', 'success');
        return redirect()->route('schedules.index');
    }
}
