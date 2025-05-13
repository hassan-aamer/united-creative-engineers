<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="twitter">@lang('attributes.twitter')</label>
        <input type="text" name="twitter" id="twitter" parsley-trigger="change" placeholder="@lang('attributes.twitter')"
            class="form-control @error('twitter') is-invalid @enderror"
            value="{{ old('twitter', isset($result) ? $result->twitter : '') }}">
        @error('twitter')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
