@extends('web.layouts.app')
@section('title', __('attributes.home'))
@section('header')
    @include('web.layouts.headerHome')
@endsection
@section('content')

    @if ($result['services']->count())
        <!-- Services Section -->
        <section class="services py-5" id="services">
            <div class="container text-center">
                <h2 class="section-title">{{ __('attributes.services') }}</h2>
                <h3 class="section-subtitle mb-5">{{ __('attributes.FutureSwordServices') }}</h3>
                <div class="row justify-content-center">
                    <!-- First row: 3 cards on desktop, 2 on tablet, 1 on mobile -->
                    @foreach ($result['services']->sortBy('position') as $service)
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
                            <div class="service-card-container">
                                <div class="service-card">
                                    <a href="{{ route('services.details', $service->id) }}">
                                        <div class="service-card-front">
                                            <div class="icon-container">
                                                <img src="{{ App\Helpers\Image::getMediaUrl($service, 'services') }}"
                                                    alt="{{ $service->title ?? '' }}" class="service-icon">
                                            </div>
                                            <h4>{{ $service->title ?? '' }}</h4>
                                        </div>
                                        <div class="service-card-back">
                                            <div class="back-content">
                                                <h3 class="service-card-title">{{ $service->title ?? '' }}</h3>
                                                <p>{{ $service->description ?? '' }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    @if ($result['sliders']->count())
        <!-- Partners Section -->
        <section class="partners py-4">
            <div class="container-fluid">
                <div class="partners-slider">
                    <div class="slider-track">
                        <!-- First set of logos -->
                        @foreach ($result['sliders']->sortBy('position') as $sliders)
                            <div class="slide">
                                <img src="{{ App\Helpers\Image::getMediaUrl($sliders, 'sliders') }}"
                                    alt="{{ $sliders->title ?? '' }}" class="partner-logo">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($result['products']->count())
        <!-- Projects Section -->
        <section class="projects py-5">
            <div class="container text-center">
                <h2 class="section-title mb-5">{{ __('attributes.DiscoverCollection') }}</h2>
                <h2 class="section-title2 mb-5">{{ __('attributes.BetweenCreativityAndMastery') }}</h2>

                <div class="row justify-content-center">
                    @foreach ($result['products']->sortBy('position') as $product)
                        @php
                            $pattern = [6, 4, 4, 6];
                            $index = ($loop->iteration - 1) % 4;
                            $columnSize = $pattern[$index];
                        @endphp
                        <div class="col-lg-{{ $columnSize }} col-md-12 mb-4 mx-3">
                            <div class="project-card blue-light-bg">
                                <div class="code-icon">
                                    <img src="{{ App\Helpers\Image::getMediaUrl($product, 'products') }}"
                                        alt="{{ $product->title ?? '' }}" class="project-icon-img">
                                </div>
                                <h3 class="project-title">{{ $product->title ?? '' }}</h3>
                                <p class="project-description">{{ $product->description ?? '' }}</p>
                                <div class="text-start mt-3">
                                    <a href="{{ route('product.details', $product->id) }}"
                                        class="btn btn-outline-primary rounded-pill project-btn">
                                        <span class="project-btn-text rounded-pill">رؤية التفاصيل</span>
                                        <i class="fas fa-arrow-left project-btn-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($result['WhyUs']->count())
        <!-- Why Choose Us Section -->
        <section class="why-us py-5 bg-light blue-light-bg">
            <div class="container text-center ">
                <h2 class="section-title">{{ __('attributes.WhyUs') }}</h2>
                <h3 class="section-subtitle mb-5">{{ __('attributes.WhyChooseFuture') }}</h3>
                @foreach ($result['WhyUs']->chunk(2)->sortBy('position') as $chunk)
                    <div class="row">
                        @foreach ($chunk as $index => $WhyUs)
                            <div class="col-lg-6 mb-4">
                                <div class="why-us-card {{ $index % 2 == 0 ? 'right-to-left' : 'left-to-right' }}">
                                    <div class="card-inner">
                                        <div class="icon-container">
                                            <svg class="icon-background" width="79" height="79" viewBox="0 0 79 79"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                            </svg>
                                            <img src="{{ App\Helpers\Image::getMediaUrl($WhyUs, 'WhyUs') }}"
                                                alt="{{ $WhyUs->title ?? '' }}" class="why-us-icon">
                                        </div>
                                        <div class="content">
                                            <h4 class="why-us-title">{{ $WhyUs->title ?? '' }}</h4>
                                            <p class="why-us-text">{{ $WhyUs->description ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section class="cta py-5 bg-light">
        <div class="container text-center">
            <h2 class="section-subtitle mb-4">{{ __('attributes.StartYourDigital') }}</h2>
            <p class="mb-4">{{ setting('description') ?? '' }}</p>

            <a href="{{ route('contact') }}">
                <button class="btn btn-primary rounded-pill px-5 py-3 background-primary contact-btn">
                    <img src="{{ asset('web/images/contact.svg') }}" alt="{{ __('attributes.contuctNow') }}"
                        class="me-2" width="24" height="24">
                    {{ __('attributes.contuctNow') }}
                </button>
            </a>

            <div class="social-links">
                <div>
                    {{ __('attributes.FollowOn') }}
                </div>
                <br>
                <a href="{{ setting('facebook') ?? '' }}" class="social-link">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="{{ setting('instagram') ?? '' }}" class="social-link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="{{ setting('linkedIn') ?? '' }}" class="social-link">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="{{ setting('twitter') ?? '' }}" class="social-link">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>
    </section>


@endsection
