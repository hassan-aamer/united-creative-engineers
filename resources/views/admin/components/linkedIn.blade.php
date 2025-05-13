<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="linkedIn">@lang('attributes.linkedIn')</label>
        <input type="text" name="linkedIn" parsley-trigger="change" placeholder="@lang('attributes.linkedIn')"
            class="form-control @error('linkedIn') is-invalid @enderror"
            value="{{ old('linkedIn', isset($result) ? $result->linkedIn : '') }}">
        @error('linkedIn')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
