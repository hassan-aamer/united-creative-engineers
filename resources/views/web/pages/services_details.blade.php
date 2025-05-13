@extends('web.layouts.app')
@section('title', __('attributes.services_details'))
@section('content')
    <main>
        @if (optional($services->developments)->count())
            <!-- Services Section -->
            <section class="unique-services py-5" id="services">
                <div class="container text-center">
                    <h2 class="new-title">{{ __('attributes.IntegratedMarketing') }}</h2>

                    <div class="row justify-content-center">
                        @foreach ($services->developments->sortBy('position') as $developments)
                            <!-- Service Card -->
                            <div class="col-6 col-md-4 col-lg-2 mb-4">
                                <div class="unique-service-card">
                                    <div class="unique-service-card-front">
                                        <div class="unique-icon-container">
                                            <img src="{{ App\Helpers\Image::getMediaUrl($developments, 'developments') }}"
                                                alt="{{ $developments->title ?? '' }}" class="unique-service-icon">
                                        </div>
                                        <h4>{{ $developments->title ?? '' }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if (optional($services->infoSection)->count())
            <section class="unique-services py-5" id="services">
                <div class="container text-center">
                    <br>
                    <h2 class="unique-section-title ">{{ $services->title ?? '' }}</h2>
                    <h3 class="unique-section-subtitle ">{{ $services->description ?? '' }}</h3>
                    <br>
                    <br>
                    <section class="container">
                        <div class="row library-features">
                            @foreach ($services->infoSection->sortBy('position') as $info)
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="feature-card text-center">
                                        <img src="{{ App\Helpers\Image::getMediaUrl($info, 'infoSections') }}"
                                            alt="{{ $info->title ?? '' }}" class="unique-service-icon"
                                            style="margin-bottom: 20px;">
                                        <h4 class="library-title">{{ $info->title ?? '' }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </section>
        @endif


        @if (optional($services->infoSectionDetails)->count())
            <section class="unique-services py-5" id="services">
                <div class="container text-center">
                    <section class="library-experience">
                        <div class="container">
                            <h2 class="text-center mb-5">{{ $services->infoSectionDetails->title ?? '' }}</h2>
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <p>{{ $services->infoSectionDetails->description ?? '' }}</p>
                                    @if (optional($services->infoSectionDetails->infoOptions)->count())
                                        <div class="text-center my-5">
                                            @foreach ($services->infoSectionDetails->infoOptions->sortBy('position') as $infoOptions)
                                                <div class="info-pill"> <img
                                                        src="{{ App\Helpers\Image::getMediaUrl($infoOptions, 'infoOptions') }}"
                                                        alt="{{ $infoOptions->title ?? '' }}" class="unique-service-icon"
                                                        style="width: 20px;height: 20px;margin-left: 10px;">{{ $infoOptions->title ?? '' }}
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <p>{{ $services->infoSectionDetails->content ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        @endif


        @if (optional($services->features)->count())
            <!-- Features Section -->
            <section class="ecommerce-features py-5 blue-light-bg">
                <div class="container">
                    <h2 class="text-center mb-5">كيف سيكون متجرك مع سيف للمستقبل</h2>
                    <div class="row">
                        @foreach ($services->features->sortBy('position') as $features)
                            <div class="col-md-6 mb-4">
                                <div class="feature-card p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="{{ App\Helpers\Image::getMediaUrl($features, 'features') }}"
                                            alt="{{ $features->title ?? '' }}" class="unique-service-icon">
                                        <h3 style="margin-right: 20px;">{{ $features->title ?? '' }}</h3>
                                    </div>
                                    <p class="unique-section-subtitle">{{ $features->description ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif


        @if (optional($services->packages)->count())
            <!-- packages Section -->
            <section class="packages-section text-center" id="packages">

                <div class="container text-center">
                    <h2 class="unique-section-title ">{{ __('attributes.AvailablePackages') }}</h2>
                    <h3 class="unique-section-subtitle ">{{ __('attributes.WeOffer') }}</h3>
                </div>

                <div class="container text-center py-5">
                    <div class="row">
                        @foreach ($services->packages->sortBy('position') as $packages)
                            <div class="col-xl-4">
                                <div class="card card-package">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $packages->title ?? '' }}</h5>
                                        @if (optional($packages->PackageDetails)->count())
                                            @foreach ($packages->PackageDetails as $details)
                                                <p class="card-text"> <i class="fa-solid fa-check">
                                                    </i> {{ $details->title ?? '' }} </p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif


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
