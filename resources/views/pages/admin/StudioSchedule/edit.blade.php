@extends('layouts.admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Edit studio schedules</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6610f2">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('schedules.index') }}" style="color: #6610f2">Studio schedules</a></li>
              <li class="breadcrumb-item active">Edit studio schedules</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit schedules</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('schedules.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <!-- Date -->
                  <div class="form-group">
                    <label>Date</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input @error('date') is-invalid @enderror" name="date" data-target="#reservationdate" value="{{ old('date') ? old('date') : $scheduleDate }}"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                  </div>

                  <!-- Date and time -->
                  <div class="form-group">
                    <label>Studio open hours</label>
                      <div class="input-group date" id="openhours" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input @error('open_hours') is-invalid @enderror" name="open_hours" data-target="#openhours" value="{{ old('open_hours') ? old('open_hours') : $schedule->open_hours }}"/>
                          <div class="input-group-append" data-target="#openhours" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                          @error('open_hours') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                  </div>

                   <!-- Date and time -->
                  <div class="form-group">
                    <label>Studio reserved</label>
                      <div class="input-group date" id="reservationtime" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input @error('session_reserved') is-invalid @enderror" name="session_reserved" data-target="#reservationtime" value="{{ old('session_reserved') ? old('session_reserved') : $schedule->session_reserved }}"/>
                          <div class="input-group-append" data-target="#reservationtime" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                          @error('session_reserved') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                  </div>

                   <!-- Date and time -->
                   <div class="form-group">
                    <label>Studio available</label>
                      <div class="input-group date" id="availabletime" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input @error('session_available') is-invalid @enderror" name="session_available" data-target="#availabletime" value="{{ old('session_available') ? old('session_available') : $schedule->session_available  }}"/>
                          <div class="input-group-append" data-target="#availabletime" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                          @error('session_available') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn float-right" style="background-color: #6610f2; color: #ffffff">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@push('addon-script')
  <script>
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

   //Date and time picker
   $('#reservationtime').datetimepicker({ 
    format: 'hh:mm:ss'
    // icons: { time: 'far fa-clock' }
   });

   $('#availabletime').datetimepicker({ 
    format: 'hh:mm:ss'
   });

   $('#openhours').datetimepicker({ 
    format: 'hh:mm:ss'
    // icons: { time: 'far fa-clock' }
   });
  </script>
@endpush