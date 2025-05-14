
    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="title_{{ $locale }}">
                    @lang('attributes.title') ({{ __('attributes.' . $locale) }})
                </label>
                <input type="text" name="title[{{ $locale }}]" id="title_{{ $locale }}"
                    class="form-control @error('title.' . $locale) is-invalid @enderror"
                    placeholder="@lang('attributes.enter_title') ({{ __('attributes.' . $locale) }})"
                    value="{{ old('title.' . $locale, isset($result) ? $result->getTranslation('title', $locale) : '') }}" 
                    parsley-trigger="change">
                @error('title.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach

