<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="email">@lang('attributes.email')</label>
        <input type="email" name="email" id="email" parsley-trigger="change" placeholder="@lang('attributes.email')"
            class="form-control @error('email') is-invalid @enderror" value="{{ old('email', isset($result) ? $result->email : '') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
