@extends('layouts.customer')
@section('content')
<main class="main-wrapper" id="overview">
    <div class="ps-lg-0">
        <h2 class="text-4xl fw-bold color-palette-1 mb-30">Overview</h2>
        <div class="latest-transaction">
            <p class="text-lg fw-medium color-palette-1 mb-14">Latest Transactions</p>
            <div class="main-content main-content-table overflow-auto">
                <table class="table table-borderless">
                    <thead>
                        <tr class="color-palette-1">
                            <th class="text-start" scope="col">Game</th>
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <th scope="row">
                                <img class="float-start me-3 mb-lg-0 mb-3" src="{{ url('frontend/assets/img/overview-1.png') }}"
                                    width="80" height="60" alt="">
                                <div class="game-title-header">
                                    <p class="game-title fw-medium text-start color-palette-1 m-0">Mobile
                                        Legends:
                                        The New
                                        Battle 2021</p>
                                    <p class="text-xs fw-normal text-start color-palette-2 m-0">Desktop</p>
                                </div>
                            </th>
                            <td>
                                <p class="fw-medium color-palette-1 m-0">200 Gold</p>
                            </td>
                            <td>
                                <p class="fw-medium text-start color-palette-1 m-0">Rp 290.000</p>
                            </td>
                            <td>
                                <div>
                                    <span class="float-start icon-status pending"></span>
                                    <p class="fw-medium text-start color-palette-1 m-0 position-relative">
                                        Pending</p>
                                </div>
                            </td>
                        </tr>
                        <tr class="align-middle text-center">
                            <th scope="row">
                                <img class="float-start me-3 mb-lg-0 mb-3" src="{{ url('frontend/assets/img/overview-2.png') }}"
                                    width="80" height="60" alt="">
                                <div class="game-title-header">
                                    <p class="game-title fw-medium text-start color-palette-1 m-0">Call of
                                        Duty:Modern</p>
                                    <p class="text-xs fw-normal text-start color-palette-2 m-0">Desktop</p>
                                </div>
                            </th>
                            <td>
                                <p class="fw-medium text-start color-palette-1 m-0">550 Gold</p>
                            </td>
                            <td>
                                <p class="fw-medium text-start color-palette-1 m-0">Rp 740.000</p>
                            </td>
                            <td>
                                <div>
                                    <span class="float-start icon-status success"></span>
                                    <p class="fw-medium text-start color-palette-1 m-0 position-relative">
                                        Success</p>
                                </div>
                            </td>
                        </tr>
                        <tr class="align-middle text-center">
                            <th scope="row">
                                <img class="float-start me-3 mb-lg-0 mb-3" src="{{ url('frontend/assets/img/overview-3.png') }}"
                                    width="80" height="60" alt="">
                                <div class="game-title-header">
                                    <p class="game-title fw-medium text-start color-palette-1 m-0">Clash of
                                        Clans</p>
                                    <p class="text-xs fw-normal text-start color-palette-2 m-0">Mobile</p>
                                </div>
                            </th>
                            <td>
                                <p class="fw-medium text-start color-palette-1 m-0">100 Gold</p>
                            </td>
                            <td>
                                <p class="fw-medium text-start color-palette-1 m-0">Rp 120.000</p>
                            </td>
                            <td>
                                <div>
                                    <span class="float-start icon-status failed"></span>
                                    <p class="fw-medium text-start color-palette-1 m-0 position-relative">Failed
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr class="align-middle text-center">
                            <th scope="row">
                                <img class="float-start me-3 mb-lg-0 mb-3" src="{{ url('frontend/assets/img/overview-4.png') }}"
                                    width="80" height="60" alt="">
                                <div class="game-title-header">
                                    <p class="game-title fw-medium text-start color-palette-1 m-0">The Royal
                                        Game</p>
                                    <p class="text-xs fw-normal text-start color-palette-2 m-0">Mobile</p>
                                </div>
                            </th>
                            <td>
                                <p class="fw-medium text-start color-palette-1 m-0">225 Gold</p>
                            </td>
                            <td>
                                <p class="fw-medium text-start color-palette-1 m-0">Rp 200.000</p>
                            </td>
                            <td>
                                <div>
                                    <span class="float-start icon-status pending"></span>
                                    <p class="fw-medium text-start color-palette-1 m-0 position-relative">
                                        Pending</p>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection