<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="" class="text-nowrap logo-img">
                <img src="{{ asset('assets/general/logo/Logo-sidebar.png') }}" alt="" width="198" height="30">
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: 0px -24px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                            aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px 24px;">
                                <ul id="sidebarnav">
                                    <li class="nav-small-cap">
                                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                        <span class="hide-menu">Home</span>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                            aria-expanded="false">
                                            <span class="d-flex">
                                                <i class="ti ti-building"></i>
                                            </span>
                                            <span class="hide-menu">Profiles</span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse first-level">
                                            <li class="sidebar-item">
                                                <a href="{{ route('visi-misi') }}" class="sidebar-link {{ isRouteActive('visi-misi') ? 'active' : '' }}">
                                                    <div
                                                        class="round-16 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-circle"></i>
                                                    </div>
                                                    <span class="hide-menu">Profile</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="../main/frontend-landingpage.html" class="sidebar-link">
                                                    <div
                                                        class="round-16 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-circle"></i>
                                                    </div>
                                                    <span class="hide-menu">Visi & Misi</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a href="../main/frontend-landingpage.html" class="sidebar-link">
                                                    <div
                                                        class="round-16 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-circle"></i>
                                                    </div>
                                                    <span class="hide-menu">Kata Sambutan</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: auto; height: 888px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar"
                    style="height: 777px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
