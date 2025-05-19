@foreach (config('app.locales') as $locale)
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">@lang('attributes.content')
                ({{ __('attributes.' . $locale) }})
            </label>
            <textarea name="content[{{ $locale }}]" id="content_{{ $locale }}"
                class="form-control @error('content.' . $locale) is-invalid @enderror">{{ old('content.' . $locale, isset($result) ? $result->getTranslation('content', $locale) : '') }}</textarea>
            @error('content.' . $locale)
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
@endforeach
