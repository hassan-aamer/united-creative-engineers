<div class="row">
    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">@lang('attributes.privacy_description')
                    ({{ __('attributes.' . $locale) }})
                </label>
                <textarea required name="privacy_description[{{ $locale }}]" id="privacy_description_{{ $locale }}"
                    class="form-control @error('privacy_description.' . $locale) is-invalid @enderror">{{ old('privacy_description.' . $locale, isset($result) ? $result->getTranslation('privacy_description', $locale) : '') }}</textarea>
                @error('privacy_description.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
