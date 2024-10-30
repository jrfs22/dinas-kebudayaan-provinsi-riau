<!-- sidebar -->
<div class="ed-sidebar">
    <div
        class="translate-x-[100%] transition-transform ease-linear duration-300 fixed right-0 w-full max-w-[25%] xl:max-w-[30%] lg:max-w-[40%] md:max-w-[50%] sm:max-w-[60%] xxs:max-w-full bg-white h-full z-[100] overflow-auto">
        <!-- heading -->
        <div class="ed-sidebar-heading p-[20px] lg:p-[20px] border-b border-edgray/20">
            <div class="logo flex justify-between items-center">
                <a href="{{ route('beranda') }}" class="flex space-x-2">
                    <img src="{{ asset('assets/guest/img/image/logo-riau.png') }}" class="w-[50px]" alt="logo-riau" />
                    <img src="{{ asset('assets/guest/img/image/logo-disbud.png') }}" class="w-[50px]" alt="logo-disbud" />
                </a>
                <button type="button"
                    class="ed-sidebar-close-btn border border-edgray/20 w-[45px] aspect-square shrink-0 text-black text-[22px] rounded-full hover:text-edpurple">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <!-- mobile menu -->
        <div class="ed-header-nav-in-mobile"></div>
    </div>
</div>
