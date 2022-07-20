<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleModel;
use App\Models\CustomerModel;
use App\Models\SubScheduleModel;
use App\Models\ReservationModel;
use App\Http\Requests\Client\BookingRequest;
use Illuminate\Support\Str;
use Auth;
use Alert;

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

        return view('pages.client.booking', [
            'schedules' => $schedules,
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
    public function store(BookingRequest $request)
    {
        // 1. Create random number for reservation number
        $bookCode = "BK";
        $createdAt = now()->format('dmyHi');
        $reservationNumber = "$bookCode-$createdAt";

        // 2. Get Customer ID / Customer unique Data
        $userEmail = Auth::user()->email;
        $customerID = CustomerModel::select('id')->where('email', $userEmail)->first();

        // 3. Convert bookSchedule into time data type
        $bookSchedule = "$request->bookSchedule:00";
        $bookingSchedule = date('H:i:s', strtotime($bookSchedule));

        // 5. Get scheduleID
        // split into array then reverse
        // slice 10 element then reverse again
        // implode into string
        $arrScheduleReverse = array_reverse(str_split($request->booking_date));
        $sliceArray = array_reverse(array_slice($arrScheduleReverse, 10));
        $scheduleID = implode("", $sliceArray);

        // 6. Get Booking_date
        $arrBookSchedule = str_split($request->booking_date); 
        $arrBookingDate = array_slice($arrBookSchedule, -10);
        $bookingDate = implode($arrBookingDate);

        // 6. Check schedule within the same date 
        $bookedScheduleAlreadyExist = SubScheduleModel::with('schedule')
                                    ->where('schedule_id', $scheduleID)
                                    ->where('studio_reserved', $bookingSchedule)    
                                    ->exists();

        $scheduleDatesById = ScheduleModel::where('id', $scheduleID)->first();

        $currentTime = now('Asia/Jakarta')->format('H:i:s');
        $pricePerHour = 75000;
    
        // 7. Validate
        if($request->validated()):
            if($bookedScheduleAlreadyExist):
                Alert::toast('Schedule already reserved on this date, please try another schedule', 'error');
                return redirect()->back();
            endif;

            if($bookingSchedule < $currentTime && $scheduleDatesById == $bookingDate):
                Alert::toast('Booking schedule is earlier than current time', 'error');
                return redirect()->back();
            endif;

            ReservationModel::create([
                'reservations_number' => $reservationNumber,
                'customer_id'   =>  $customerID->id,
                'booking_date' => $bookingDate,
                'rent_schedule' => $bookingSchedule,
                'duration'  =>  $request->rentDuration,
                'total_pay' => $request->rentDuration * $pricePerHour,
                'reservation_status' => 'PENDING'
            ]);
            
            Alert::toast('Booking studio schedule success', 'success');
            return redirect()->route('overview.index');
        endif;

        Alert::toast('Something went wrong, please try again', 'error');
        return redirect()->route('booking.index');
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
