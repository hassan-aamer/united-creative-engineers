<div class="mb-3 col-md-6">
    <label class="form-label d-block" for="active">
        @lang('attributes.active')
    </label>

    <div class="form-check form-check-inline">
        <input class="form-check-input @error('active') is-invalid @enderror" type="radio" name="active" id="active_yes"
            value="1" {{ old('active', isset($result) ? $result->active : '') == '1' ? 'checked' : '' }}>
        <label class="form-check-label" for="active_yes">@lang('attributes.yes')</label>
    </div>

    <div class="form-check form-check-inline" style="margin-left: 20px;">
        <input class="form-check-input @error('active') is-invalid @enderror" type="radio" name="active"
            id="active_no" value="0"
            {{ old('active', isset($result) ? $result->active : '') == '0' ? 'checked' : '' }}>
        <label class="form-check-label" for="active_no">@lang('attributes.no')</label>
    </div>

    @error('active')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
