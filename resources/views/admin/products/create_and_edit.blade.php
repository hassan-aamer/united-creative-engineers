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
    {{-- <script>
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
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.querySelector('form.parsley-examples').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);
            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');

            const submitBtn = document.getElementById('submit-btn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Uploading...';

            axios.post(form.action, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    onUploadProgress: function(progressEvent) {
                        if (progressEvent.lengthComputable) {
                            const percent = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                            progressBar.value = percent;
                            progressText.innerText = percent + '%';
                        }
                    }
                })
                .then(function(response) {
                    alert('✅Photos have been uploaded and data saved successfully!');
                    window.location.reload();
                })
                .catch(function(error) {
                    console.error(error);
                    alert('❌ An error occurred while uploading photos.');
                })
                .finally(function() {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Save';
                    progressBar.value = 0;
                    progressText.innerText = '0%';
                });
        });

        // حذف الصورة
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
