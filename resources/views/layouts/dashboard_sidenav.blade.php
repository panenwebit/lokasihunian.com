<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ url('') }}">
                <img src="{{ asset('assets/img/logo/logo.png') }}" class="navbar-brand-img" alt="..." />
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboard') }}">
                            <span class="nav-link-text">Dashboard</span>
                            <i class="far fa-tachometer-fastest text-primary ml-auto text-left"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-properti" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-properti">
                            <span class="nav-link-text">Properti Saya</span>
                            <i class="far fa-house text-orange ml-auto"></i>
                        </a>
                        <div class="collapse" id="navbar-properti">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/property/listing/create') }}" class="nav-link">Tambah Baru</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/property/my_listing') }}" class="nav-link">Semua</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/property/my_listing/Live') }}" class="nav-link">Tayang</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/property/my_listing/Pending') }}" class="nav-link">Pending</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/property/my_listing/Expired') }}" class="nav-link">Kadaluarsa</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/property/my_listing/Sold') }}" class="nav-link">Terjual</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/property/my_listing/Archived') }}" class="nav-link">di-Arsipkan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-link-text">Properti Favorit</span>
                            <i class="fas fa-stars text-yellow ml-auto text-left"></i>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-link-text">Keanggotaan</span>
                            <i class="fas fa-id-card text-primary ml-auto text-left"></i>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#navbar-artikel" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-artikel">
                            <i class="ni ni-ungroup text-orange"></i>
                            <span class="nav-link-text">Artikel Saya</span>
                        </a>
                        <div class="collapse" id="navbar-artikel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Semua</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Tayang</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Pending</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Kadaluarsa</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Draft</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#navbar-invoice" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-invoice">
                            <span class="nav-link-text">Invoices</span>
                            <i class="far fa-file-invoice text-green ml-auto text-left"></i>
                        </a>
                        <div class="collapse" id="navbar-invoice">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Semua</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Lunas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Pending</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Kadaluarsa</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboard/bantu_daftar') }}">
                            <span class="nav-link-text">Bantu Daftar</span>
                            <i class="fas fa-hands-helping text-default ml-auto text-left"></i>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-follow-up" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-follow-up">
                            <span class="nav-link-text">Data Follow UP</span>
                            <i class="far fa-people-arrows text-orange ml-auto text-left"></i>
                        </a>
                        <div class="collapse" id="navbar-follow-up">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/follow_up/create') }}" class="nav-link">INPUT Follow UP</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/follow_up') }}" class="nav-link">DATA Follow UP</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/follow_up/my') }}" class="nav-link">Follow UP saya</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-faq" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-faq">
                            <span class="nav-link-text">Faq</span>
                            <i class="far fa-question-square text-info ml-auto"></i>
                        </a>
                        <div class="collapse" id="navbar-faq">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/faq/create') }}" class="nav-link">Tambah Baru</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/faq/index') }}" class="nav-link">Semua</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-strategis" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-strategis">
                            <span class="nav-link-text">Lokasi Strategis</span>
                            <i class="far fa-map-marked-alt text-default ml-auto"></i>
                        </a>
                        <div class="collapse" id="navbar-strategis">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/top_location/create') }}" class="nav-link">Tambah Baru</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/top_location/index') }}" class="nav-link">Semua</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-setting" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-setting">
                            <span class="nav-link-text">Setting</span>
                            <i class="far fa-users-cog text-info ml-auto"></i>
                        </a>
                        <div class="collapse" id="navbar-setting">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/setting/users') }}" class="nav-link">Users</a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/setting/roles') }}" class="nav-link">Roles & Permission</a>
                                </li>
                            </ul>
                            <!-- <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/setting/permissions') }}" class="nav-link">Permissions</a>
                                </li>
                            </ul> -->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-paket" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-paket">
                            <span class="nav-link-text">Paket</span>
                            <i class="far fa-boxes text-green ml-auto text-left"></i>
                        </a>
                        <div class="collapse" id="navbar-paket">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/package/create') }}" class="nav-link">Buat Paket</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/package') }}" class="nav-link">Paket</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-database" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-database">
                            <span class="nav-link-text">Database</span>
                            <i class="far fa-database text-default ml-auto text-left"></i>
                        </a>
                        <div class="collapse" id="navbar-database">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Import</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Export</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>