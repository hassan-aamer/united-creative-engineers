<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label">{{ __('attributes.services') }}</label>
        <select name="service_id" data-plugin="customselect" class="form-select"
            data-placeholder="{{ __('attributes.services') }}">
            <option></option>
            @foreach ($services as $service)
                <option value="{{ $service->id }}"
                    {{ old('service_id', isset($result) && $result->service_id == $service->id ? 'selected' : '') }}>
                    {{ $service->title ?? '' }}
                </option>
            @endforeach
        </select>
        @error('service_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
