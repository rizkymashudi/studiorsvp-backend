@extends('layouts.customer')
@section('content')
<main class="main-wrapper" id="overview">
    <div class="ps-lg-0">
        <h2 class="text-4xl fw-bold color-palette-1 mb-30">Overview</h2>
        <div class="latest-transaction">
            <p class="text-lg fw-medium color-palette-1 mb-14">Latest Transactions</p>
            <div class="main-content main-content-table overflow-auto shadow p-3 mb-5 bg-body rounded">
                <table class="table table-borderless">
                    <thead>
                        <tr class="color-palette-1 align-middle text-center">
                            <th scope="col">Booking number</th>
                            <th scope="col">Booking date</th>
                            <th scope="col">Schedule</th>
                            <th scope="col">Rent duration</th>
                            <th scope="col">Bill</th>
                            <th scope="col">Payment proof</th>
                            <th scope="col">Status</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($overviews as $overview)
                            <tr class="align-middle text-center">
                                <td><p class="fw-medium color-palette-1 m-0">{{ $overview->reservations_number }}</p></td>
                                <td><p class="fw-medium color-palette-1 m-0">{{ date('j \\ F Y', strtotime($overview->booking_date)) }}</p></td>
                                <td><p class="fw-medium color-palette-1 m-0">{{ date('H:i', strtotime($overview->rent_schedule)) }}</p></td>
                                <td><p class="fw-medium color-palette-1 m-0">{{ $overview->duration }} hours</p></td>
                                <td><p class="fw-medium color-palette-1 m-0"> {{ $overview->total_pay }} </p></td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#showimage{{ $overview->id }}">
                                        <img src="{{ $overview->payment_proof ? Storage::url($overview->payment_proof) : 'https://via.placeholder.com/1280x720' }}" alt="image" style="width: 80px" class="img-thumbnail">
                                    </a>
                                </td>
                                <td>
                                    <div class="align-self-center">
                                        @if ($overview->reservation_status == "COMPLETE")
                                            <span class="float-start icon-status success"></span>
                                        @elseif($overview->reservation_status == "PENDING")
                                            <span class="float-start icon-status pending"></span>
                                        @else
                                            <span class="float-start icon-status failed"></span>
                                        @endif
                                        <p class="fw-medium text-center color-palette-1 m-0 position-relative">
                                            {{ $overview->reservation_status}}
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    @empty($overview->payment_proof)
                                        <a href="#" class="btn btn-light" style="background-color: #6610f2"  data-bs-toggle="modal" data-bs-target="#update{{ $overview->id }}">
                                            <i class="fa fa-pen" style="color: white"></i>
                                        </a>
                                    @endempty
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center p-5" colspan="8">
                                    Data tidak tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @foreach ($overviews as $overview)
                <!-- Modal image-->
                <div class="modal fade" id="showimage{{ $overview->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Booking number {{ $overview->reservations_number }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ $overview->payment_proof ? Storage::url($overview->payment_proof) : 'https://via.placeholder.com/1280x720' }}" alt="poster" style="width: 450px">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="update{{ $overview->id }}">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">Upload payment</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="container-fluid mt-4">
                                <div class="title-text pt-md-50 pt-0">
                                    <h2 class="text-4xl fw-bold color-palette-1 mb-10">Bill</h2>
                                    <p class="text-lg color-palette-1 mb-0">{{ $overview->reservations_number }}</p>
                                </div>
                                <hr>
                                <div class="purchase pt-md-50 pt-10">
                                    <h2 class="fw-bold text-xl color-palette-1 mb-3">Purchase Details</h2>
                                    <table class="table table-borderless">
                                        <tr class="align-middle">
                                            <td><span class="text-lg color-palette-1 mb-20">Your name</span></td>
                                            <td class="text-end"><span class="text-lg color-palette-1 mb-20">{{ $overview->customer->name }}</span></td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td><span class="text-lg color-palette-1 mb-20">Booking number</span></td>
                                            <td class="text-end"><span class="text-lg color-palette-1 mb-20">{{ $overview->reservations_number }}</span></td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td><span class="text-lg color-palette-1 mb-20">Booking date</span></td>
                                            <td class="text-end"><span class="text-lg color-palette-1 mb-20">{{ date('j \\ F Y', strtotime($overview->booking_date)) }}</span></td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td><span class="text-lg color-palette-1 mb-20">Schedule</span></td>
                                            <td class="text-end"><span class="text-lg color-palette-1 mb-20">{{ date('H:i', strtotime($overview->rent_schedule)) }}</span></td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td><span class="text-lg color-palette-1 mb-20">Rent duration (Hours)</span></td>
                                            <td class="text-end"><span class="text-lg color-palette-1 mb-20">{{ $overview->duration}}</span></td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td><span class="text-lg color-palette-1 mb-20">Amount</span></td>
                                            <td class="text-end"><span class="text-lg color-palette-1 mb-20">{{ $overview->duration * 75000 }}</span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="payment pt-md-50 pb-md-10 pt-10 pb-10">
                                    <h2 class="fw-bold text-xl color-palette-1 mb-20">Payment Informations</h2>
                                    <table class="table table-borderless">
                                        <tr class="align-middle">
                                            <td><span class="text-lg color-palette-1 mb-20">Bank Account Name</span></td>
                                            <td class="text-end"><span class="text-lg color-palette-1 mb-20">Rifan's Music Studio</span></td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td><span class="text-lg color-palette-1 mb-20">Bank Name</span></td>
                                            <td class="text-end"><span class="text-lg color-palette-1 mb-20">Mandiri</span></td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td><span class="text-lg color-palette-1 mb-20">Bank Number</span></td>
                                            <td class="text-end"><span class="text-lg color-palette-1 mb-20">1800 - 9090 - 2021</span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="pt-md-10 pb-md-10 pt-10 pb-10">
                                    <img src="{{ url('frontend/assets/img/QR.png') }}" alt="qrcode" style="width: 250px" class="mx-auto d-block">
                                </div>
                            </div>
                            <div class="mx-5 px-4 mb-4">
                                <form action="{{ route('overview.update', $overview->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="input-group my-3">
                                            <input type="file" name="payment" class="form-control" id="inputGroupFile02">
                                        </div>
                                        <span class="text-sm text-danger">*Max upload file 2MB</span><br>
                                        <span class="text-sm text-danger">*JPG, JPEG and PNG</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-light" style="background-color: #6610f2; color:white;">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>         
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection