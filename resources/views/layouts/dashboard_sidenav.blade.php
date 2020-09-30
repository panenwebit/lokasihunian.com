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
                        <a class="nav-link" href="#">
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
                                    <a href="#" class="nav-link">Tambah Baru</a>
                                </li>
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
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-link-text">Properti Favorit</span>
                            <i class="fas fa-stars text-yellow ml-auto text-left"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-link-text">Keanggotaan</span>
                            <i class="fas fa-id-card text-primary ml-auto text-left"></i>
                        </a>
                    </li>
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
                    <li class="nav-item">
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
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-follow-up" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-follow-up">
                            <span class="nav-link-text">Data Follow Up</span>
                            <i class="far fa-people-arrows text-orange ml-auto text-left"></i>
                        </a>
                        <div class="collapse" id="navbar-follow-up">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Follow up saya</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Follow up admin</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Tampilkan semua</a>
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