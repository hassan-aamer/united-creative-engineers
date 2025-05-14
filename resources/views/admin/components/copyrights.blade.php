
    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">@lang('attributes.copyrights')
                    ({{ __('attributes.' . $locale) }})
                </label>
                <textarea required name="copyrights[{{ $locale }}]" id="copyrights_{{ $locale }}"
                    class="form-control @error('copyrights.' . $locale) is-invalid @enderror">{{ old('copyrights.' . $locale, isset($result) ? $result->getTranslation('copyrights', $locale) : '') }}</textarea>
                @error('copyrights.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach

