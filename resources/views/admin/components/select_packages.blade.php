<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label">{{ __('attributes.packages') }}</label>
        <select name="packages[]" class="form-select wide @error('packages') is-invalid @enderror" multiple
            data-plugin="customselect" data-placeholder="{{ __('attributes.packages') }}">
            @foreach ($packages as $package)
                <option value="{{ $package->id }}"
                    {{ collect(old('packages', isset($result) ? $result->packages->pluck('id')->toArray() : []))->contains($package->id) ? 'selected' : '' }}>
                    {{ $package->title ?? '' }}
                </option>
            @endforeach
        </select>

        @error('developments')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
