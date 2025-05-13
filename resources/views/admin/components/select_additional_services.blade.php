<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label">{{ __('attributes.additionalServices') }}</label>
        <select name="additionalServices[]" class="form-select wide @error('additionalServices') is-invalid @enderror" multiple
            data-plugin="customselect" data-placeholder="{{ __('attributes.additionalServices') }}">
            @foreach ($additionalServices as $service)
                <option value="{{ $service->id }}"
                    {{ collect(old('services', isset($result) ? $result->additionalServices->pluck('id')->toArray() : []))->contains($service->id) ? 'selected' : '' }}>
                    {{ $service->title ?? '' }}
                </option>
            @endforeach
        </select>

        @error('additionalServices')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
