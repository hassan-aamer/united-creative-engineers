<div class="col-xl-6 col-sm-4">
    <div class="mb-3 mt-3 mt-sm-0">
        <label class="form-label" for="position">@lang('attributes.position')</label>
        <input type="number" name="position" parsley-trigger="change" placeholder="@lang('attributes.position')"
            class="form-control @error('position') is-invalid @enderror"
            value="{{ old('position', isset($result) ? $result->position : '') }}">
        @error('position')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
