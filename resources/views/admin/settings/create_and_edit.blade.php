@extends('admin.layouts.master')
@section('title', __('attributes.settings'))
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('attributes.settings') }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST"
                                action="{{ isset($result) && $result->id ? route('admin.settings.update', $result->id) : route('admin.settings.store') }}"
                                class="parsley-examples" enctype="multipart/form-data">
                                @csrf
                                @if (isset($result) && $result->id)
                                    @method('PUT')
                                @endif
                                <div class="row">
                                    @include('admin.components.name')
                                    @include('admin.components.title')
                                    @include('admin.components.email')
                                    @include('admin.components.phone')
                                    @include('admin.components.whatsapp')
                                    @include('admin.components.facebook')
                                    @include('admin.components.twitter')
                                    @include('admin.components.youtube')
                                    @include('admin.components.linkedIn')
                                    @include('admin.components.instagram')
                                    @include('admin.components.snapchat')
                                    @include('admin.components.map')
                                    @include('admin.components.google_play')
                                    @include('admin.components.app_store')
                                    @include('admin.components.header')
                                    @include('admin.components.footer')
                                    @include('admin.components.copyrights')
                                    @include('admin.components.about')
                                    @include('admin.components.address')
                                    @include('admin.components.terms_condition')
                                    @include('admin.components.description')
                                    @include('admin.components.return_description')
                                    @include('admin.components.privacy_description')
                                    @include('admin.components.sales_development')
                                    @include('admin.components.website_designer')
                                    @include('admin.components.marketing_service')
                                    @include('admin.components.clients')
                                    @include('admin.components.ImagesUpload', [
                                        'result' => $result ?? null,
                                        'collection' => 'clients',
                                        'name' => 'images',
                                    ])
                                    @include('admin.components.submit')
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
