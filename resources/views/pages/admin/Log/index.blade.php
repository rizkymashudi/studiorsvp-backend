@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Activity log</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6610f2;">Home</a></li>
              <li class="breadcrumb-item active">Activity log</li>
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
                      <th>Date</th>
                      <th>Acitivity</th>
                      <th>User</th>
                      <th>Description</th>
                    </tr>
                  </thead>
      
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($logs as $log)
                        <tr>
                          <th>{{ $no }}</th>
                          <th>{{ date('l, j \\ F Y, H:i:s', strtotime($log->created_at)) }}</th>
                          <th>{{ $log->action }}</th>
                          <th>{{ $log->user }}</th>
                          <th>{{ $log->description }}</th>
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