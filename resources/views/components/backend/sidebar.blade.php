<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/bsn-dashboard.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PPID BSN</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user3-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-cyan">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('/admin/dashboard') }}"
                        class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : 'text-olive' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/profile') }}"
                        class="nav-link {{ Request::is('admin/profile*') ? 'active' : 'text-olive' }}">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Profil PPID
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/contact') }}"
                        class="nav-link {{ Request::is('admin/contact*') ? 'active' : 'text-olive' }}">
                        <i class="nav-icon fas fa-phone-volume"></i>
                        <p>
                            Kontak
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/regulation-list') }}"
                        class="nav-link {{ Request::is('admin/regulation*') ? 'active' : 'text-olive' }}">
                        <i class="nav-icon fas fa-gavel"></i>
                        <p>
                            Regulasi
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/public-information*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('admin/public-information*') ? 'active' : 'text-olive' }}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Informasi Publik
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-2">
                        <li class="nav-item">
                            <a href="{{ url('/admin/public-information/anytime-information-list') }}"
                                class="nav-link {{ Request::is('admin/public-information/anytime-information-list*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Informasi Setiap Saat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/public-information/periodic-information-list') }}"
                                class="nav-link {{ Request::is('admin/public-information/periodic-information-list*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Informasi Berkala</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/public-information/immediately-information-list') }}"
                                class="nav-link {{ Request::is('admin/public-information/immediately-information-list*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Informasi Serta Merta</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/public-information/other-information-list') }}"
                                class="nav-link {{ Request::is('admin/public-information/other-information-list*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Informasi Lainnya</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/pi-service') }}"
                        class="nav-link {{ Request::is('admin/pi-service*') ? 'active' : 'text-olive' }}">
                        <i class="nav-icon fas fa-headset"></i>
                        <p>
                            Layanan Informasi Publik
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/faq') }}"
                        class="nav-link {{ Request::is('admin/faq*') ? 'active' : 'text-olive' }}">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            FAQ
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/master-data*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('admin/master-data*') ? 'active' : 'text-orange' }}">
                        <i class="nav-icon fas fa-gears"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/admin/master-data/regulation') }}"
                                class="nav-link {{ Request::is('admin/master-data/regulation*') ? 'active' : 'text-primary' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Regulasi</p>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/master-data/pi*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('admin/master-data/pi*') ? 'active' : 'text-primary' }}">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Kategori Informasi Publik
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item">
                                    <a href="{{ url('/admin/master-data/pi/anytime-information') }}"
                                        class="nav-link {{ Request::is('admin/master-data/pi/anytime-information*') ? 'active' : '' }}">
                                        <i class="fas fa-star-of-life nav-icon"></i>
                                        <p>Kat. Informasi Setiap Saat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/master-data/pi/periodic-information') }}"
                                        class="nav-link {{ Request::is('admin/master-data/pi/periodic-information*') ? 'active' : '' }}">
                                        <i class="fas fa-star-of-life nav-icon"></i>
                                        <p>Kat. Informasi Berkala</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/master-data/pi/immediately-information') }}"
                                        class="nav-link {{ Request::is('admin/master-data/pi/immediately-information*') ? 'active' : '' }}">
                                        <i class="fas fa-star-of-life nav-icon"></i>
                                        <p>Kat. Informasi Serta Merta</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/master-data/pi/other-information') }}"
                                        class="nav-link {{ Request::is('admin/master-data/pi/other-information*') ? 'active' : '' }}">
                                        <i class="fas fa-star-of-life nav-icon"></i>
                                        <p>Kat. Informasi Lainnya</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">
                    <hr />
                </li>
                <li class="nav-item mb-4">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-link text-danger">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>

    </div>

</aside>
