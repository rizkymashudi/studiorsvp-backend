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
                      <td>
                        <a href="#" data-toggle="modal" data-target="#showimage{{ $history->id }}">
                          <img src="{{ $history->payment_proof ? Storage::url($history->payment_proof) : 'https://via.placeholder.com/1280x720' }}" alt="image" style="width: 80px" class="img-thumbnail">
                        </a>
                      </td>
                      <td>
                        @if($history->reservation_status == "COMPLETE")
                          <span class="bg-success text-light px-3 rounded-lg">{{ $history->reservation_status }}</span>
                        @elseif($history->reservation_status == "PENDING")
                          <span class="bg-warning px-3 rounded-lg">{{ $history->reservation_status }}</span>
                        @else
                          <span class="bg-danger text-light px-3 rounded-lg">{{ $history->reservation_status }}</span>
                        @endif
                      </td>
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

                @foreach ($histories as $history)
                <!-- Modal image-->
                <div class="modal fade" id="showimage{{ $history->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <div class="box-title d-sm-flex align-items-center justify-content-between">
                                  <h5 class="modal-title" id="exampleModalLabel">Reservation number {{ $history->reservations_number }}</h5>
                              </div>
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
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@push('addon-script')
  <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "ordering": true,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });
  </script>
@endpush