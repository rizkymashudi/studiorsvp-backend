@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6610f2">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
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
                      <th>reservation number</th>
                      <th>total payment</th>
                      <th>total rent duration</th>
                      {{-- <th>CSS grade</th> --}}
                      {{-- <th>Action</th> --}}
                    </tr>
                  </thead>
      
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($reports as $report)
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $report->reservation_id }}</td>
                          <td>{{ $report->payment_total }}</td>
                          <td>{{ $report->total_duration }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @empty
                    <tr>
                      <td class="text-center p-5" colspan="4">
                          Data tidak tersedia
                      </td>
                    </tr>
                    @endforelse
                  </tbody>
  
                </table>
  
                {{-- Modal delete --}}
                <div class="modal fade" tabindex="-1" role="dialog" id="delete">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="box-title d-sm-flex align-items-center justify-content-between">
                                <h5 class="modal-title">Hapus {{ '$kegiatan->activity_name' }}</h5>
                            </div>
                        </div>
                        <div class="modal-body">
                          <p>Anda yakin ingin menghapus jadwal kegiatan ini?</p>
                          <input type="hidden" name="" id="" value="{{ '$kegiatan->id' }}">
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('assets.destroy', '$kegiatan->id') }}" method="post" class="d-inline">
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