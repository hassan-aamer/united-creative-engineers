<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="youtube">@lang('attributes.youtube')</label>
        <input type="text" name="youtube" id="youtube" parsley-trigger="change" placeholder="@lang('attributes.youtube')"
            class="form-control @error('youtube') is-invalid @enderror"
            value="{{ old('youtube', isset($result) ? $result->youtube : '') }}">
        @error('youtube')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
