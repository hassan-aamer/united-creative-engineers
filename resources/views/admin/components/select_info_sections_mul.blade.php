<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label">{{ __('attributes.infoSections') }}</label>
        <select name="infoSection[]" class="form-select wide @error('infoSection') is-invalid @enderror" multiple
            data-plugin="customselect" data-placeholder="{{ __('attributes.infoSections') }}">
            @foreach ($infoSection as $info)
                <option value="{{ $info->id }}"
                    {{ collect(old('infoSection', isset($result) ? $result->infoSection->pluck('id')->toArray() : []))->contains($info->id) ? 'selected' : '' }}>
                    {{ $info->title ?? '' }}
                </option>
            @endforeach
        </select>

        @error('infoSection')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
