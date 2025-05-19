@extends('web.layouts.app')
@section('title', __('attributes.services_details'))
@section('content')
    <main class="main" >
        <!-- Page Title -->
        <div class="page-title dark-background">
            <div class="container position-relative">
                <h1>Service Details</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Service Details</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Service Details Section -->
        <section id="service-details" class="service-details section" style="padding-bottom: 180px;">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="services-list">
                            @foreach ($services as $service)
                                <a class="{{ request()->routeIs('services.details') && request()->route('id') == $service->id ? 'active' : '' }}"
                                    href="{{ route('services.details', $service->id) }}">{{ $service->title ?? '' }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                        <img src="assets/img/services.jpg" alt="" class="img-fluid services-img">
                        <h3>{{ $servicesDetails->title ?? '' }}
                        </h3>
                        <p>
                            {{ $servicesDetails->description ?? '' }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Service Details Section -->
    </main>
@endsection
