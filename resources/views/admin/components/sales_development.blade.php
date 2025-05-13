<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="website_designer">@lang('attributes.websiteDesigner')</label>
        <input type="text" name="website_designer" parsley-trigger="change" placeholder="@lang('attributes.websiteDesigner')"
            class="form-control @error('website_designer') is-invalid @enderror" value="{{ old('website_designer', isset($result) ? $result->website_designer : '') }}">
        @error('website_designer')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
