<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label">{{ __('attributes.infoOption') }}</label>
        <select name="infoOptions[]" class="form-select wide @error('packages') is-invalid @enderror" multiple
            data-plugin="customselect" data-placeholder="{{ __('attributes.infoOption') }}">
            @foreach ($infoOptions as $infoOption)
                <option value="{{ $infoOption->id }}"
                    {{ collect(old('infoOptions', isset($result) ? $result->infoOptions->pluck('id')->toArray() : []))->contains($infoOption->id) ? 'selected' : '' }}>
                    {{ $infoOption->title ?? '' }}
                </option>
            @endforeach
        </select>

        @error('infoOptions')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
