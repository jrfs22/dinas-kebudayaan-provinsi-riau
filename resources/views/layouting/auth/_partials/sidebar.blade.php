<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="" class="text-nowrap logo-img">
                <img src="{{ asset('assets/general/logo/Logo-sidebar-v2.png') }}" alt="" width="198"
                    height="30">
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
                                    @hasrole('super admin')
                                        <li class="sidebar-item">
                                            <a class="sidebar-link has-arrow {{ isRouteActive('news.create') ? 'active' : (isRouteActive('news.edit') ? 'active' : '') }}"
                                                href="javascript:void(0)" aria-expanded="false">
                                                <span class="d-flex">
                                                    <i class="ti ti-news"></i>
                                                </span>
                                                <span class="hide-menu">Berita</span>
                                            </a>
                                            <ul aria-expanded="false"
                                                class="collapse first-level {{ isRouteActive('news.create') ? 'in' : (isRouteActive('news.edit') ? 'in' : '') }}">
                                                <li class="sidebar-item">
                                                    <a href="{{ route('news.category') }}" class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Kategori</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('news') }}"
                                                        class="sidebar-link {{ isRouteActive('news.create') ? 'active' : (isRouteActive('news.edit') ? 'active' : '') }}">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">List</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="sidebar-item">
                                            <a class="sidebar-link {{ isRouteActive('news.create') ? 'active' : (isRouteActive('news.edit') ? 'active' : '') }}"
                                                href="{{ route('news') }}" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-news"></i>
                                                </span>
                                                <span class="hide-menu">Berita</span>
                                            </a>
                                        </li>
                                    @endhasrole
                                    @hasrole('super admin')
                                        <li class="sidebar-item">
                                            <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                                aria-expanded="false">
                                                <span class="d-flex">
                                                    <i class="ti ti-photo"></i>
                                                </span>
                                                <span class="hide-menu">Gallery</span>
                                            </a>
                                            <ul aria-expanded="false" class="collapse first-level">
                                                <li class="sidebar-item">
                                                    <a href="{{ route('gallery.category') }}" class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Kategori</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('gallery') }}" class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Gallery</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" href="{{ route('gallery') }}" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-photo"></i>
                                                </span>
                                                <span class="hide-menu">Gallery</span>
                                            </a>
                                        </li>
                                    @endhasrole

                                    @hasrole('super admin')
                                        <li class="sidebar-item">
                                            <a class="sidebar-link has-arrow {{ isRouteActive('agenda.create') ? 'active' : (isRouteActive('agenda.edit') ? 'active' : '') }}"
                                                href="javascript:void(0)" aria-expanded="false">
                                                <span class="d-flex">
                                                    <i class="ti ti-calendar"></i>
                                                </span>
                                                <span class="hide-menu">Agenda</span>
                                            </a>
                                            <ul aria-expanded="false"
                                                class="collapse first-level {{ isRouteActive('agenda.create') ? 'in' : (isRouteActive('agenda.edit') ? 'in' : '') }}">
                                                <li class="sidebar-item">
                                                    <a href="{{ route('agenda.category') }}" class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Kategori</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('agenda') }}"
                                                        class="sidebar-link {{ isRouteActive('agenda.create') ? 'active' : (isRouteActive('agenda.edit') ? 'active' : '') }}">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Agenda</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="sidebar-item">
                                            <a class="sidebar-link {{ isRouteActive('agenda.create') ? 'active' : (isRouteActive('agenda.edit') ? 'active' : '') }}"
                                                href="{{ route('agenda') }}" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-calendar"></i>
                                                </span>
                                                <span class="hide-menu">Agenda</span>
                                            </a>
                                        </li>
                                    @endhasrole
                                    @hasrole('super admin|admin')
                                        @if (in_array(auth()->user()->departement, ['super admin', 'UPT Museum']))
                                            <li class="sidebar-item">
                                                <a class="sidebar-link has-arrow {{ isRouteActive('klasifikasi.create') ? 'active' : (isRouteActive('klasifikasi.edit') ? 'active' : '') }}"
                                                    href="javascript:void(0)" aria-expanded="false">
                                                    <span class="d-flex">
                                                        <i class="ti ti-wall"></i>
                                                    </span>
                                                    <span class="hide-menu">Klasifikasi</span>
                                                </a>
                                                <ul aria-expanded="false"
                                                    class="collapse first-level {{ isRouteActive('klasifikasi.create') ? 'in' : (isRouteActive('klasifikasi.edit') ? 'in' : '') }}">
                                                    <li class="sidebar-item">
                                                        <a href="{{ route('klasifikasi.category') }}"
                                                            class="sidebar-link">
                                                            <div
                                                                class="round-16 d-flex align-items-center justify-content-center">
                                                                <i class="ti ti-circle"></i>
                                                            </div>
                                                            <span class="hide-menu">Kategori</span>
                                                        </a>
                                                    </li>
                                                    <li class="sidebar-item">
                                                        <a href="{{ route('klasifikasi') }}"
                                                            class="sidebar-link {{ isRouteActive('klasifikasi.create') ? 'active' : (isRouteActive('klasifikasi.edit') ? 'active' : '') }}">
                                                            <div
                                                                class="round-16 d-flex align-items-center justify-content-center">
                                                                <i class="ti ti-circle"></i>
                                                            </div>
                                                            <span class="hide-menu">List</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                    @endrole

                                    @hasrole('super admin')
                                        <li class="sidebar-item">
                                            <a class="sidebar-link has-arrow {{ isRouteActive('ppid.files') ? 'active' : '' }}"
                                                href="javascript:void(0)" aria-expanded="false">
                                                <span class="d-flex">
                                                    <i class="ti ti-file-info"></i>
                                                </span>
                                                <span class="hide-menu">PPID</span>
                                            </a>
                                            <ul aria-expanded="false"
                                                class="collapse first-level {{ isRouteActive('ppid.files') ? 'in' : '' }}">
                                                <li class="sidebar-item">
                                                    <a href="{{ route('ppid.category') }}" class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Kategori</span>
                                                    </a>
                                                </li>
                                                @foreach ($ppid_categories as $item)
                                                    <li class="sidebar-item">
                                                        <a href="{{ route('ppid', ['id' => $item->id]) }}"
                                                            class="sidebar-link">
                                                            <div
                                                                class="round-16 d-flex align-items-center justify-content-center">
                                                                <i class="ti ti-circle"></i>
                                                            </div>
                                                            <span class="hide-menu break-line">
                                                                {{ $item->name }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link {{ isRouteActive('survey.questions') ? 'active' : (isRouteActive('survey.responden') ? 'active' : '') }}"
                                                href="{{ route('survey') }}" aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-zoom-question"></i>
                                                </span>
                                                <span class="hide-menu">Survey</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" href="{{ route('contact_us') }}"
                                                aria-expanded="false">
                                                <span>
                                                    <i class="ti ti-mail"></i>
                                                </span>
                                                <span class="hide-menu">Pesan</span>
                                            </a>
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
                                                    <a href="{{ route('profiles', ['type' => 'sejarah']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Sejarah</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('profiles', ['type' => 'struktur-organisasi']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Struktur Organisasi</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('profiles', ['type' => 'visi']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Visi</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('profiles', ['type' => 'misi']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Misi</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('profiles', ['type' => 'kata-sambutan']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Kata Sambutan</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('profiles', ['type' => 'tugas-pokok']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Fungsi & Tugas</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('profiles', ['type' => 'kontak']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Kontak</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('profiles', ['type' => 'sop']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">SOP</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link has-arrow {{ isRouteActive('settings.edit') ? 'active' : '' }}"
                                                href="javascript:void(0)" aria-expanded="false">
                                                <span class="d-flex">
                                                    <i class="ti ti-settings"></i>
                                                </span>
                                                <span class="hide-menu">Settings</span>
                                            </a>
                                            <ul aria-expanded="false"
                                                class="collapse first-level {{ isRouteActive('settings.edit') ? 'in' : '' }}">
                                                <li class="sidebar-item">
                                                    <a href="{{ route('settings', ['type' => 'breadcrumb']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Breadcrumb</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('settings', ['type' => 'hero']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Hero Section</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('settings', ['type' => 'tentang-kami']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Tentang Kami</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('settings', ['type' => 'museum']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">UPT Museum</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('settings', ['type' => 'sitari']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Sitari</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('settings', ['type' => 'footer']) }}"
                                                        class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Footer</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link has-arrow "
                                                href="javascript:void(0)" aria-expanded="false">
                                                <span class="d-flex">
                                                    <i class="ti ti-users"></i>
                                                </span>
                                                <span class="hide-menu">Pengguna</span>
                                            </a>
                                            <ul aria-expanded="false"
                                                class="collapse first-level">
                                                <li class="sidebar-item">
                                                    <a href="{{ route('departement') }}" class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">Departement</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-item">
                                                    <a href="{{ route('pengguna') }}" class="sidebar-link">
                                                        <div
                                                            class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu">List</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endhasrole
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
    </div>
</aside>
