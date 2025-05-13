<div class="row">
    @foreach (config('app.locales') as $locale)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="question_{{ $locale }}">
                    @lang('attributes.question') ({{ __('attributes.' . $locale) }})
                </label>
                <input type="text" name="question[{{ $locale }}]" id="question_{{ $locale }}"
                    class="form-control @error('question.' . $locale) is-invalid @enderror"
                    placeholder="@lang('attributes.question') ({{ __('attributes.' . $locale) }})"
                    value="{{ old('question.' . $locale, isset($result) ? $result->getTranslation('question', $locale) : '') }}" 
                    parsley-trigger="change">
                @error('question.' . $locale)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    @endforeach
</div>
