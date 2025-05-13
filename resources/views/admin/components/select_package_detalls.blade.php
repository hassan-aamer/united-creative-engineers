<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label">{{ __('attributes.PackageDetails') }}</label>
        <select name="PackageDetails[]" class="form-select wide @error('package_details') is-invalid @enderror" multiple
            data-plugin="customselect" data-placeholder="{{ __('attributes.PackageDetails') }}">
            @foreach ($PackageDetails as $PackageDetail)
                <option value="{{ $PackageDetail->id }}"
                    {{ collect(old('PackageDetails', isset($result) ? $result->PackageDetails->pluck('id')->toArray() : []))->contains($PackageDetail->id) ? 'selected' : '' }}>
                    {{ $PackageDetail->title ?? '' }}
                </option>
            @endforeach
        </select>

        @error('package_details')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
