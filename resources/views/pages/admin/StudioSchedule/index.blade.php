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
          <h1 class="m-0">Studio schedules</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6610f2">Home</a></li>
            <li class="breadcrumb-item active">Studio schedules</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-6">
          <a href="{{ route('schedules.create') }}" class="btn float-left" style="background-color: #6610f2; color: #ffffff">
            Create new schedules
          </a>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if($errors->any())
        <h4>{{$errors->first()}}</h4>
      @endif

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Hari</th>
                    <th>open hour</th>
                    <th>close hour</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $no = 1;
                  @endphp
                  @forelse ($schedules as $schedule)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ date('l, j \\ F Y', strtotime($schedule->date)) }}</td>
                    <td>{{ $schedule->open_hours }}</td>
                    <td>{{ $schedule->close_hour }}</td>
                    <td>
                      <a href="#" class="btn btn-sm" style="background-color: #6610f2;" data-toggle="modal" data-target="#detail{{ $schedule->id }}">
                        <i class="fa fa-eye" style="color: #ffffff"></i>
                      </a>
                      <a href="{{ route('sub-schedule.show', $schedule->date) }}" class="btn btn-success btn-sm">
                        <i class="fa fa-calendar-plus"></i>
                      </a>
                      <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pen"></i>
                      </a>
                      <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $schedule->id }}">
                          <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  @php
                    $no++;
                  @endphp
                  @empty
                  <tr>
                      <td class="text-center p-5" colspan="5">
                          Data tidak tersedia
                      </td>
                  </tr>
                  @endforelse
      
                </tbody>
                
              </table>


              @foreach ($schedules as $schedule)
              {{-- Modal detail --}}
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="detail{{ $schedule->id }}">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="box-title d-sm-flex align-items-center justify-content-between">
                          <h5 class="modal-title">Schedule Detail {{ date('l, j \\ F Y', strtotime($schedule->date)) }}</h5>
                      </div>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <dl class="row">
                          <dt class="col-4"><h6><label>Open hour :</label></h6></dt>
                          <dd class="col-8"><h6>{{ $schedule->open_hours }}</h6></dd>
                          <dt class="col-4"><h6><label>Close hour :</label></h6></dt>
                          <dd class="col-8"><h6>{{ $schedule->close_hour }}</h6></dd>
                        </dl>
                      </div>

                      <div class="detail form-group">
                        <label>Studio reserved</label>
                        <div class="row justify-content-start">
                          @php
                            $sub = $schedule->subSchedule;
                            $subSchedules = $sub->sortBy('studio_reserved');
                          @endphp
                          @forelse ($subSchedules as $subSchedule)
                            <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="reserved">
                              <div class="detail-card" style="background-color: #6610f2; color: #ffffff;">
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

                      <div class="detail form-group">
                        <label>Studio schedule</label>
                        <div class="row justify-content-start">
                          @php
                            $isReserved = FALSE;
                            $openHour = date('H', strtotime($schedule->open_hours));
                            $closeHour = date('H', strtotime($schedule->close_hour));
                            $intervalTime = $closeHour - $openHour;
                          @endphp
                

                          @for($cardCount = 0; $cardCount < $intervalTime; $cardCount++)
                          <label class="col-lg-2 col-sm-6 ps-md-15 pe-md-15 pt-md-15 pb-md-15 pt-10 pb-10" for="reserved{{ $cardCount }}">
                              <div class="detail-card">
                                <div class="d-flex justify-content-around align-items-center  ">
                                    <p class="text-small color-palette-1 m-0">
                                      <span class="fw-medium">{{ $openHour }}</span>
                                        : 00 WIB
                                    </p>
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
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              {{-- Modal delete --}}
              <div class="modal fade" tabindex="-1" role="dialog" id="delete{{ $schedule->id }}">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <div class="box-title d-sm-flex align-items-center justify-content-between">
                              <h5 class="modal-title">Hapus {{ date('l, j \\ F Y', strtotime($schedule->date)) }}</h5>
                          </div>
                      </div>
                      <div class="modal-body">
                        <p>Anda yakin ingin menghapus jadwal studio ini?</p>
                        <input type="hidden" name="" id="" value="{{ '$kegiatan->id' }}">
                      </div>
                      <div class="modal-footer">
                          <form action="{{ route('schedules.destroy', $schedule->id) }}" method="post" class="d-inline">
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
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection