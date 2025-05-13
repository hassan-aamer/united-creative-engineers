<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="whatsapp">@lang('attributes.whatsapp')</label>
        <input type="text" name="whatsapp" id="whatsapp" parsley-trigger="change" placeholder="@lang('attributes.whatsapp')"
            class="form-control @error('whatsapp') is-invalid @enderror"
            value="{{ old('whatsapp', isset($result) ? $result->whatsapp : '') }}">
        @error('whatsapp')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
