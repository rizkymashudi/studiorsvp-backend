@extends('layouts.login')
@section('content')
  <!-- Sign Up -->
  <section class="sign-up mx-auto pt-lg-100 pb-lg-100 pt-30 pb-47">
      <div class="container mx-auto">
          <form action="{{ route('register') }}" method="POST">
            @csrf
              <div class="pb-50">
                <a class="navbar-brand" href="#">
                  <img src="{{ url('frontend/assets/icon/logocnm.png') }}" alt="" width="60" height="60">
                </a>
              </div>
              <h2 class="text-4xl fw-bold color-palette-1 mb-10">Sign Up</h2>
              <p class="text-lg color-palette-1 m-0">Daftar dan bergabung dengan kami</p>
              <div class="pt-50">
                  <label for="name" class="form-label text-lg fw-medium color-palette-1 mb-10">Name</label>
                  <input type="text" class="form-control rounded-pill text-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" aria-describedby="name" placeholder="Enter your name" required autocomplete="name" autofocus>
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="pt-30">
                  <label for="email" class="form-label text-lg fw-medium color-palette-1 mb-10">Email Address</label>
                  <input type="email" class="form-control rounded-pill text-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" aria-describedby="email" placeholder="Enter your email address" required autocomplete="email">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="pt-30">
                  <label for="telephone" class="form-label text-lg fw-medium color-palette-1 mb-10">Phone</label>
                  <input type="tel" class="form-control rounded-pill text-lg @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}" aria-describedby="telephone" placeholder="Enter your phone" required autocomplete="telephone">
                  @error('telephone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="pt-30">
                  <label for="password" class="form-label text-lg fw-medium color-palette-1 mb-10">Password</label>
                  <input type="password" class="form-control rounded-pill text-lg @error('password') is-invalid @enderror" id="password" name="password" aria-describedby="password" placeholder="Your password" required autocomplete="new-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="pt-30">
                <label for="password-confirm" class="form-label text-lg fw-medium color-palette-1 mb-10">Confirm Password</label>
                <input type="password" class="form-control rounded-pill text-lg" id="password-confirm" name="password_confirmation" aria-describedby="password" placeholder="Confirm password" required autocomplete="new-password">
            </div>
              <div class="button-group d-flex flex-column mx-auto pt-50">
                  {{-- <a class="btn btn-sign-up fw-medium text-lg text-white rounded-pill mb-16"
                      href="../src/sign-up-photo.html" role="button">Continue</a> --}}
                  <button type="submit" class="btn btn-sign-up fw-medium text-lg text-white rounded-pill mb-16"
                      role="button">Continue</button>
                  <a class="btn btn-sign-in fw-medium text-lg color-palette-1 rounded-pill" href="{{ route('login') }}"
                      role="button">Sign in</a>
              </div>
          </form>
      </div>
  </section>
@endsection