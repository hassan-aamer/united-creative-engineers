<div class="row">
    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">@lang('attributes.return_description')
                    ({{ __('attributes.' . $locale) }})
                </label>
                <textarea required name="return_description[{{ $locale }}]" id="return_description_{{ $locale }}"
                    class="form-control @error('return_description.' . $locale) is-invalid @enderror">{{ old('return_description.' . $locale, isset($result) ? $result->getTranslation('return_description', $locale) : '') }}</textarea>
                @error('return_description.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
