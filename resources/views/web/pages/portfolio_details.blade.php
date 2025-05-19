@extends('web.layouts.app')
@section('title', __('attributes.product_details'))
@section('content')
    <main class="main">

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
        <section id="portfolio-details" class="portfolio-details section"
            style="background-color: #f3efdf;padding-bottom: 130px;">

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
                                <img src="{{ $media->getUrl('thumb') }}" alt="Product Image" loading="lazy">
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
        document.addEventListener('DOMContentLoaded', function() {
            fetch(`/admin/products/{{ $product->id }}/images`)
                .then(response => response.json())
                .then(images => {
                    const wrapper = document.getElementById('product-swiper-images');
                    wrapper.innerHTML = '';

                    images.forEach(image => {
                        const slide = document.createElement('div');
                        slide.className = 'swiper-slide';
                        slide.innerHTML =
                            `<img src="${image.url}" loading="lazy" alt="Product Image" />`;
                        wrapper.appendChild(slide);
                    });

                    new Swiper('.swiper', {
                        loop: true,
                        slidesPerView: 1,
                        spaceBetween: 10,
                    });
                });
        });
    </script>
@endsection
