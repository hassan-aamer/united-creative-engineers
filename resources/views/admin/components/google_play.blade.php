<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="google_play">@lang('attributes.google_play')</label>
        <input type="text" name="google_play" parsley-trigger="change" placeholder="@lang('attributes.google_play')"
            class="form-control @error('google_play') is-invalid @enderror"
            value="{{ old('google_play', isset($result) ? $result->google_play : '') }}">
        @error('google_play')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
