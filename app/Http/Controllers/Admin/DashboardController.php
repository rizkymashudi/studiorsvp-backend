<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReservationModel;
use App\Models\CustomerModel;
use DB;

class DashboardController extends Controller
{
    public function index(Request $request){

        $reservationCompleted = ReservationModel::where('reservation_status', 'COMPLETE')->get();
        $incomingReservations = ReservationModel::where('reservation_status', 'PENDING')->get();
        $customers  = CustomerModel::all();
        $totalRevenue = ReservationModel::select(DB::raw('SUM(total_pay) as total_income'))
                                        ->where('reservation_status', 'COMPLETE')
                                        ->first();

        $reports = ReservationModel::select(
                                            DB::raw('DATE(booking_date) as date'),
                                            DB::raw('SUM(duration) as total_duration'),
                                            DB::raw('SUM(total_pay) as total_income'))
                                            ->where('reservation_status', 'COMPLETE')
                                            ->groupBy('booking_date')
                                            ->orderBy('booking_date', 'asc')
                                            ->latest()
                                            ->take(30)
                                            ->get();

        return view('pages.admin.dashboard', [
            'reservationCompleted' => $reservationCompleted,
            'incomingReservations'  => $incomingReservations,
            'customers' => $customers,
            'totalRevenue' => $totalRevenue,
            'reports' => $reports
        ]);
    }
}
