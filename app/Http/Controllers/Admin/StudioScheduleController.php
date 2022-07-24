<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleModel;
use App\Models\SubScheduleModel;
use App\Models\LogModel;
use App\Http\Requests\Admin\StudioSchedulesRequest;
use Illuminate\Http\Request;
use Alert;
use Auth;

class StudioScheduleController extends Controller
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
        $dateNow = now()->format('m/d/Y');
        $datePicked = $request->date;
        $date = date_create($datePicked);
        $dateConverted = date_format($date, 'Y-m-d');
        $newScheduleDate = date('l, j \\ F Y', strtotime($dateConverted));

        $openHour = $request->open_hours;
        $closeHour = $request->close_hour;
        $startHour = date('H', strtotime($openHour));
        $finishHour = date('H', strtotime($closeHour));
        $workingHours = $finishHour - $startHour;
        $minWorkingHours = 5;

        if($request->validated()):
            if($datePicked < $dateNow):
                Alert::toast('Date cannot less than date now', 'error');
                return redirect()->back();
            endif;

            if(ScheduleModel::where('date', $dateConverted)->exists()):
                Alert::toast('Date already exist, please choose another date', 'error');
                return redirect()->back();
            endif;

            if($closeHour < $openHour):
                Alert::toast('Close hour cannot less than open hour', 'error');
                return redirect()->back();
            endif;

            if($workingHours <= $minWorkingHours ):
                Alert::toast('Operational hour cannot less than 5 hours', 'error');
                return redirect()->back();
            endif;
           
            ScheduleModel::create([
                'date' => $dateConverted,
                'open_hours' => $openHour,
                'close_hour' => $closeHour
            ]);
            
        else:
            Alert::toast('Gagal mengubah data', 'error');
        endif;

        $user = Auth::user()->roles;
        LogModel::create([
            'action' => "CREATE",
            'user'  => $user,
            'description' => "$user menambah data schedule baru untuk hari $newScheduleDate" 
        ]);
        
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
    public function update(StudioSchedulesRequest $request, $id)
    {
        $dateNow = now()->format('m/d/Y');
        $datePicked = $request->date;
        $date = date_create($datePicked);
        $dateConverted = date_format($date, 'Y-m-d');
        $newScheduleDate = date('l, j \\ F Y', strtotime($dateConverted));

        $openHour = $request->open_hours;
        $closeHour = $request->close_hour;

        $reservedScheduleInSameDateExist = SubScheduleModel::with('schedule')
                                                    ->where('schedule_id', $id)
                                                    ->select('studio_reserved')    
                                                    ->exists();
        if($request->validated()):
            if($datePicked < $dateNow):
                Alert::toast('Date cannot less than date now', 'error');
                return redirect()->back();
            endif;

            if($reservedScheduleInSameDateExist):
                Alert::toast('Data cannot be changed, some schedules already reserved', 'error');
                return redirect()->back();
            endif;

            if($closeHour < $openHour):
                Alert::toast('Close hour cannot less than open hour', 'error');
                return redirect()->back();
            endif;

            $scheduleData = ScheduleModel::findOrFail($id);
            $scheduleData->update([
                'date' => $dateConverted,
                'open_hours' => $openHour,
                'close_hour' => $closeHour
            ]);

            $user = Auth::user()->roles;
            LogModel::create([
                'action' => "UPDATE",
                'user'  => $user,
                'description' => "$user mengubah data schedule pada data hari $newScheduleDate" 
            ]);

            Alert::toast('Data berhasil diubah', 'success');
            return redirect()->route('schedules.index');
        endif; 

        Alert::toast('Gagal mengubah data', 'error');
        return redirect()->route('schedules.index');
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
        $dateConverted = date('l, j \\ F Y', strtotime($schedule->date));

        $reservedScheduleRunningExist = SubScheduleModel::with('schedule')
                                            ->where('schedule_id', $id)
                                            ->select('studio_reserved')    
                                            ->exists();
        if($reservedScheduleRunningExist):
            Alert::toast('Data cannot be deleted, you have some schedules reserved running', 'error');
            return redirect()->back();
        endif;

        $schedule->delete();

        $user = Auth::user()->roles;
        LogModel::create([
            'action' => "DELETE",
            'user'  => $user,
            'description' => "$user menghapus data schedule untuk hari $dateConverted" 
        ]);

        Alert::toast('Data berhasil dihapus', 'success');
        return redirect()->route('schedules.index');
    }
}
