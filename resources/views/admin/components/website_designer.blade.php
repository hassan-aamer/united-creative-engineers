<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="sales_development">@lang('attributes.salesDevelopment')</label>
        <input type="text" name="sales_development" parsley-trigger="change" placeholder="@lang('attributes.salesDevelopment')"
            class="form-control @error('sales_development') is-invalid @enderror" value="{{ old('sales_development', isset($result) ? $result->sales_development : '') }}">
        @error('sales_development')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
