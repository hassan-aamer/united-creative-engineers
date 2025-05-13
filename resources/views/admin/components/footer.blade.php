<div class="row">
    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">@lang('attributes.footer')
                    ({{ __('attributes.' . $locale) }})
                </label>
                <textarea required name="footer[{{ $locale }}]" id="footer_{{ $locale }}"
                    class="form-control @error('footer.' . $locale) is-invalid @enderror">{{ old('footer.' . $locale, isset($result) ? $result->getTranslation('footer', $locale) : '') }}</textarea>
                @error('footer.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
