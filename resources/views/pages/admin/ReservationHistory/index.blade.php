@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reservations History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6610f2;">Home</a></li>
              <li class="breadcrumb-item active">Reservation history</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Booking Number</th>
                      <th>Customer name</th>
                      <th>Booking date</th>
                      <th>Schedule</th>
                      <th>Rent duration</th>
                      <th>Payment proof</th>
                      <th>Booking status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($histories as $history)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $history->reservations_number }}</td>
                      <td>{{ $history->customer->name }}</td>
                      <td>{{ date('l, j \\ F Y', strtotime($history->booking_date)) }}</td>
                      <td>
                          {{ date('H:i', strtotime($history->rent_schedule)) }}
                      </td>
                      <td>{{ $history->duration }}</td>
                      <td>{{ $history->payment_proof }}</td>
                      <td>{{ $history->reservation_status }}</td>
                    </tr>
                    @php
                      $no++;
                    @endphp
                    @empty
                    <tr>
                        <td class="text-center p-5" colspan="8">
                            Data tidak tersedia
                        </td>
                    </tr>
                    @endforelse
        
                  </tbody>
                  
                </table>
  

              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection