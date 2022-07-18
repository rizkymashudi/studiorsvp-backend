@extends('layouts.customer')
@section('content')
  <main class="main-wrapper">
    <div class="ps-lg-0">
      <h2 class="text-4xl fw-bold color-palette-1 mb-30">Booking</h2>
      <div class="card">
        <!-- form start -->
        <form  action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="mx-3 my-3">
              <label class="fw-medium color-palette-1" for="exampleFormControlSelect1">Booking Date</label>
              <select class="form-select form-select-md my-2 @error('booking_date') is-invalid @enderror" aria-label=".form-select-md example" name="booking_date" id="scheduleSelector">
                <option  selected disabled hidden>Select date</option>
                @foreach ($schedules as $schedule)
                <option value="{{ $schedule->date }}">{{ date('l, j \\ F Y', strtotime($schedule->date)) }}</option>
                @endforeach
              </select>
              @error('booking_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Studio not available -->
            <div class="detail mx-3 my-3">
              <label class="fw-medium color-palette-1" for="schedule">Studio not available in</label>
              <div class="row justify-content-start">
                
                <div class="form-group mx-2 my-3 datesNotAvailable" style="display: block">
                  <div class="row justify-content-start">
                    <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="reserved">
                      <input class="d-none @error('bookSchedule') is-invalid @enderror" type="radio" id="reserved" name="reserved" value="" disabled>
                        <div class="detail-card">
                          <div class="d-flex justify-content-around align-items-center">
                            <p class="text-lg color-palette-1 m-0">
                              <span class="fw-medium">Choose the schedule date!</span>
                            </p>
                            <svg id="icon-check" width="50" height="50" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <circle cx="10" cy="10" r="10" fill="#CDF1FF" />
                              <path d="M5.83301 10L8.46459 12.5L14.1663 7.5" stroke="#00BAFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </div>
                        </div>
                        @error('bookSchedule') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </label>
                  </div>
                </div>

                @foreach($schedules as $schedule)
                  <div class="form-group mx-2 my-3 datesNotAvailable border border-primary" id="{{ $schedule->id.$schedule->date }}" style="display: none">
                    <div class="row justify-content-start">
                        <label>{{ date('l, j \\ F Y', strtotime($schedule->date)) }}</label>
                    </div>
                    <div class="row justify-content-start">
                      @php
                        $sub = $schedule->subSchedule;
                        $subSchedules = $sub->sortBy('studio_reserved');
                      @endphp
                      @forelse ($subSchedules as $subSchedule)
                        <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="reserved">
                          <div class="detail-card" style="background-color: #dedede; color: #ffffff;" id="notAvailable{{ $schedule->id.$schedule->date }}">
                              <div class="d-flex justify-content-around align-items-center ">
                                  <p class="text-small color-palette-1 m-0">
                                    <span class="fw-medium">{{ date('H:i', strtotime($subSchedule->studio_reserved)) }}</span> WIB
                                  </p>
                              </div>
                          </div>
                        </label>
                      @empty
                        <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="reserved">
                          <div class="detail-card" style="background-color: #d4d4d4; color: #000000;">
                              <div class="d-flex justify-content-center align-items-center ">
                                  <p class="text-small text-center color-palette-1 m-0">
                                    <h6>no schedule</h6>
                                  </p>
                              </div>
                          </div>
                        </label>
                      @endforelse
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <!-- Studio schedule -->
            <div class="detail mx-3 my-3">
              <label class="fw-medium color-palette-1" for="schedule">Booking time</label>
              <div class="row justify-content-start">
                
                <div class="form-group mx-2 my-3 scheduleDates" style="display: block">
                  <div class="row justify-content-start">
                    <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="reserved">
                      <input class="d-none @error('bookSchedule') is-invalid @enderror" type="radio" id="reserved" name="reserved" value="" disabled>
                        <div class="detail-card">
                          <div class="d-flex justify-content-around align-items-center">
                            <p class="text-lg color-palette-1 m-0">
                              <span class="fw-medium">Choose the schedule date!</span>
                            </p>
                            <svg id="icon-check" width="50" height="50" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <circle cx="10" cy="10" r="10" fill="#CDF1FF" />
                              <path d="M5.83301 10L8.46459 12.5L14.1663 7.5" stroke="#00BAFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </div>
                        </div>
                        @error('bookSchedule') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </label>
                  </div>
                </div>

                @foreach($schedules as $schedule)
                  <div class="form-group mx-2 my-3 scheduleDates" id="{{ $schedule->date }}" style="display: none">
                    <div class="row justify-content-start">
                        <label>{{ date('l, j \\ F Y', strtotime($schedule->date)) }}</label>
                    </div>
                    <div class="row justify-content-start">
                        @php
                            $openHour = date('H', strtotime($schedule->open_hours));
                            $closeHour = date('H', strtotime($schedule->close_hour));
                            $totalHours = $closeHour - $openHour;    
                        @endphp
                        @for ($cardCount = 0; $cardCount < $totalHours; $cardCount++)
                        <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="bookSchedule{{ $schedule->id.$cardCount }}">
                          <input class="d-none @error('bookSchedule') is-invalid @enderror" type="radio" id="bookSchedule{{ $schedule->id.$cardCount }}" name="bookSchedule" value="{{ $openHour }}">
                            <div class="detail-card">
                              <div class="d-flex justify-content-around align-items-center">
                                <p class="text-lg color-palette-1 m-0">
                                  <span class="fw-medium">{{ $openHour }}:00 WIB</span>
                                </p>
                                <svg id="icon-check" width="50" height="50" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <circle cx="10" cy="10" r="10" fill="#CDF1FF" />
                                  <path d="M5.83301 10L8.46459 12.5L14.1663 7.5" stroke="#00BAFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            @error('bookSchedule') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </label>
                        @php
                            $openHour++
                        @endphp
                        @endfor

                    </div>
                  </div>

                  <div class="mx-3">
                    <input type="hidden" class="form-control my-2" name="scheduleID" value="{{ $schedule->id }}">
                  </div>
                @endforeach
              </div>
            </div>

            <div class="mx-3 my-3">
              <label class="fw-medium color-palette-1" for="exampleFormControlSelect1">Rent duration</label>
              <input type="number" class="form-control my-2 @error('rentDuration') is-invalid @enderror" min="0" max="5" name="rentDuration">
              @error('rentDuration') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

@push('addon-script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      $(function() {
        $('#scheduleSelector').change(function(){
          $('.scheduleDates').hide(100);
          $('#' + $(this).val()).show(400);
          console.log("Booking time");
          console.log($('#' + $(this).val()));
          console.log($(this).val());
        });
      });

      $(function() {
        $('#scheduleSelector').change(function(){
          $('.datesNotAvailable').hide(100);
          $('#' + $(this).val()).show(400);
        });
      });
    </script>
@endpush