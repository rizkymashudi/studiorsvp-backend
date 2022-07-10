@extends('layouts.admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Edit studio assets</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6610f2">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('assets.index') }}" style="color: #6610f2">Studio assets</a></li>
              <li class="breadcrumb-item active">Edit studio assets</li>
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
                <h3 class="card-title">Edit {{ $asset->item_name }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('assets.update', $asset->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="assetName">Asset name</label>
                    <input type="text" class="form-control @error('item_name') is-invalid @enderror" placeholder="Enter Asset name" name="item_name" id="assetName" value="{{ old('item_name') ? old('item_name') : $asset->item_name }}">
                    @error('item_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="assetType">Asset type</label>
                    <select class="custom-select rounded-0 @error('type') is-invalid @enderror" id="assetType" name="type" value="{{ old('type') ? old('type') : $asset->type }}">
                      <option selected disabled hidden>- Select type -</option>
                      <option {{ ($asset->type) == "Gitar" ? 'selected' : '' }} value="Gitar">Gitar</option>
                      <option {{ ($asset->type) == "Bass" ? 'selected' : '' }} value="Bass">Bass</option>
                      <option {{ ($asset->type) == "Drum" ? 'selected' : '' }} value="Drum">Drum</option>
                      <option {{ ($asset->type) == "Mic" ? 'selected' : '' }} value="Mic">Mic</option>
                      <option {{ ($asset->type) == "Speaker" ? 'selected' : '' }} value="Speaker">Speaker</option>
                      <option {{ ($asset->type) == "Amplifier" ? 'selected' : '' }} value="Amplifier">Amplifier</option>
                      <option {{ ($asset->type) == "Gendang" ? 'selected' : '' }} value="Gendang">Gendang</option>
                      <option {{ ($asset->type) == "Suling" ? 'selected' : '' }} value="Suling">Suling</option>
                    </select>
                    @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="Quantity">Quantity</label>
                    <input type="number" min="0" class="form-control @error('quantity') is-invalid @enderror" name="quantity" placeholder="quantity" value="{{ old('quantity') ? old('type') : $asset->quantity }}">
                    @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control @error('imgAsset') is-invalid @enderror" id="exampleInputFile" name="imgAsset" value="{{ old('imgAsset') }}">
                      </div>
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