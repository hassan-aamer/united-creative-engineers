<div class="mb-3">
    <label class="form-label" for="example-fileinput">@lang('attributes.images')</label>

    @if (isset($result) && $result->hasMedia($collection))
        <div class="mb-2 d-flex flex-wrap gap-2">
            @foreach ($result->getMedia($collection) as $media)
                <div>
                    <img src="{{ $media->getUrl() }}" alt="Old Image" class="img-thumbnail"
                        style="height: 100px; width: auto;">
                </div>
            @endforeach
        </div>
    @endif

    <input type="file" name="images[]" class="form-control @error('images.*') is-invalid @enderror"
        id="example-fileinput" multiple>

    @error('images.*')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
