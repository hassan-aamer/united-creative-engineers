@extends('web.layouts.app')
@section('title', __('attributes.about'))
@section('content')

    <main>
        @if ($result['about']->count())
            <div class="container py-5">
                <div class="row mt-4">
                    <div class="col-12">
                        <h2 class="text-center">{{ __('attributes.WeSolutions') }}<span
                                style="color:#4DC09A;">{{ __('attributes.Integrated') }}</span></h2>
                    </div>
                </div>
                <div class="container py-5">
                    @foreach ($result['about']->sortBy('position') as $about)
                        <div class="row mt-4 about py-3">
                            <div class="col-12">
                                <h3 class="about-title text-right">{{ $about->title ?? '' }}</h3>
                                <p class="about-description">{{ $about->description ?? '' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($result['WhyUs']->count())
            <!-- Why Choose Us Section -->
            <section class="why-us py-5 bg-light blue-light-bg">
                <div class="container text-center ">
                    <h2 class="section-title">{{ __('attributes.WhyUs') }}</h2>
                    <h3 class="section-subtitle mb-5">{{ __('attributes.WhyChooseFuture') }}</h3>

                    <!-- Add your content here -->
                    @foreach ($result['WhyUs']->chunk(2)->sortBy('position') as $chunk)
                        <div class="row">
                            @foreach ($chunk as $index => $WhyUs)
                                <div class="col-lg-6 mb-4">
                                    <div class="why-us-card {{ $index % 2 == 0 ? 'right-to-left' : 'left-to-right' }}">
                                        <div class="card-inner">
                                            <div class="icon-container">
                                                <svg class="icon-background" width="79" height="79"
                                                    viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                        <img src="{{ asset('web/images/contact.svg') }}" alt="تواصل" class="me-2" width="24"
                            height="24">
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





    </main>
@endsection
