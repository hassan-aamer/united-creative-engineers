<div class="row">
    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">@lang('attributes.header')
                    ({{ __('attributes.' . $locale) }})
                </label>
                <textarea required name="header[{{ $locale }}]" id="header_{{ $locale }}"
                    class="form-control @error('header.' . $locale) is-invalid @enderror">{{ old('header.' . $locale, isset($result) ? $result->getTranslation('header', $locale) : '') }}</textarea>
                @error('header.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
