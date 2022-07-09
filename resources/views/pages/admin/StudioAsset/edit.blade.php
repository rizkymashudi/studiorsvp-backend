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
                <h3 class="card-title">Edit current asset</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="AssetName">Asset name</label>
                    <input type="text" class="form-control" placeholder="Enter Asset name">
                  </div>
                  <div class="form-group">
                    <label for="assetType">Asset type</label>
                    <select class="custom-select rounded-0" id="assetType">
                      <option selected disabled hidden>- Select type -</option>
                      <option>Gitar</option>
                      <option>Bass</option>
                      <option>Drum</option>
                      <option>Mic</option>
                      <option>Speaker</option>
                      <option>Amplifier</option>
                      <option>Gendang</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Quantity">Quantity</label>
                    <input type="number" min="0" class="form-control" placeholder="quantity">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
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