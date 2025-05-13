@extends('web.layouts.app')
@section('title', __('attributes.product_details'))
@section('content')
    <main>
        <!-- Hero Section -->
        <section class="product-hero bg-primary-gradient py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="unique-section-title fw-bold mb-4 ">{{ $product->title ?? '' }}</h1>
                        <h2 class="new-title mb-4"> {{ $product->content ?? '' }} </h2>
                        <p class="lead">{{ $product->description ?? '' }}</p>
                        @if (optional($product->additionalServices)->count())
                            <div class="key-features mt-4">
                                @foreach ($product->additionalServices->sortBy('position') as $additionalServices)
                                    <span class="badge bg-light text-primary me-2 mb-2 p-2">🔹
                                        {{ $additionalServices->title ?? '' }} </span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </section>

        @if (optional($product->features)->count())
            <!-- Services Section -->
            <section class="unique-services py-5" id="services">
                <div class="container text-center">
                    <h2 class="unique-section-title ">{{ __('attributes.feature') }} {{ $product->title ?? '' }} </h2>
                    <br>
                    <div class="row justify-content-center">
                        <!-- Service Card -->
                        @foreach ($product->features->sortBy('position') as $features)
                            <div class="col-6 col-md-4 col-lg-2 mb-4">
                                <div class="unique-service-card">
                                    <div class="unique-service-card-front">
                                        <div class="unique-icon-container">
                                            <img src="{{ App\Helpers\Image::getMediaUrl($features, 'productFeatures') }}"
                                                alt="{{ $features->title ?? '' }}" class="unique-service-icon">
                                        </div>
                                        <h4>{{ $features->title ?? '' }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if (optional($product->services)->count())
            <!-- Benefits Section -->
            <section class="benefits py-5 bg-light">
                <div class="container">
                    <h2 class="unique-section-title  text-center mb-5 ">{{ __('attributes.WhatWill') }}
                        {{ $product->title ?? '' }} {{ __('attributes.ForBusiness') }}</h2>
                    {{-- <h2 class="unique-section-title  text-center mb-5 ">ماذا سيقدم كافي لأعمالك</h2> --}}
                    <div class="row g-4">
                        @foreach ($product->services->sortBy('position') as $services)
                            <div class="col-lg-4 col-md-6">
                                <div class="benefit-card text-center p-4">
                                    <img src="{{ App\Helpers\Image::getMediaUrl($services, 'productServices') }}"
                                        alt="{{ $features->title ?? '' }}" class="unique-service-icon">
                                    <h3 class="h5">{{ $services->title ?? '' }}</h3>
                                    <p>{{ $services->description ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Special Offer Section -->
        <section class="py-5 bg-primary text-white special-offer">
            <div class="container text-center">
                <h2 class="mb-4">🎯 {{ __('attributes.specialOffer') }}</h2>
                <div class="countdown-timer mb-4">
                    <div class="d-flex justify-content-center gap-3">
                        <div class="timer-item">
                            <span id="hours">23</span>
                            <span class="timer-label">{{ __('attributes.hour') }}</span>
                        </div>
                        <div class="timer-item">
                            <span id="minutes">58</span>
                            <span class="timer-label">{{ __('attributes.minute') }}</span>
                        </div>
                        <div class="timer-item">
                            <span id="seconds">46</span>
                            <span class="timer-label">{{ __('attributes.again') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Section -->
        <section class=" py-5">
            <div class="container text-center py-5 bg-light">
                <p class="mb-4">{{ setting('footer') }}</p>

                <a href="{{ route('contact') }}">
                    <button class="btn btn-primary rounded-pill px-5 py-3 background-primary contact-btn">
                        <img src="{{ asset('web/images/contact.svg') }}" alt="تواصل" class="me-2" width="24"
                            height="24">
                        {{ __('attributes.contuctNow') }}
                    </button>
                </a>

            </div>
        </section>
    </main>
@endsection
