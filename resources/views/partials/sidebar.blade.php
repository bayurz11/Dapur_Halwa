<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
            <img src="assets/images/logo.png" alt="site logo" class="light-logo">
            <img src="assets/images/logo-light.png" alt="site logo" class="dark-logo">
            <img src="assets/images/logo-icon.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">Product Setting</li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                    <span>Product</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('product_categories') }}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Categories</a>
                    </li>

                    <li>
                        <a href="{{ route('product_setting') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            List</a>
                    </li>

                    <li>
                        <a href="invoice-add.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add
                            new</a>
                    </li>
                    <li>
                        <a href="invoice-edit.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Edit</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-group-title">Company Setting</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>Settings</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('company_setting') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Company</a>
                    </li>
                    {{-- <li>
                        <a href="notification.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Notification</a>
                    </li>
                    <li>
                        <a href="notification-alert.html"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i> Notification
                            Alert</a>
                    </li>
                    <li>
                        <a href="theme.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Theme</a>
                    </li>
                    <li>
                        <a href="currencies.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Currencies</a>
                    </li> --}}
                    <li>
                        <a href="language.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Languages</a>
                    </li>
                    <li>
                        <a href="payment-gateway.html"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Payment Gateway</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
