@extends('layouts.admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Create studio schedules</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6610f2">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('schedules.index') }}" style="color: #6610f2">Studio schedules</a></li>
              <li class="breadcrumb-item active">Create studio schedules</li>
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
                <h3 class="card-title">Input new schedules</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <!-- Date -->
                  <div class="form-group">
                    <label>Date</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input @error('date') is-invalid @enderror" name="date" data-target="#reservationdate" value="{{ old('date') }}"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                  </div>

                  <!-- Date and time -->
                  <div class="form-group">
                    <label>Studio open hour</label>
                      <div class="input-group date" id="openhours" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input @error('open_hours') is-invalid @enderror" name="open_hours" data-target="#openhours" min="08:00" max="23:00" value="{{ old('open_hours') }}"/>
                          <div class="input-group-append" data-target="#openhours" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                          @error('open_hours') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                  </div>

                   <!-- Date and time -->
                  <div class="form-group">
                    <label>Studio close hour</label>
                      <div class="input-group date" id="closehour" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input @error('close_hour') is-invalid @enderror" name="close_hour" data-target="#closehour" value="{{ old('close_hour') }}"/>
                          <div class="input-group-append" data-target="#closehour" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                          @error('close_hour') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
   $('#closehour').datetimepicker({ 
    format: 'HH:mm:ss'
    // icons: { time: 'far fa-clock' }
   });

   $('#openhours').datetimepicker({ 
    format: 'HH:mm:ss'
    // icons: { time: 'far fa-clock' }
   });
  </script>
@endpush