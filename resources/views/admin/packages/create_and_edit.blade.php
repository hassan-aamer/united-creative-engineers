@extends('admin.layouts.master')
@section('title', __('attributes.packages'))
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('attributes.packages') }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST"
                                action="{{ isset($result) && $result->id ? route('admin.packages.update', $result->id) : route('admin.packages.store') }}"
                                class="parsley-examples" enctype="multipart/form-data">
                                @csrf
                                @if (isset($result) && $result->id)
                                    @method('PUT')
                                @endif
                                <div class="row">
                                    @include('admin.components.title')
                                    @include('admin.components.position')
                                    @include('admin.components.select_package_detalls')
                                    @include('admin.components.active')
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
