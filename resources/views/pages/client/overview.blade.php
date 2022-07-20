@extends('layouts.customer')
@section('content')
<main class="main-wrapper" id="overview">
    <div class="ps-lg-0">
        <h2 class="text-4xl fw-bold color-palette-1 mb-30">Overview</h2>
        <div class="latest-transaction">
            <p class="text-lg fw-medium color-palette-1 mb-14">Latest Transactions</p>
            <div class="main-content main-content-table overflow-auto">
                <table class="table table-borderless">
                    <thead>
                        <tr class="color-palette-1 align-middle text-center">
                            <th scope="col">Booking number</th>
                            <th scope="col">Booking date</th>
                            <th scope="col">Schedule</th>
                            <th scope="col">Rent duration</th>
                            <th scope="col">Bill</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($overviews as $overview)
                            <tr class="align-middle text-center">
                                <td><p class="fw-medium color-palette-1 m-0">{{ $overview->reservations_number }}</p></td>
                                <td><p class="fw-medium color-palette-1 m-0">{{ date('j \\ F Y', strtotime($overview->booking_date)) }}</p></td>
                                <td><p class="fw-medium color-palette-1 m-0">{{ date('H:i', strtotime($overview->rent_schedule)) }}</p></td>
                                <td><p class="fw-medium color-palette-1 m-0">{{ $overview->duration }} hours</p></td>
                                <td><p class="fw-medium color-palette-1 m-0"> {{ $overview->total_pay }} </p></td>
                                <td>
                                    <div class="align-self-end">
                                        @if ($overview->reservation_status == "COMPLETE")
                                            <span class="float-end icon-status success"></span>
                                        @elseif($overview->reservation_status == "PENDING")
                                            <span class="float-end icon-status pending"></span>
                                        @else
                                            <span class="float-end icon-status failed"></span>
                                        @endif
                                        
                                        <p class="fw-medium text-center color-palette-1 m-0 position-relative">
                                            {{ $overview->reservation_status}}
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center p-5" colspan="6">
                                    Data tidak tersedia
                                </td>
                            </tr>
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection