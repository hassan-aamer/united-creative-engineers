@extends('web.layouts.app')
@section('title', __('attributes.home'))
@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c" class="hero-bg" alt=""
                data-aos="fade-in">
            <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('Icon white.png') }}" class="img-fluid mb-3" alt="" width="90"
                    height="90">
                <h2 class="h5 h2-md h2-lg">
                    <span class="typed" data-typed-items="{{ setting('name') ?? 'UCE' }}"></span>
                </h2>

                <div>
                    <a href="#about" class="cta-btn">Get Started</a>
                    <a href="#services" class="cta-btn2">Our Services</a>
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About</h2>
            </div><!-- End Section Title -->
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ App\Helpers\Image::getMediaUrl(App\Models\Setting::first(), 'about') }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>{{ setting('about') ?? '' }}</h3>
                        <p class="fst-italic">
                            {{ setting('description') ?? '' }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Section -->

        @if ($result['services']->count())
            <!-- Services Section -->
            <section id="services" class="services section light-background">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Services</h2>
                </div><!-- End Section Title -->
                <div class="container">
                    <div class="row gy-4">
                        @foreach ($result['services']->sortBy('position') as $service)
                            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon flex-shrink-0"><img
                                        src="{{ App\Helpers\Image::getMediaUrl($service, 'services') }}" alt=""
                                        width="30" height="30"></div>
                                <div>
                                    <h4 class="title"><a href="{{ route('services.details', $service->id) }}"
                                            class="stretched-link">{{ shortenText($service->title ?? '', 20) }}</a>
                                    </h4>
                                    <p class="description">{{ shortenText($service->description ?? '', 90) }}</p>
                                </div>
                            </div><!-- End Service Item -->
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- /Services Section -->
        @endif

        @if ($result['products']->count())
            <!-- Portfolio Section -->
            <section id="portfolio" class="portfolio section">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Portfolio</h2>
                </div><!-- End Section Title -->
                <div class="container">
                    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                            @foreach ($result['products']->sortBy('position') as $product)
                                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                                    <img src="{{ App\Helpers\Image::getMediaUrl($product, 'products') }}" class="img-fluid"
                                        alt="">
                                    <div class="portfolio-info">
                                        <h4>{{ shortenText($product->title ?? '', 20) }}</h4>
                                        <p>{{ shortenText($product->description ?? '', 40) }}</p>
                                        <a href="{{ App\Helpers\Image::getMediaUrl($product, 'products') }}"
                                            title="{{ shortenText($product->title ?? '', 20) }}"
                                            data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                                class="bi bi-zoom-in"></i></a>
                                        <a href="{{ route('product.details', $product->id) }}" title="More Details"
                                            class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div><!-- End Portfolio Item -->
                            @endforeach
                        </div><!-- End Portfolio Container -->
                    </div>
                </div>
            </section>
            <!-- /Portfolio Section -->
        @endif

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>{{ setting('address') ?? '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>{{ setting('phone') ?? '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>{{ setting('email') ?? '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-8">
                        <form action="{{ route('contact.store') }}" method="POST" class="php-email-form"
                            data-aos="fade-up" data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Your Name"
                                        required="" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Your Email" required=""
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}" name="phone" placeholder="Phone" required="">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="6"
                                        placeholder="Message" required="">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section>
        <!-- /Contact Section -->

    </main>
@endsection
