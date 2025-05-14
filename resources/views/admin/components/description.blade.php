@foreach (config('app.locales') as $locale)
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">@lang('attributes.description')
                ({{ __('attributes.' . $locale) }})
            </label>
            <textarea name="description[{{ $locale }}]" id="description_{{ $locale }}"
                class="form-control @error('description.' . $locale) is-invalid @enderror">{{ old('description.' . $locale, isset($result) ? $result->getTranslation('description', $locale) : '') }}</textarea>
            @error('description.' . $locale)
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
@endforeach
