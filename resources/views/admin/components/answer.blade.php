<div class="row">
    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="answer_{{ $locale }}">
                    @lang('attributes.answer') ({{ __('attributes.' . $locale) }})
                </label>
                <input type="text" name="answer[{{ $locale }}]" id="answer_{{ $locale }}"
                    class="form-control @error('answer.' . $locale) is-invalid @enderror"
                    placeholder="@lang('attributes.answer') ({{ __('attributes.' . $locale) }})"
                    value="{{ old('answer.' . $locale, isset($result) ? $result->getTranslation('answer', $locale) : '') }}" 
                    parsley-trigger="change">
                @error('answer.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
