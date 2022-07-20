@extends('layouts.customer')
@section('content')
  <main class="main-wrapper">
    <div class="ps-lg-0">
      <h2 class="text-4xl fw-bold color-palette-1 mb-30">Booking History</h2>
      <div class="latest-transaction">
        <div class="main-content main-content-table overflow-auto">
          <table class="table table-borderless">
            <thead>
              <tr class="color-palette-1 text-center">
                  <th scope="col">Booking Number</th>
                  <th scope="col">Booking date</th>
                  <th scope="col">Schedule</th>
                  <th scope="col">Rent duration</th>
                  <th scope="col">Total bill</th></th>
                  <th scope="col">Payment proof</th>
                  <th scope="col">Booking status</th>
              </tr>
          </thead>
          <tbody>
            @forelse ($histories as $history)
                <tr class="align-middle text-start">
                  <td>
                    <p class="fw-medium text-center color-palette-1 m-0">{{ $history->reservations_number}}</p>
                  </td>
                  <td>
                    <p class="fw-medium text-center color-palette-1 m-0">{{ date('j \\ F Y', strtotime($history->booking_date)) }}</p>
                  </td>
                  <td>
                    <p class="fw-medium text-center color-palette-1 m-0">{{ date('H:i', strtotime($history->rent_schedule)) }}</p>
                  </td>
                  <td>
                    <p class="fw-medium text-center color-palette-1 m-0">{{ $history->duration }}</p>
                  </td>
                  <td>
                    <p class="fw-medium text-center color-palette-1 m-0">{{ $history->total_pay }}</p>
                  </td>
                  <td>
                    <p class="fw-medium text-center color-palette-1 m-0">{{ $history->payment_proof }}</p>
                  </td>
                  <td>
                    <p class="fw-medium text-center color-palette-1 m-0">{{ $history->reservation_status }}</p>
                  </td>
                </tr>
            @empty
              <tr>
                <td class="text-center p-5" colspan="7">
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