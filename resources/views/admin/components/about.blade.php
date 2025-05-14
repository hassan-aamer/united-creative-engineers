
    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">@lang('attributes.about')
                    ({{ __('attributes.' . $locale) }})
                </label>
                <textarea required name="about[{{ $locale }}]" id="about_{{ $locale }}"
                    class="form-control @error('about.' . $locale) is-invalid @enderror">{{ old('about.' . $locale, isset($result) ? $result->getTranslation('about', $locale) : '') }}</textarea>
                @error('about.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach

