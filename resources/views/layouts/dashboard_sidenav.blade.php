<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="../../pages/dashboards/dashboard.html">
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
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-properti" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-properti">
                            <i class="ni ni-ungroup text-orange"></i>
                            <span class="nav-link-text">Properti Saya</span>
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
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Properti Favorit</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Membership</span>
                        </a>
                    </li>
                    <li class="nav-item">
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
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-invoice" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-invoice">
                            <i class="ni ni-ungroup text-orange"></i>
                            <span class="nav-link-text">Invoices</span>
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
                            <i class="ni ni-ungroup text-orange"></i>
                            <span class="nav-link-text">Data Follow Up</span>
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
                            <i class="ni ni-ungroup text-orange"></i>
                            <span class="nav-link-text">Database</span>
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

                
                <!-- Divider -->
                <hr class="my-3" />
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">Documentation</h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                            <i class="ni ni-spaceship"></i>
                            <span class="nav-link-text">Getting started</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                            <i class="ni ni-palette"></i>
                            <span class="nav-link-text">Foundation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                            <i class="ni ni-ui-04"></i>
                            <span class="nav-link-text">Components</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                            <i class="ni ni-chart-pie-35"></i>
                            <span class="nav-link-text">Plugins</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>