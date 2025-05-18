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
