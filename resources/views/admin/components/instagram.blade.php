<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="instagram">@lang('attributes.instagram')</label>
        <input type="text" name="instagram" parsley-trigger="change" placeholder="@lang('attributes.instagram')"
            class="form-control @error('instagram') is-invalid @enderror"
            value="{{ old('instagram', isset($result) ? $result->instagram : '') }}">
        @error('instagram')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
