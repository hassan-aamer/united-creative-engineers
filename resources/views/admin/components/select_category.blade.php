<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label">{{ __('attributes.categories') }}</label>
        <select name="category_id" data-plugin="customselect" class="form-select"
            data-placeholder="{{ __('attributes.categories') }}">
            <option></option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', isset($result) && $result->category_id == $category->id ? 'selected' : '') }}>
                    {{ $category->title ?? '' }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
