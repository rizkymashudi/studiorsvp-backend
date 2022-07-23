@extends('layouts.login')
@section('content')
<section class="sign-in mx-auto">
  <div class="row">
      <div class="col-xxl-5 col-lg-6 bg-blue pt-lg-145 pb-lg-145 pt-30 pb-47 px-0">
          <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="container mx-auto">
                  <div class="pb-50">
                    <a class="navbar-brand" href="#">
                        <img src="{{ url('frontend/assets/icon/logocnm.png') }}" alt="" width="60" height="60">
                    </a>
                  </div>
                  <h2 class="text-4xl fw-bold color-palette-1 mb-10">Sign In</h2>
                  <p class="text-lg color-palette-1 m-0">Masuk untuk melakukan proses top up</p>
                  <div class="pt-50">
                      <label for="email" class="form-label text-lg fw-medium color-palette-1 mb-10">Email Address</label>
                      <input type="email" class="form-control rounded-pill text-lg @error('email') is-invalid @enderror" id="email" name="email"
                          aria-describedby="email" placeholder="Enter your email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="pt-30">
                      <label for="password" class="form-label text-lg fw-medium color-palette-1 mb-10">Password</label>
                      <input type="password" class="form-control rounded-pill text-lg @error('password') is-invalid @enderror" id="password" name="password" aria-describedby="password" placeholder="Your password" required autocomplete="current-password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div class="button-group d-flex flex-column mx-auto pt-50">
                      <button class="btn btn-sign-in fw-medium text-lg text-white rounded-pill mb-16" type="submit" role="button">Continue to Sign In</button>
                      <!-- <button type="submit"
                          class="btn btn-sign-in fw-medium text-lg text-white rounded-pill mb-16"
                          role="button">Continue to Sign In</button> -->
                      <a class="btn btn-sign-up fw-medium text-lg color-palette-1 rounded-pill" href="{{ route('register') }}" role="button">Sign Up</a>
                  </div>
              </div>
          </form>
      </div>
      <div class="col-xxl-7 col-lg-6 bg-login text-center pt-lg-145 pb-lg-145 d-lg-block d-none">
        <video autoplay loop muted plays-inline class="bg-video">
            <source src="{{ url('frontend/assets/img/video.mp4') }}" type="video/mp4">
        </video>
        <img src="{{ url('frontend/assets/img/header-contact.png') }}" width="502" height="391.21" class="img-fluid pb-50" alt="">
        <h2 class="text-4xl fw-bold text-white mb-30">Discover your true Talent on Music</h2>
        <p class="text-white m-0">Kami menyediakan sewa studio dan <br> alat musik untuk membantu kamu<br class="d-md-block d-none"> menjadi pemusik hebat!
      </div>
  </div>
</section>
    
@endsection