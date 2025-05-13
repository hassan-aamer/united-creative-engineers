<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label">{{ __('attributes.services') }}</label>
        <select name="services[]" class="form-select wide @error('services') is-invalid @enderror" multiple
            data-plugin="customselect" data-placeholder="{{ __('attributes.services') }}">
            @foreach ($services as $service)
                <option value="{{ $service->id }}"
                    {{ collect(old('services', isset($result) ? $result->services->pluck('id')->toArray() : []))->contains($service->id) ? 'selected' : '' }}>
                    {{ $service->title ?? '' }}
                </option>
            @endforeach
        </select>

        @error('services')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
