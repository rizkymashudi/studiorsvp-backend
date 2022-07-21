@extends('layouts.customer')
@section('content')
  <main class="main-wrapper">
    <div class="ps-lg-0">
      <h2 class="text-4xl fw-bold color-palette-1 mb-30">Booking History</h2>
      <div class="latest-transaction">
        <div class="main-content main-content-table overflow-auto shadow p-3 mb-5 bg-body rounded">
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
                  <td class="align-middle text-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#showimage{{ $history->id }}">
                      <img src="{{ $history->payment_proof ? Storage::url($history->payment_proof) : 'https://via.placeholder.com/1280x720' }}" alt="image" style="width: 80px" class="img-thumbnail">
                    </a>
                  </td>
                  <td>
                    @if ($history->reservation_status == "COMPLETE")
                      <p class="fw-medium text-center color-palette-1 m-0">
                        <span class="bg-success text-light px-4 rounded-3">
                          {{ $history->reservation_status }}
                        </span>
                      </p>
                    @elseif($history->reservation_status == "PENDING")
                      <p class="fw-medium text-center color-palette-1 m-0">
                        <span class="bg-warning px-4 rounded-3">
                          {{ $history->reservation_status }}
                        </span>
                      </p>
                    @else
                      <p class="fw-medium text-center color-palette-1 m-0">
                        <span class="bg-danger text-light px-4 rounded-3">
                          {{ $history->reservation_status }}
                        </span>
                      </p>
                    @endif
                    
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

          @foreach ($histories as $history)
               <!-- Modal image-->
            <div class="modal fade" id="showimage{{ $history->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Booking number {{ $history->reservations_number }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ $history->payment_proof ? Storage::url($history->payment_proof) : 'https://via.placeholder.com/1280x720' }}" alt="poster" style="width: 450px">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </main>
@endsection