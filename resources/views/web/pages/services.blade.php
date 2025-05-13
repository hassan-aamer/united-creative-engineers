@extends('web.layouts.app')
@section('title', __('attributes.services'))
@section('content')
    <main>
        @if ($services->count())
            <!-- Services Section -->
            <section class="services py-5" id="services">
                <div class="container text-center">
                    <h2 class="new-title"> {{ __('attributes.services') }} {{ setting('name') }}</h2>
                    <div class="row justify-content-center">
                        <!-- First row: 3 cards on desktop, 2 on tablet, 1 on mobile -->
                        @foreach ($services->sortBy('position') as $service)
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
                                <div class="service-card-container">
                                    <div class="service-card">
                                        <a href="{{ route('services.details',$service->id) }}">
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
    </main>
@endsection
