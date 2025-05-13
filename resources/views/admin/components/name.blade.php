    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="name_{{ $locale }}">
                    @lang('attributes.name') ({{ __('attributes.' . $locale) }})
                </label>
                <input type="text" name="name[{{ $locale }}]" id="name_{{ $locale }}"
                    class="form-control @error('name.' . $locale) is-invalid @enderror"
                    placeholder="@lang('attributes.enter_name') ({{ __('attributes.' . $locale) }})"
                    value="{{ old('name.' . $locale, isset($result) ? $result->getTranslation('name', $locale) : '') }}"
                    required parsley-trigger="change">
                @error('name.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
