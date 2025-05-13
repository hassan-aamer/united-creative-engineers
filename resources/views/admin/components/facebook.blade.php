<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="facebook">@lang('attributes.facebook')</label>
        <input type="text" name="facebook" id="facebook" parsley-trigger="change" placeholder="@lang('attributes.facebook')"
            class="form-control @error('facebook') is-invalid @enderror"
            value="{{ old('facebook', isset($result) ? $result->facebook : '') }}">
        @error('facebook')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
