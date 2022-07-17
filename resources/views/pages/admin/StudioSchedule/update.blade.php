@extends('layouts.admin')

@push('addon-style')
  <link rel="stylesheet" href="{{ url('frontend/css/detail.css') }}">
@endpush

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Update studio schedules</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6610f2">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('schedules.index') }}" style="color: #6610f2">Studio schedules</a></li>
              <li class="breadcrumb-item active">Update studio schedules</li>
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
                <h3 class="card-title">Update {{ date('l, j \\ F Y', strtotime($schedule->date)) }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('sub-schedule.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="detail form-group">
                    <label>Studio reserved</label>
                    <div class="row justify-content-start">
                      @php
                        $sub = $schedule->subSchedule;
                        $subSchedules = $sub->sortBy('studio_reserved');
                      @endphp
                      @forelse ($subSchedules as $subSchedule)
                        <label class="col-lg-1 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="reserved">
                          <div class="detail-card" style="background-color: #6610f2; color: #ffffff;">
                              <div class="d-flex justify-content-around align-items-center  ">
                                  <p class="text-small color-palette-1 m-0">
                                    <span class="fw-medium">{{ date('H:i', strtotime($subSchedule->studio_reserved)) }}</span> WIB
                                  </p>
                              </div>
                          </div>
                          @error('reserved') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </label>
                      @empty
                        <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="reserved">
                          <div class="detail-card" style="background-color: #d4d4d4; color: #000000;">
                              <div class="d-flex justify-content-center align-items-center ">
                                  <p class="text-small text-center color-palette-1 m-0">
                                    <span class="fw-medium">no schedule</span>
                                  </p>
                              </div>
                          </div>
                        </label>
                      @endforelse
                    </div>
                  </div>
                   <!-- Date and time -->
                  <div class="detail form-group">
                    <label>Choose schedule for reserve</label>
                    <div class="row justify-content-start">
                      @php
                        $openHour
                      @endphp
                      @for($cardCount = 0; $cardCount < $intervalTime; $cardCount++)
                      <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="reserved{{ $cardCount }}">
                        <input class="d-none @error('reserved') is-invalid @enderror" type="radio" id="reserved{{ $cardCount }}" name="reserved" value="{{ $openHour }}:00:00">
                        <div class="detail-card">
                            <div class="d-flex justify-content-around align-items-center  ">
                                <p class="text-lg color-palette-1 m-0">
                                  <span class="fw-medium">{{ $openHour }}</span>
                                    : 00 WIB
                                </p>
                                <svg id="icon-check" width="50" height="50" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="10" fill="#CDF1FF" />
                                    <path d="M5.83301 10L8.46459 12.5L14.1663 7.5" stroke="#00BAFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        @error('reserved') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </label>
                      @php
                        $openHour++
                      @endphp
                      @endfor
                      
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="scheduleID" value="{{ $schedule->id }}">
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
