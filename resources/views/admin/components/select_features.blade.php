<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label">{{ __('attributes.features') }}</label>
        <select name="features[]" class="form-select wide @error('features') is-invalid @enderror" multiple
            data-plugin="customselect" data-placeholder="{{ __('attributes.features') }}">
            @foreach ($features as $feature)
                <option value="{{ $feature->id }}"
                    {{ collect(old('features', isset($result) ? $result->features->pluck('id')->toArray() : []))->contains($feature->id) ? 'selected' : '' }}>
                    {{ $feature->title ?? '' }}
                </option>
            @endforeach
        </select>

        @error('features')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
