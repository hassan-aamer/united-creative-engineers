<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="phone">@lang('attributes.phone')</label>
        <input type="text" name="phone" parsley-trigger="change" placeholder="@lang('attributes.phone')"
            class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', isset($result) ? $result->phone : '') }}">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
