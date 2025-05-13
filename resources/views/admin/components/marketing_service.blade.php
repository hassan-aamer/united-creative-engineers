<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label" for="marketing_service">@lang('attributes.marketingService')</label>
        <input type="text" name="marketing_service" parsley-trigger="change" placeholder="@lang('attributes.marketingService')"
            class="form-control @error('marketing_service') is-invalid @enderror" value="{{ old('marketing_service', isset($result) ? $result->marketing_service : '') }}">
        @error('marketing_service')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
