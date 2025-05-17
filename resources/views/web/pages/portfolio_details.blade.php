@extends('web.layouts.app')
@section('title', __('attributes.product_details'))
@section('content')
    <main class="main" style="padding-bottom: 110px;">

        <!-- Page Title -->
        <div class="page-title dark-background">
            <div class="container position-relative">
                <h1>Portfolio Details</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Portfolio Details</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Portfolio Details Section -->
        <section id="portfolio-details" class="portfolio-details section">

            <div class="container" data-aos="fade-up">

                <div class="portfolio-details-slider swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($product->getMedia('product_collection') as $media)
                            <div class="swiper-slide">
                                <img data-src="{{ $media->getUrl('thumb') }}" class="swiper-lazy" alt="Product Image">
                                <div class="swiper-lazy-preloader"></div>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    {{-- <div class="swiper-pagination"></div> --}}

                </div>
                <div class="row justify-content-between gy-4 mt-4">
                    <div class="col-lg-8" data-aos="fade-up">
                        <div class="portfolio-description">
                            <h2>{{ $product->title ?? '' }}</h2>
                            <p>
                                {{ $product->description ?? '' }}</ </p>
                            <p>
                                {{ $product->content ?? '' }}</ </p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Portfolio Details Section -->

    </main>
@endsection
@section('js')
    <script>
        var swiper = new Swiper('.swiper-container', {
            lazy: {
                loadPrevNext: true,
                loadPrevNextAmount: 5,
            },
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
