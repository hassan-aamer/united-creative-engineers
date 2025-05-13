<div class="row">
    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">@lang('attributes.terms_condition')
                    ({{ __('attributes.' . $locale) }})
                </label>
                <textarea required name="terms_condition[{{ $locale }}]" id="terms_condition_{{ $locale }}"
                    class="form-control @error('terms_condition.' . $locale) is-invalid @enderror">{{ old('terms_condition.' . $locale, isset($result) ? $result->getTranslation('terms_condition', $locale) : '') }}</textarea>
                @error('terms_condition.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
