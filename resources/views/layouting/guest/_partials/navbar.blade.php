<header
    style="background-color: white;"
    class="bg-edyellow ed-header--2 relative z-[2] px-[7.9%] xxxxl:px-[6.5%] xxxl:px-[1%] lg:px-[15px] py-[25px] xxs:py-[16px] flex items-center justify-between to-be-fixed">
    <div class="logo xxs:max-w-[40%]">
        <a href="{{ route('beranda') }}" class="flex space-x-2">
            <img src="{{ asset('assets/guest/img/image/logo-riau.png') }}" class="w-[50px]" alt="logo-riau" />
            <img src="{{ asset('assets/guest/img/image/logo-disbud.png') }}" class="w-[50px]" alt="logo-disbud" />
        </a>
    </div>

    <div class="flex lg:items-center lg:gap-[30px]">
        <div class="flex lg:flex-col items-center gap-[60px] xxl:gap-[25px] xl:gap-[30px] md:gap-y-[15px] bg">
            <!-- nav -->
            <ul
                class="to-go-to-sidebar-in-mobile ed-header-nav flex lg:flex-col gap-x-[43px] xxl:gap-x-[33px] font-kanit text-[17px] font-normal">
                <li><a {{ isRouteActive('beranda') ? 'class=active' : '' }} href="{{ route('beranda') }}">Beranda</a></li>
                <li class="has-sub-menu relative">
                    <a {{ isRouteActive('profiles') ? 'class=active' : '' }} role="button">Profil</a>

                    <ul class="ed-header-submenu">
                        <li class="has-sub-menu relative">
                            <a {{ isRouteParamActive('profiles', 'type', 'about') ? 'class=active' : '' }} href="{{ route('profiles', ['type' => 'about']) }}">Tentang Kami</a>
                        </li>
                        <li class="has-sub-menu relative">
                            <a {{ isRouteParamActive('profiles', 'type', 'sejarah') ? 'class=active' : '' }} href="{{ route('profiles', ['type' => 'sejarah']) }}">Sejarah Singkat</a>
                        </li>
                        <li class="has-sub-menu relative">
                            <a {{ isRouteParamActive('profiles', 'type', 'visi-misi') ? 'class=active' : '' }} href="{{ route('profiles', ['type' => 'visi-misi']) }}">Visi & Misi</a>
                        </li>
                        <li class="has-sub-menu relative">
                            <a {{ isRouteParamActive('profiles', 'type', 'struktur-organisasi') ? 'class=active' : '' }} href="{{ route('profiles', ['type' => 'struktur-organisasi']) }}">Struktur Organisasi</a>
                        </li>
                    </ul>
                </li>

                @if ($ppid_categories->count() > 0)
                    <li class="has-sub-menu relative">
                        <a {{ isRouteActive('ppid') ? 'class=active' : '' }} role="button">PPID</a>

                        <ul class="ed-header-submenu">
                            @foreach ($ppid_categories as $item)
                                <li>
                                    <a {{ isRouteParamActive('ppid', 'id', $item->id) ? 'class=active' : '' }} href="{{ route('ppid', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                <li class="has-sub-menu relative">
                    <a {{ isRouteActive('museum') ? 'class=active' : (isRouteActive('klasifikasi') ? 'class=active' : '') }}  href="{{ route('museum') }}">UPT Museum</a>
                </li>
                <li class="has-sub-menu relative">
                    <a {{ isRouteActive('public.agenda') ? 'class=active' : (isRouteActive('gallery') ? 'class=active' : (isRouteActive('survey') ? 'class=active' : (isRouteActive('survey.detail') ? 'class=active' : ''))) }} role="button">Informasi</a>

                    <ul class="ed-header-submenu">
                        <li>
                            <a {{ isRouteActive('public.agenda') ? 'class=active' : '' }}  href="{{ route('public.agenda') }}">Kegiatan Disbud</a>
                        </li>
                        <li>
                            <a {{ isRouteActive('gallery') ? 'class=active' : '' }} href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li>
                            <a {{ isRouteActive('survey') ? 'class=active' : (isRouteActive('survey.detail') ? 'class=active' : '') }} href="{{ route('survey') }}">Survey</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a {{ isRouteActive('kontak') ? 'class=active' : '' }}  href="{{ route('kontak') }}">Kontak</a>
                </li>
            </ul>

            <!-- right actions -->
            <div class="flex items-center gap-x-[60px] xxl:gap-x-[25px] lg:gap-x-[20px]">
                <a target="_blank" href="http://sitari.disbud.riau.go.id/"
                    class="ed-btn to-go-to-sidebar-in-mobile lg:m-[20px]">Si-Tari</a>
            </div>
        </div>

        <!-- mobile menu button -->
        <button type="button"
            class="ed-mobile-menu-open-btn hidden lg:inline-block text-white text-[18px] text-edblue">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>
</header>
