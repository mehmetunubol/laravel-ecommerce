<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Ödeme Ayarları</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <h5 class="control-label" for="stripe_payment_method">PayTR</h5>
                <select name="paytr_payment_method" id="paytr_payment_method" class="form-control">
                    <option value="1" {{ (config('settings.paytr_payment_method')) == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ (config('settings.paytr_payment_method')) == 0 ? 'selected' : '' }}>Aktif değil</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="paytr_merchant_id">merchant_id</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="PayTR merchant id"
                    id="paytr_merchant_id"
                    name="paytr_merchant_id"
                    value="{{ config('settings.paytr_merchant_id') }}"
                />
            </div>
            <div class="form-group pb-2">
                <label class="control-label" for="paytr_merchant_key">merchant_key</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="PayTR merchant key"
                    id="paytr_merchant_key"
                    name="paytr_merchant_key"
                    value="{{ config('settings.paytr_merchant_key') }}"
                />
            </div>
            <div class="form-group pb-3">
                <label class="control-label" for="paytr_merchant_salt">merchant_salt</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="PayTR merchant salt"
                    id="paytr_merchant_salt"
                    name="paytr_merchant_salt"
                    value="{{ config('settings.paytr_merchant_salt') }}"
                />
            </div>
            <div class="form-group pb-4">
                <label class="control-label" for="paytr_redirect_host">Host Name</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="https://www.siteadi.com"
                    id="paytr_redirect_host"
                    name="paytr_redirect_host"
                    value="{{ config('settings.paytr_redirect_host') }}"
                />
            </div>
            <!--<hr>
            <div class="form-group pt-2">
                <label class="control-label" for="paypal_payment_method">PayPal Payment Method</label>
                <select name="paypal_payment_method" id="paypal_payment_method" class="form-control">
                    <option value="1" {{ (config('settings.paypal_payment_method')) == 1 ? 'selected' : '' }}>Enabled</option>
                    <option value="0" {{ (config('settings.paypal_payment_method')) == 0 ? 'selected' : '' }}>Disabled</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="paypal_client_id">Client ID</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter paypal client Id"
                    id="paypal_client_id"
                    name="paypal_client_id"
                    value="{{ config('settings.paypal_client_id') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="paypal_secret_id">Secret ID</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter paypal secret id"
                    id="paypal_secret_id"
                    name="paypal_secret_id"
                    value="{{ config('settings.paypal_secret_id') }}"
                />
            </div>
        </div>
        -->
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __("Güncelle") }} Settings</button>
                </div>
            </div>
        </div>
    </form>
</div>