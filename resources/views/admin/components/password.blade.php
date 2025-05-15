<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="password">@lang('attributes.password')</label>
        <input type="password" name="password" id="password" parsley-trigger="change" placeholder="@lang('attributes.password')"
            class="form-control @error('password') is-invalid @enderror" required>
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="password_confirmation">@lang('attributes.password_confirmation')</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="@lang('attributes.password_confirmation')"
            class="form-control @error('password_confirmation') is-invalid @enderror" required>
        @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
