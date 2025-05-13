@extends('web.layouts.app')
@section('title', __('attributes.products'))
@section('content')
    <main>
        @if ($products->count())
            <section class="projects py-5">
                <div class="container text-center">
                    <h2 class="unique-section-title ">منتجاتنا - حلول رقمية مبتكرة لتسهيل أعمالك</h2>
                    <h3 class="unique-section-subtitle products ">في سيف للحجوزات، نقدم لك مجموعة من الأنظمة الذكية التي
                        تساعدك على
                        إدارة أعمالك بكفاءة وسهولة، من الفوترة الإلكترونية إلى تنظيم الحجوزات والخدمات الطبية.</h3>

                    <div class="row justify-content-center">
                        @foreach ($products as $product)
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
    </main>
@endsection
