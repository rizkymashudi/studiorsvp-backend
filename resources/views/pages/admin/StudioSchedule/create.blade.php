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
                  <div class="form-group">
                    <label for="item_name">Asset name</label>
                    <input type="text" class="form-control @error('item_name') is-invalid @enderror" placeholder="Enter Asset name" name="item_name" id="item_name" value="{{ old('item_name') }}">
                    @error('item_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="assetType">Asset type</label>
                    <select class="custom-select rounded-0 @error('type') is-invalid @enderror" id="assetType" name="type" value="{{ old('type') }}">
                      <option selected disabled hidden>- Select type -</option>
                      <option value="Gitar">Gitar</option>
                      <option value="Bass">Bass</option>
                      <option value="Drum">Drum</option>
                      <option value="Mic">Mic</option>
                      <option value="Speaker">Speaker</option>
                      <option value="Amplifier">Amplifier</option>
                      <option value="Gendang">Gendang</option>
                      <option value="Suling">Suling</option>
                    </select>
                    @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="Quantity">Quantity</label>
                    <input type="number" min="0" class="form-control @error('quantity') is-invalid @enderror" name="quantity" placeholder="quantity" value="{{ old('quantity') }}">
                    @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="InputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control @error('imgAsset') is-invalid @enderror" id="InputFile" name="imgAsset" value="{{ old('imgAsset') }}">
                        {{-- <label class="custom-file-label" for="InputFile" value="{{ old('imgAsset') }}">Choose file</label> --}}
                      </div>
                    </div>
                    @error('imgAsset') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <p class="text-danger mt-2">*ukuran gambar tidak bisa lebih dari 1 mb</p>
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