@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">Studio assets</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6610f2">Home</a></li>
            <li class="breadcrumb-item active">Studio assets</li>
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
          <a href="{{ route('assets.create') }}" class="btn float-left" style="background-color: #6610f2; color: #ffffff">
            Create new asset
          </a>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div>
  </section>
  
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
                    <th>Asset name</th>
                    <th>Asset type</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $no = 1;
                  @endphp
                  @forelse ($assets as $asset)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $asset->item_name }}</td>
                    <td>{{ $asset->type }}</td>
                    <td>{{ $asset->quantity }}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#showimage{{ $asset->id }}">
                        <img src="{{ $asset->image ? Storage::url($asset->image) : 'https://via.placeholder.com/1280x720' }}" alt="image" style="width: 50px" class="img-thumbnail">
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pen"></i>
                      </a>
                      <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $asset->id }}">
                          <i class="fa fa-trash"></i>
                      </a>
                    </td>
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

              @foreach ($assets as $asset)
                <!-- Modal image-->
                <div class="modal fade" id="showimage{{ $asset->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="box-title d-sm-flex align-items-center justify-content-between">
                                    <h5 class="modal-title" id="exampleModalLabel">Studio asset {{ $asset->item_name }}</h5>
                                </div>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ $asset->image ? Storage::url($asset->image) : 'https://via.placeholder.com/1280x720' }}" alt="poster" style="width: 450px">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                  {{-- Modal delete --}}
                  <div class="modal fade" tabindex="-1" role="dialog" id="delete{{ $asset->id }}">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <div class="box-title d-sm-flex align-items-center justify-content-between">
                                  <h5 class="modal-title">Hapus {{ $asset->item_name }}</h5>
                              </div>
                          </div>
                          <div class="modal-body">
                            <p>Anda yakin ingin menghapus jadwal kegiatan ini?</p>
                            <input type="hidden" name="" id="" value="{{ '$kegiatan->id' }}">
                          </div>
                          <div class="modal-footer">
                              <form action="{{ route('assets.destroy', $asset->id) }}" method="post" class="d-inline">
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
</div>
@endsection

@push('addon-script')
  <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "ordering": true
        });
      });
  </script>
@endpush