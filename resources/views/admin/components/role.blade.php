<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label">{{ __('attributes.role') }}</label>
        <select name="role" data-plugin="customselect" class="form-select"
            data-placeholder="{{ __('attributes.role') }}">
            <option></option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}"
                    {{ old('role', isset($result) && $result->role == $role->id ? 'selected' : '') }}>
                    {{ $role->name ?? '' }}
                </option>
            @endforeach
        </select>
        @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>