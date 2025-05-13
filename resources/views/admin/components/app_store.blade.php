<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="app_store">@lang('attributes.app_store')</label>
        <input type="text" name="app_store" id="app_store" parsley-trigger="change" placeholder="@lang('attributes.app_store')"
            class="form-control @error('app_store') is-invalid @enderror"
            value="{{ old('app_store', isset($result) ? $result->app_store : '') }}">
        @error('app_store')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
