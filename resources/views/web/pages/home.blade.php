@extends('web.layouts.app')
@section('title', __('attributes.home'))
@section('css')
    <style>
        .category-title {
            position: relative;
            display: inline-block;
            font-weight: bold;
        }

        .category-title::after {
            content: "";
            position: absolute;
            display: block;
            width: 100%;
            height: 3px;
            background: var(--accent-color);
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
        }

        .portfolio .portfolio-item .portfolio-info {
            background-color: color-mix(in srgb, var(--surface-color), transparent 35%);
            opacity: 1;
            position: absolute;
            left: 30px;
            right: 30px;
            bottom: 20px;
            z-index: 3;
            transition: all ease-in-out 0.3s;
            padding: 15px;
        }

        .zoom-img {
            overflow: hidden;
            display: inline-block;
            transform: scale(2.1);
        }

        .zoom-img img {
            transition: transform 0.5s ease;
        }

        .zoom-img:hover img {
            transform: scale(1.1);
        }



        @media (max-width: 768px) {
            .category-title {
                font-size: 18px;
            }
        }
    </style>
@endsection
@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c" class="hero-bg" alt=""
                data-aos="fade-in">
            <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('Icon white.png') }}" class="img-fluid mb-3" alt="" width="90"
                    height="90">
                <h5 style="font-weight: bold;" class="h5 h2-md h2-lg">
                    <span class="typedd" data-typed-items=" Welcome to,{{ setting('name') ?? 'UCE' }}"></span>
                </h5>

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
                        <p style="font-style: normal;">
                            {{ setting('description') ?? '' }}
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span style="text-transform: uppercase;">Philosophy of
                                    design</span></li>
                            <li><i class="bi bi-check-circle"></i> <span style="text-transform: uppercase;">Creative
                                    solutions</span></li>
                            <li><i class="bi bi-check-circle"></i> <span style="text-transform: uppercase;">ON-time
                                    delivery</span></li>
                            <li><i class="bi bi-check-circle"></i> <span style="text-transform: uppercase;">PREMIeum
                                    quality</span></li>
                            <li><i class="bi bi-check-circle"></i> <span style="text-transform: uppercase;">competitive
                                    cost</span></li>
                            <li><i class="bi bi-check-circle"></i> <span style="text-transform: uppercase;">customer
                                    satisfaction</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Section -->

        @if ($result['services']->count())
            <!-- Services Section -->
            <section id="services" class="services section light-background" style="background-color: black;">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2 style="color: whitesmoke;">Services</h2>
                </div><!-- End Section Title -->
                <div class="container">
                    <div class="row gy-4">
                        @foreach ($result['services']->sortBy('position') as $service)
                            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon flex-shrink-0"><img
                                        src="{{ App\Helpers\Image::getMediaUrl($service, 'services') }}" alt=""
                                        width="30" height="30"></div>
                                <div>
                                    <h4 class="title text-uppercase"><a style="color: whitesmoke;"
                                            href="{{ route('services.details', $service->id) }}"
                                            class="stretched-link">{{ shortenText($service->title ?? '', 20) }}</a>
                                    </h4>
                                    <p style="color: whitesmoke;" class="description">
                                        {{ shortenText($service->description ?? '', 90) }}</p>
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
            <section id="portfolio" class="portfolio section" style="background-color: #f3efdf;">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Portfolio</h2>
                    {{-- <p>We carry out high-end finishing works that combine quality, good taste, and accuracy in every detail.</p> --}}
                </div><!-- End Section Title -->

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    @foreach ($result['categories']->sortBy('position')->values() as $index => $category)
                        <li class="">
                            <a style="color: black;" href="javascript:void(0);" class="scroll-to-category"
                                data-id="cat-{{ $category->id }}">
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="container">
                    @foreach ($result['categories']->sortBy('position') as $category)
                        <div id="cat-{{ $category->id }}" class="category-section mb-5" data-aos="fade-up"
                            data-aos-delay="100" style="padding-top: 50px;">
                            <div class="text-center">
                                <h4 class="category-title mb-5 text-uppercase"
                                    style="position: relative; font-weight: bold;">
                                    {{ $category->title }}
                                </h4>
                            </div>

                            <div class="row gy-4">
                                @foreach ($result['products']->where('category_id', $category->id)->sortBy('position') as $product)
                                    <div class="col-lg-4 col-md-6 portfolio-item">
                                        <img src="{{ App\Helpers\Image::getMediaUrl($product, 'products') }}"
                                            class="img-fluid" alt="">
                                        <div class="portfolio-info">
                                            <h4 style="text-transform: uppercase;">
                                                {{ shortenText($product->title ?? '', 20) }}</h4>
                                            {{-- @if ($product->description)
                                                <p>{{ shortenText($product->description ?? '', 40) }}</p>
                                            @endif --}}

                                            <a href="{{ App\Helpers\Image::getMediaUrl($product, 'products') }}"
                                                title="{{ shortenText($product->title ?? '', 20) }}"
                                                data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                                <i class="bi bi-zoom-in"></i>
                                            </a>

                                            <a href="{{ route('product.details', $product->id) }}" title="More Details"
                                                class="details-link">
                                                <i class="bi bi-link-45deg"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>
            <!-- /Portfolio Section -->
        @endif

        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Our Projects</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/2.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/1.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/3.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/4.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/5.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/6.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/7.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/8.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/9.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/10.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/11.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="team-member"> --}}
                        <div class="member-img zoom-img">
                            <img src="{{ asset('public/web/clients/12.png') }}" class="img-fluid" alt="">
                        </div>
                        {{-- </div> --}}
                    </div><!-- End Team Member -->
                </div>
            </div>
        </section>

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
                                <p style="color: #21a39f;">{{ setting('phone') ?? '' }}</p>
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
                        <form action="{{ route('contact.store') }}" method="POST" data-aos="fade-up"
                            data-aos-delay="200">
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

                                    <button
                                        style="color: var(--contrast-color);
                                            background: var(--accent-color);
                                            border: 0;
                                            padding: 10px 30px;
                                            transition: 0.4s;
                                            border-radius: 50px;"
                                        type="submit">Send Message</button>
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
@section('js')
    <script>
        document.querySelectorAll('.scroll-to-category').forEach(function(el) {
            el.addEventListener('click', function() {
                let targetId = this.getAttribute('data-id');
                let targetEl = document.getElementById(targetId);

                if (targetEl) {
                    const offset = targetEl.getBoundingClientRect().top + window.scrollY;
                    const offsetWithMargin = offset - 150;
                    window.scrollTo({
                        top: offsetWithMargin,
                        behavior: 'smooth'
                    });
                }
            });
        });
        const selectTyped = document.querySelector('.typedd');
        if (selectTyped) {
            let typed_strings = selectTyped.getAttribute('data-typed-items');
            typed_strings = typed_strings.split(',');
            new Typed('.typedd', {
                strings: typed_strings,
                loop: true,
                startDelay: 0,
                typeSpeed: 50,
                backSpeed: 15,
                backDelay: 1000
            });
        }
    </script>
@endsection
