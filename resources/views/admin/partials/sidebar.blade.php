<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">{{ __("Kontrol Paneli") }}</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">{{ __("Üyeler") }}</span>
            </a>
        </li>
        <li class="treeview">
            <a data-toggle="treeview" class="app-menu__item" href="#">
                <i class="app-menu__icon fa fa-shopping-bag"></i>

                <span class="app-menu__label">{{ __("Ürün Yönetimi") }}</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a data-toggle="treeview-item" class="app-menu__item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                        <i class="app-menu__icon fa fa-shopping-bag"></i>
                        <span class="app-menu__label">{{ __("Ürünler") }}</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.attributes.index' ? 'active' : '' }}" href="{{ route('admin.attributes.index') }}">
                        <i class="app-menu__icon fa fa-th"></i>
                        <span class="app-menu__label">{{ __("Ürün Özellikleri") }}</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.products.order' ? 'active' : '' }}" href="{{ route('admin.products.order') }}">
                        <i class="app-menu__icon fa fa-th"></i>
                        <span class="app-menu__label">{{ __("Ürün Gösterim Sıralamaları") }}</span>
                    </a>
                </li>
                <li>
                    <a data-toggle="treeview-item" class="app-menu__item {{ Route::currentRouteName() == 'admin.statistics.product.view' ? 'active' : '' }}" href="{{ route('admin.statistics.product.view') }}">
                        <i class="app-menu__icon fa fa-shopping-bag"></i>
                        <span class="app-menu__label">{{ __("Tıklanma İstatistikleri") }}</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.statistics.product.cart' ? 'active' : '' }}" href="{{ route('admin.statistics.product.cart') }}">
                        <i class="app-menu__icon fa fa-th"></i>
                        <span class="app-menu__label">{{ __("Sepet İstatistikleri") }}</span>
                    </a>
                </li>
            </ul> 
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">{{ __("Kategoriler") }}</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.badges.index' ? 'active' : '' }}" href="{{ route('admin.badges.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">{{ __("Ürün Etiketleri") }}</span>
            </a>
        </li>
        <li class="treeview">
            <a data-toggle="treeview" class="app-menu__item" href="#">
                <i class="app-menu__icon fa fa-shopping-bag"></i>

                <span class="app-menu__label">{{ __("Sipariş Yönetimi") }}</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a data-toggle="treeview-item" class="app-menu__item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                        <i class="app-menu__icon fa fa-bar-chart"></i>
                        <span class="app-menu__label">{{ __("Siparişler") }}</span>
                    </a>
                </li>
                <li>
                    <a data-toggle="treeview-item" class="app-menu__item {{ Route::currentRouteName() == 'admin.orders.transfers' ? 'active' : '' }}" href="{{ route('admin.orders.transfers') }}">
                        <i class="app-menu__icon fa fa-bar-chart"></i>
                        <span class="app-menu__label">{{ __("Havaleler") }}</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.brands.index' ? 'active' : '' }}" href="{{ route('admin.brands.index') }}">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">{{ __("Markalar") }}</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.sitepages.index' ? 'active' : '' }}" href="{{ route('admin.sitepages.index') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">{{ __("Sayfalar") }}</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.sitesearches.index' ? 'active' : '' }}" href="{{ route('admin.sitesearches.index') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">{{ __("Müşteri Aramaları") }}</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">{{ __("Ayarlar") }}</span>
            </a>
        </li>
    </ul>
</aside>