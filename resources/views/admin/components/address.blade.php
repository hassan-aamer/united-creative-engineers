
    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">@lang('attributes.address')
                    ({{ __('attributes.' . $locale) }})
                </label>
                <textarea required name="address[{{ $locale }}]" id="address_{{ $locale }}"
                    class="form-control @error('address.' . $locale) is-invalid @enderror">{{ old('address.' . $locale, isset($result) ? $result->getTranslation('address', $locale) : '') }}</textarea>
                @error('address.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach

