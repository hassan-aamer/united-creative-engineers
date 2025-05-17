@extends('admin.layouts.master')
@section('title', __('attributes.products'))
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('attributes.products') }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST"
                                action="{{ isset($result) && $result->id ? route('admin.products.update', $result->id) : route('admin.products.store') }}"
                                class="parsley-examples" enctype="multipart/form-data">
                                @csrf
                                @if (isset($result) && $result->id)
                                    @method('PUT')
                                @endif
                                <div class="row">
                                    @include('admin.components.title')
                                    @include('admin.components.description')
                                    @include('admin.components.content')
                                    @include('admin.components.position')
                                    @include('admin.components.active')
                                    @include('admin.components.ImageUpload', [
                                        'result' => $result ?? null,
                                        'collection' => 'products',
                                    ])
                                    @include('admin.components.ImagesUpload', [
                                        'result' => $result ?? null,
                                        'collection' => 'product_collection',
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
@section('js')
    <script>
        function deleteImage(mediaId, button) {
            if (!confirm('Are you sure you want to delete this photo ?')) return;

            fetch(`/admin/media/${mediaId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        button.parentElement.remove();
                    } else {
                        alert('An error occurred during deletion');
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('Server connection failed');
                });
        }
    </script>
@endsection
