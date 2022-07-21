@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Studio reservations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6610f2;">Home</a></li>
              <li class="breadcrumb-item active">Studio reservations</li>
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
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($incomingReservations as $reservation)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $reservation->reservations_number }}</td>
                      <td>{{ $reservation->customer->name }}</td>
                      <td>{{ date('l, j \\ F Y', strtotime($reservation->booking_date)) }}</td>
                      <td>
                        <a href="{{ route('sub-schedule.show', $reservation->booking_date) }}">
                          {{ date('H:i', strtotime($reservation->rent_schedule)) }}
                        </a>
                      </td>
                      <td>{{ $reservation->duration }}</td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#showimage{{ $reservation->id }}">
                          <img src="{{ $reservation->payment_proof ? Storage::url($reservation->payment_proof) : 'https://via.placeholder.com/1280x720' }}" alt="image" style="width: 80px" class="img-thumbnail">
                        </a>
                      </td>
                      <td>
                        @if($reservation->reservation_status == "COMPLETE")
                          <span class="bg-success text-light px-3 rounded-lg">{{ $reservation->reservation_status }}</span>
                        @elseif($reservation->reservation_status == "PENDING")
                          <span class="bg-warning px-3 rounded-lg">{{ $reservation->reservation_status }}</span>
                        @else
                          <span class="bg-danger text-light px-3 rounded-lg">{{ $reservation->reservation_status }}</span>
                        @endif
                      </td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail{{ $reservation->id }}">
                          <i class="fa fa-pen"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $reservation->id }}">
                            <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    @php
                      $no++;
                    @endphp
                    @empty
                    <tr>
                        <td class="text-center p-5" colspan="9">
                            Data tidak tersedia
                        </td>
                    </tr>
                    @endforelse
        
                  </tbody>
                  
                </table>
  
  
                @foreach ($incomingReservations as $reservation)
                 <!-- Modal image-->
                 <div class="modal fade" id="showimage{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <div class="box-title d-sm-flex align-items-center justify-content-between">
                                  <h5 class="modal-title" id="exampleModalLabel">Reservation number {{ $reservation->reservations_number }}</h5>
                              </div>
                          </div>
                          <div class="modal-body text-center">
                              <img src="{{ $reservation->payment_proof ? Storage::url($reservation->payment_proof) : 'https://via.placeholder.com/1280x720' }}" alt="poster" style="width: 450px">
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
                </div>

                {{-- Modal detail --}}
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="detail{{ $reservation->id }}">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="box-title d-sm-flex align-items-center justify-content-between">
                            <h5 class="modal-title">Booking status {{ $reservation->reservations_number }}</h5>
                        </div>
                      </div>

                      <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Change status</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="reservation_status">
                                <option  selected disabled hidden>{{ $reservation->reservation_status }}</option>
                                <option value="COMPLETE">Complete</option>
                                <option value="FAILED">Failed</option>
                                <option value="PENDING">Pending</option>
                              </select>
                              @error('reservation_status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn" style="background-color: #6610f2; color: #ffffff;">Save</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
  
                {{-- Modal delete --}}
                <div class="modal fade" tabindex="-1" role="dialog" id="delete{{ $reservation->id }}">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="box-title d-sm-flex align-items-center justify-content-between">
                                <h5 class="modal-title">Hapus {{ date('l, j \\ F Y', strtotime($reservation->reservations_number)) }}</h5>
                            </div>
                        </div>
                        <div class="modal-body">
                          <p>Anda yakin ingin menghapus booking studio ini?</p>
                          <input type="hidden" name="" id="" value="{{ '$kegiatan->id' }}">
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                    Hapus
                                </button>
                            </form>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
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