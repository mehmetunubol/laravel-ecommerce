<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Genel Ayarlar</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="site_name">Site İsmi</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Site ismini giriniz"
                    id="site_name"
                    name="site_name"
                    value="{{ config('settings.site_name') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="site_title">Site Başlığı</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Site başlığını giriniz"
                    id="site_title"
                    name="site_title"
                    value="{{ config('settings.site_title') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="default_email_address">Email Address</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="Email adresini giriniz."
                    id="default_email_address"
                    name="default_email_address"
                    value="{{ config('settings.default_email_address') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_code">Para birimi</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Para birimini giriniz"
                    id="currency_code"
                    name="currency_code"
                    value="{{ config('settings.currency_code') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_symbol">Para sembolü</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Para birimi sembolünü giriniz"
                    id="currency_symbol"
                    name="currency_symbol"
                    value="{{ config('settings.currency_symbol') }}"
                />
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __("Güncelle") }}</button>
                </div>
            </div>
        </div>
    </form>
</div>