@extends('layouts.customer')
@section('content')
  <main class="main-wrapper">
      <div class="ps-lg-0">
          <h2 class="text-4xl fw-bold color-palette-1 mb-30">Settings</h2>
          <div class="card pt-30 ps-30 pe-30 pb-30 shadow p-3 mb-5 bg-body rounded">
            <div class="card-body mx-5 mb-5">
                <form action="{{ route('profile-settings.update', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="pt-30">
                        <label for="name" class="form-label text-lg fw-medium color-palette-1 mb-10">Full Name</label>
                        <input type="text" class="form-control rounded-pill text-lg @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="name" placeholder="Enter your name">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="pt-30">
                        <label for="email" class="form-label text-lg fw-medium color-palette-1 mb-10">Email Address</label>
                        <input type="email" class="form-control rounded-pill text-lg @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" placeholder="Enter your email address">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="pt-30">
                        <label for="phone" class="form-label text-lg fw-medium color-palette-1 mb-10">Phone</label>
                        <input type="tel" class="form-control rounded-pill text-lg @error('phone') is-invalid @enderror" id="phone" name="phone" aria-describedby="phone" placeholder="Enter your phone number">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="button-group d-flex flex-column pt-50">
                        <button type="submit" class="btn btn-save fw-medium text-lg text-white rounded-pill" style="background-color: #4D17E2;" role="button">Save My Profile</button>
                    </div>
                </form>
            </div>
          </div>
      </div>
  </main>
@endsection