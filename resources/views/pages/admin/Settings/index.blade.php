@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User settings</li>
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Roles</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
      
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($users as $user)
                        <tr>
                          <th>{{ $no }}</th>
                          <th>{{ $user->name }}</th>
                          <th>{{ $user->email }}</th>
                          <th>{{ $user->roles }}</th>
                          <th>{{ date('l, j \\ F Y, H:i:s', strtotime($user->created_at)) }}</th>
                          <th>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $user->id }}">
                              <i class="fa fa-pen"></i>
                            </a>
                          </th>
                        </tr>
                        @php
                          $no++;
                        @endphp
                    @empty
                        <tr>
                          <td class="text-center p-5" colspan="6">
                              Data tidak tersedia
                          </td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>

                @foreach ($users as $user)
                {{-- Modal detail --}}
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit{{ $user->id }}">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="box-title d-sm-flex align-items-center justify-content-between">
                            <h5 class="modal-title">Username {{ $user->name }}</h5>
                        </div>
                      </div>

                      <form action="{{ route('setting.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Change status</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="userRoles">
                                <option  selected disabled hidden>{{ $user->roles }}</option>
                                <option value="USER">USER</option>
                                <option value="ADMIN">ADMIN</option>
                              </select>
                              @error('userRoles') <div class="invalid-feedback">{{ $message }}</div> @enderror
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