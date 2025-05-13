@extends('admin.layouts.master')
@section('title', __('attributes.users'))
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('attributes.users') }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST"
                                action="{{ isset($result) && $result->id ? route('admin.users.update', $result->id) : route('admin.users.store') }}"
                                class="parsley-examples" enctype="multipart/form-data">
                                @csrf
                                @if (isset($result) && $result->id)
                                    @method('PUT')
                                @endif
                                <div class="row">
                                    @include('admin.components.name')
                                    @include('admin.components.email')
                                    @include('admin.components.phone')
                                    @include('admin.components.password')
                                    @include('admin.components.ImageUpload', [
                                        'result' => $result ?? null,
                                        'collection' => 'users',
                                    ])
                                    @include('admin.components.role')
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
