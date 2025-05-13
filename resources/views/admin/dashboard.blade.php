@extends('admin.layouts.master')
@section('title', __('translation.dashboard'))
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Welcome ( {{ Auth::user()->name ?? '' }} )</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <!-- stats with icon -->
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span
                                            class="text-muted text-uppercase fs-12 fw-bold">{{ __('attributes.products') }}</span>
                                        <h3 class="mb-0">{{ $count['products'] }}</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <span class="icon-lg icon-dual-primary" data-feather="shopping-bag"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span
                                            class="text-muted text-uppercase fs-12 fw-bold">{{ __('attributes.services') }}</span>
                                        <h3 class="mb-0">{{ $count['services'] }}</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <span class="icon-lg icon-dual-warning" data-feather="coffee"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span
                                            class="text-muted text-uppercase fs-12 fw-bold">{{ __('attributes.users') }}</span>
                                        <h3 class="mb-0">{{ $count['users'] }}</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <span class="icon-lg icon-dual-success" data-feather="users"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span
                                            class="text-muted text-uppercase fs-12 fw-bold">{{ __('attributes.contuct') }}</span>
                                        <h3 class="mb-0">{{ $count['contacts'] }}</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <span class="icon-lg icon-dual-info" data-feather="file-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- charts -->
                {{-- <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">Today Revenue</span>
                                        <h3 class="mb-0">$2100</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-revenue-chart" class="apex-charts"></div>
                                        <span class="text-success fw-bold fs-13"><i class='uil uil-arrow-up'></i>
                                            10.21%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">Product Sold</span>
                                        <h3 class="mb-0">558</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-product-sold-chart" class="apex-charts">
                                        </div>
                                        <span class="text-danger fw-bold fs-13"><i class='uil uil-arrow-down'></i>
                                            5.05%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">New Customers</span>
                                        <h3 class="mb-0">65</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-new-customer-chart" class="apex-charts">
                                        </div>
                                        <span class="text-success fw-bold fs-13"><i class='uil uil-arrow-up'></i>
                                            25.16%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">New Visitors</span>
                                        <h3 class="mb-0">958</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-new-visitors-chart" class="apex-charts">
                                        </div>
                                        <span class="text-danger fw-bold fs-13"><i class='uil uil-arrow-down'></i>
                                            5.05%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div> <!-- content -->
        </div>
    </div>
@endsection
