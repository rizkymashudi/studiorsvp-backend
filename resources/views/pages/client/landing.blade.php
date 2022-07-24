@extends('layouts.landing')
@section('content')
    <main>
      <!-- Header -->
      <section class="header pt-lg-60 pb-50" id="header">
        <div class="container-xxl container-fluid py-5">
            <video autoplay loop muted plays-inline class="bg-video">
                <source src="{{ url('frontend/assets/img/video.mp4') }}" type="video/mp4">
            </video>
            <div class="row gap-lg-0 gap-5 my-5">
                <div class="col-lg-6 col-12 my-auto" data-aos="zoom-in">
                    <p class="text-support text-lg color-palette-5">
                        Welcome melodic head!
                    </p>
                    <h1 class="header-title color-palette-5 fw-bold">
                        Discover your <span class="d-sm-inline d-none">true</span><span class="d-sm-none d-inline">
                        </span><span class="underline-blue"> Talent</span> <br class="d-sm-block d-none">on <span
                            class="underline-blue">Music</span>
                    </h1>
                    <p class="mt-30 mb-40 text-lg color-palette-5">Kami menyediakan sewa studio musik untuk membantu kamu<br
                            class="d-md-block d-none"> menjadi pemusik hebat!
                    </p>
                    <div class="d-flex flex-lg-row flex-column gap-4">
                        <a class="btn btn-get text-lg text-white rounded-pill" href="#feature" role="button">Contact us</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 d-lg-block d-none">
                    <div class="d-flex justify-content-lg-end justify-content-center me-lg-5">
                        <div class="position-relative shadow-lg" data-aos="zoom-in">
                            <img src="{{ url('frontend/assets/img/header-banner.png') }}" class="img-fluid" alt="">
                            <div class="card right-card position-absolute border-0">
                                <div class="d-flex align-items-center mb-16 gap-3">
                                    <img src="{{ url('frontend/assets/img/ava.png') }}" width="40" height="40" class="rounded-pill"
                                        alt="">
                                    <div>
                                        <p class="text-sm fw-medium color-palette-1 m-0">Rifan aryo</p>
                                        <p class="text-xs fw-light color-palette-2 m-0">Pro basis</p>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.0489 0.927049C11.3483 0.0057386 12.6517 0.00574004 12.9511 0.927051L14.9187 6.98278C15.0526 7.3948 15.4365 7.67376 15.8697 7.67376H22.2371C23.2058 7.67376 23.6086 8.91338 22.8249 9.48278L17.6736 13.2254C17.3231 13.4801 17.1764 13.9314 17.3103 14.3435L19.2779 20.3992C19.5773 21.3205 18.5228 22.0866 17.7391 21.5172L12.5878 17.7746C12.2373 17.5199 11.7627 17.5199 11.4122 17.7746L6.2609 21.5172C5.47719 22.0866 4.42271 21.3205 4.72206 20.3992L6.68969 14.3435C6.82356 13.9314 6.6769 13.4801 6.32642 13.2254L1.17511 9.48278C0.391392 8.91338 0.794168 7.67376 1.76289 7.67376H8.13026C8.56349 7.67376 8.94744 7.3948 9.08132 6.98278L11.0489 0.927049Z"
                                            fill="#FEBD57" />
                                    </svg>
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.0489 0.927049C11.3483 0.0057386 12.6517 0.00574004 12.9511 0.927051L14.9187 6.98278C15.0526 7.3948 15.4365 7.67376 15.8697 7.67376H22.2371C23.2058 7.67376 23.6086 8.91338 22.8249 9.48278L17.6736 13.2254C17.3231 13.4801 17.1764 13.9314 17.3103 14.3435L19.2779 20.3992C19.5773 21.3205 18.5228 22.0866 17.7391 21.5172L12.5878 17.7746C12.2373 17.5199 11.7627 17.5199 11.4122 17.7746L6.2609 21.5172C5.47719 22.0866 4.42271 21.3205 4.72206 20.3992L6.68969 14.3435C6.82356 13.9314 6.6769 13.4801 6.32642 13.2254L1.17511 9.48278C0.391392 8.91338 0.794168 7.67376 1.76289 7.67376H8.13026C8.56349 7.67376 8.94744 7.3948 9.08132 6.98278L11.0489 0.927049Z"
                                            fill="#FEBD57" />
                                    </svg>
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.0489 0.927049C11.3483 0.0057386 12.6517 0.00574004 12.9511 0.927051L14.9187 6.98278C15.0526 7.3948 15.4365 7.67376 15.8697 7.67376H22.2371C23.2058 7.67376 23.6086 8.91338 22.8249 9.48278L17.6736 13.2254C17.3231 13.4801 17.1764 13.9314 17.3103 14.3435L19.2779 20.3992C19.5773 21.3205 18.5228 22.0866 17.7391 21.5172L12.5878 17.7746C12.2373 17.5199 11.7627 17.5199 11.4122 17.7746L6.2609 21.5172C5.47719 22.0866 4.42271 21.3205 4.72206 20.3992L6.68969 14.3435C6.82356 13.9314 6.6769 13.4801 6.32642 13.2254L1.17511 9.48278C0.391392 8.91338 0.794168 7.67376 1.76289 7.67376H8.13026C8.56349 7.67376 8.94744 7.3948 9.08132 6.98278L11.0489 0.927049Z"
                                            fill="#FEBD57" />
                                    </svg>
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.0489 0.927049C11.3483 0.0057386 12.6517 0.00574004 12.9511 0.927051L14.9187 6.98278C15.0526 7.3948 15.4365 7.67376 15.8697 7.67376H22.2371C23.2058 7.67376 23.6086 8.91338 22.8249 9.48278L17.6736 13.2254C17.3231 13.4801 17.1764 13.9314 17.3103 14.3435L19.2779 20.3992C19.5773 21.3205 18.5228 22.0866 17.7391 21.5172L12.5878 17.7746C12.2373 17.5199 11.7627 17.5199 11.4122 17.7746L6.2609 21.5172C5.47719 22.0866 4.42271 21.3205 4.72206 20.3992L6.68969 14.3435C6.82356 13.9314 6.6769 13.4801 6.32642 13.2254L1.17511 9.48278C0.391392 8.91338 0.794168 7.67376 1.76289 7.67376H8.13026C8.56349 7.67376 8.94744 7.3948 9.08132 6.98278L11.0489 0.927049Z"
                                            fill="#FEBD57" />
                                    </svg>
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.0489 0.927049C11.3483 0.0057386 12.6517 0.00574004 12.9511 0.927051L14.9187 6.98278C15.0526 7.3948 15.4365 7.67376 15.8697 7.67376H22.2371C23.2058 7.67376 23.6086 8.91338 22.8249 9.48278L17.6736 13.2254C17.3231 13.4801 17.1764 13.9314 17.3103 14.3435L19.2779 20.3992C19.5773 21.3205 18.5228 22.0866 17.7391 21.5172L12.5878 17.7746C12.2373 17.5199 11.7627 17.5199 11.4122 17.7746L6.2609 21.5172C5.47719 22.0866 4.42271 21.3205 4.72206 20.3992L6.68969 14.3435C6.82356 13.9314 6.6769 13.4801 6.32642 13.2254L1.17511 9.48278C0.391392 8.91338 0.794168 7.67376 1.76289 7.67376H8.13026C8.56349 7.67376 8.94744 7.3948 9.08132 6.98278L11.0489 0.927049Z"
                                            fill="#FEBD57" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <section class="separator pt-50 pb-50">
        <div class="container-fluid">
            <div class="d-flex flex-lg-row flex-column align-items-center justify-content-center gap-lg-0 gap-4">
                {{--  --}}
            </div>
        </div>
    </section>

      <!-- 3 Column - Feature -->
      <section id="feature" class="feature pt-50">
          <div class="container-fluid mt-5 pt-5">
              <h2 class="text-4xl fw-bold color-palette-5 text-center mb-30">About us</h2>
              <div class="row gap-lg-0 gap-4 my-5 align-items-center justify-content-center" data-aos="fade-up">
                  <div class="col-lg-4">
                      <div class="card feature-card border-0 text-center">
                          <img src="{{ url('frontend/assets/icon/logocnm.png') }}" alt="logo" width="100" height="100" class="mx-auto d-block">
                          <p class="text-lg color-palette-1 mb-0 my-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus deserunt aperiam labore libero veniam praesentium qui voluptatum placeat cumque voluptas? Illum est, nulla molestiae aperiam rem officiis beatae expedita consequatur.</p>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <!-- Reached -->
      <section class="reached pt-50 pb-50">
          <div class="container-fluid">
              <div class="d-flex flex-lg-row flex-column align-items-center justify-content-center gap-lg-0 gap-4">
                  <div class="me-lg-35">
                      <p class="text-4xl text-lg-start text-center color-palette-1 fw-bold m-0">50</p>
                      <p class="text-lg text-lg-start text-center color-palette-2 m-0">Loyal Customers</p>
                  </div>
                  <div class="vertical-line me-lg-35 ms-lg-35 d-lg-block d-none"></div>
                  <div class="horizontal-line mt-6 mb-6 me-lg-35 ms-lg-35 d-lg-none d-block"></div>
                  <div class="me-lg-35 ms-lg-35">
                      <p class="text-4xl text-lg-start text-center color-palette-1 fw-bold m-0">Weekdays and weekend</p>
                      <p class="text-lg text-lg-start text-center color-palette-2 m-0">Studio Available</p>
                  </div>
                  <div class="horizontal-line mt-6 mb-6 me-lg-35 ms-lg-35 d-lg-none d-block"></div>
                  <div class="vertical-line me-lg-35 ms-lg-35 d-lg-block d-none"></div>
                  <div class="me-lg-35 ms-lg-35">
                      <p class="text-4xl text-lg-start text-center color-palette-1 fw-bold m-0">99,9%</p>
                      <p class="text-lg text-lg-start text-center color-palette-2 m-0">Happy Customers</p>
                  </div>
                  <div class="horizontal-line mt-6 mb-6 me-lg-35 ms-lg-35 d-lg-none d-block"></div>
                  <div class="vertical-line me-lg-35 ms-lg-35 d-lg-block d-none"></div>
                  <div class="me-lg-35 ms-lg-35">
                      <p class="text-4xl text-lg-start text-center color-palette-1 fw-bold m-0">4.7</p>
                      <p class="text-lg text-lg-start text-center color-palette-2 m-0">Rating</p>
                  </div>
              </div>
          </div>
      </section>

      <!-- Story -->
      <section class="story pt-50 pb-50" id="contact">
          <div class="container-xxl container-fluid">
              <div class="row align-items-center px-lg-5 mx-auto gap-lg-0 gap-4">
                  <div class="col-lg-7 col-12 d-lg-flex d-none justify-content-lg-end pe-lg-60" data-aos="zoom-in">
                      <img src="{{ url('frontend/assets/img/header-contact.png') }}" width="612" height="452" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-5 col-12 ps-lg-60">
                      <div class="">
                          <h2 class="text-4xl fw-bold color-palette-1 mb-30">Contact us</h2>
                          <p class="text-lg color-palette-1 mb-30">Kami menyediakan sewa studio dan alat musik untuk membantu kamu<br class="d-md-block d-none"> menjadi pemusik hebat!
                          <div class="d-md-block d-flex flex-column w-100">
                              <a class="btn btn-read text-lg rounded-pill" href="#" role="button">Whatsapp</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
    </main>
@endsection