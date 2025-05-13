<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label">{{ __('attributes.developments') }}</label>
        <select name="developments[]" class="form-select wide @error('developments') is-invalid @enderror" multiple
            data-plugin="customselect" data-placeholder="{{ __('attributes.developments') }}">
            @foreach ($developments as $development)
                <option value="{{ $development->id }}"
                    {{ collect(old('developments', isset($result) ? $result->developments->pluck('id')->toArray() : []))->contains($development->id) ? 'selected' : '' }}>
                    {{ $development->title ?? '' }}
                </option>
            @endforeach
        </select>

        @error('developments')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
