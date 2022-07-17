@extends('layouts.customer')
@section('content')
  <main class="main-wrapper">
    <div class="ps-lg-0">
      <h2 class="text-4xl fw-bold color-palette-1 mb-30">Booking</h2>
      <div class="card">
        <!-- form start -->
        <form  action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="mx-3 my-3">
              <label class="fw-medium color-palette-1" for="exampleFormControlSelect1">Booking Date</label>
              <select class="form-select form-select-md my-2" aria-label=".form-select-md example" name="booking_date">
                <option  selected disabled hidden>Select date</option>
                @foreach ($schedules as $schedule)
                <option value="{{ $schedule->date }}">{{ date('l, j \\ F Y', strtotime($schedule->date)) }}</option>
                @endforeach
              </select>
            </div>

            <div class="detail mx-3 my-3">
              <label class="fw-medium color-palette-1" for="schedule">Booking time</label>
              <div class="row justify-content-between">
                <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="topup1">
                    <input class="d-none" type="radio" id="topup1" name="topup" value="topup1">
                    <div class="detail-card">
                        <div class="d-flex justify-content-between">
                            <p class="text-lg color-palette-1 m-0"><span class="fw-medium">125</span>
                                PM
                            </p>
                            <svg id="icon-check" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="10" r="10" fill="#CDF1FF" />
                                <path d="M5.83301 10L8.46459 12.5L14.1663 7.5" stroke="#00BAFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </label>
                <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10"
                    for="topup2">
                    <input class="d-none" type="radio" id="topup2" name="topup" value="topup2">
                    <div class="detail-card">
                        <div class="d-flex justify-content-between">
                            <p class="text-lg color-palette-1 m-0"><span class="fw-medium">225</span>
                                PM
                            </p>
                            <svg id="icon-check" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="10" r="10" fill="#CDF1FF" />
                                <path d="M5.83301 10L8.46459 12.5L14.1663 7.5" stroke="#00BAFF"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </label>
                <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10"
                    for="topup3">
                    <input class="d-none" type="radio" id="topup3" name="topup" value="topup3">
                    <div class="detail-card">
                        <div class="d-flex justify-content-between">
                            <p class="text-lg color-palette-1 m-0"><span class="fw-medium">350</span>
                                PM
                            </p>
                            <svg id="icon-check" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="10" r="10" fill="#CDF1FF" />
                                <path d="M5.83301 10L8.46459 12.5L14.1663 7.5" stroke="#00BAFF"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </label>
                <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10"
                    for="topup4">
                    <input class="d-none" type="radio" id="topup4" name="topup" value="topup4">
                    <div class="detail-card">
                        <div class="d-flex justify-content-between">
                            <p class="text-lg color-palette-1 m-0"><span class="fw-medium">550</span>
                                PM
                            </p>
                            <svg id="icon-check" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="10" r="10" fill="#CDF1FF" />
                                <path d="M5.83301 10L8.46459 12.5L14.1663 7.5" stroke="#00BAFF"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </label>
                <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="topup5">
                    <input class="d-none" type="radio" id="topup5" name="topup" value="topup5">
                    <div class="detail-card">
                        <div class="d-flex justify-content-between">
                            <p class="text-lg color-palette-1 m-0"><span class="fw-medium">750</span>
                                PM
                            </p>
                            <svg id="icon-check" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="10" r="10" fill="#CDF1FF" />
                                <path d="M5.83301 10L8.46459 12.5L14.1663 7.5" stroke="#00BAFF"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </label>
                <div class="col-lg-2 col-sm-6">
                    <!-- Blank -->
                </div>
              </div>
            </div>

            <div class="mx-3 my-3">
              <label class="fw-medium color-palette-1" for="exampleFormControlSelect1">Rent duration</label>
              <input type="number" class="form-control my-2" min="0">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn" style="background-color: #6610f2; color: #ffffff">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </main>
@endsection