<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="map">@lang('attributes.map')</label>
        <input type="text" name="map" parsley-trigger="change" placeholder="@lang('attributes.map')"
            class="form-control @error('map') is-invalid @enderror" value="{{ old('map', isset($result) ? $result->map : '') }}">
        @error('map')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
