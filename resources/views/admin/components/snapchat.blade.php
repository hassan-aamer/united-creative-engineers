<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="snapchat">@lang('attributes.snapchat')</label>
        <input type="text" name="snapchat" id="snapchat" parsley-trigger="change" placeholder="@lang('attributes.snapchat')"
            class="form-control @error('snapchat') is-invalid @enderror"
            value="{{ old('snapchat', isset($result) ? $result->snapchat : '') }}">
        @error('snapchat')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
