<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="clients">@lang('attributes.client')</label>
        <input type="text" name="clients" parsley-trigger="change" placeholder="@lang('attributes.client')"
            class="form-control @error('clients') is-invalid @enderror" value="{{ old('clients', isset($result) ? $result->clients : '') }}">
        @error('clients')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
