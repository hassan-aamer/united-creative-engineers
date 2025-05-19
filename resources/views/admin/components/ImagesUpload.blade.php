<div class="mb-3">
    <label class="form-label" for="example-fileinput">@lang('attributes.images')</label>

    @if (isset($result) && $result->hasMedia($collection))
        <div class="mb-2 d-flex flex-wrap gap-2">
            @foreach ($result->getMedia($collection) as $media)
                <div class="position-relative" style="display: inline-block;">
                    <img src="{{ $media->getUrl() }}" alt="Old Image" class="img-thumbnail"
                        style="height: 100px; width: auto;">

                    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0"
                        style="z-index: 10;" onclick="deleteImage({{ $media->id }}, this)">
                        &times;
                    </button>
                </div>
            @endforeach
        </div>
    @endif

    <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror"
        id="example-fileinput" multiple>
    <progress id="progress-bar" value="0" max="100" style="width: 100%;"></progress>
    <span id="progress-text">0%</span>


    @if ($errors->has('images'))
        @foreach ($errors->get('images') as $error)
            <div class="invalid-feedback d-block">{{ $error }}</div>
        @endforeach
    @endif

    @if ($errors->has('images.*'))
        @foreach ($errors->get('images.*') as $imageErrors)
            @foreach ($imageErrors as $error)
                <div class="invalid-feedback d-block">{{ $error }}</div>
            @endforeach
        @endforeach
    @endif
</div>
@section('js')
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
