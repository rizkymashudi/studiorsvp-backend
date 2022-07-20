@extends('layouts.customer')
@section('content')
  <main class="main-wrapper">
      <div class="ps-lg-0">
          <h2 class="text-4xl fw-bold color-palette-1 mb-30">Settings</h2>
          <div class="bg-card pt-30 ps-30 pe-30 pb-30">
              <form action="">
                  <div class="pt-30">
                      <label for="name" class="form-label text-lg fw-medium color-palette-1 mb-10">Full Name</label>
                      <input type="text" class="form-control rounded-pill text-lg" id="name" name="name"
                          aria-describedby="name" placeholder="Enter your name">
                  </div>
                  <div class="pt-30">
                      <label for="email" class="form-label text-lg fw-medium color-palette-1 mb-10">Email Address</label>
                      <input type="email" class="form-control rounded-pill text-lg" id="email" name="email"
                          aria-describedby="email" placeholder="Enter your email address">
                  </div>
                  <div class="pt-30">
                      <label for="phone" class="form-label text-lg fw-medium color-palette-1 mb-10">Phone</label>
                      <input type="tel" class="form-control rounded-pill text-lg" id="phone" name="phone" aria-describedby="phone" placeholder="Enter your phone number">
                  </div>
                  <div class="button-group d-flex flex-column pt-50">
                      <button type="submit" class="btn btn-save fw-medium text-lg text-white rounded-pill" style="background-color: #4D17E2;" role="button">Save My Profile</button>
                  </div>
              </form>

          </div>
      </div>
  </main>
@endsection