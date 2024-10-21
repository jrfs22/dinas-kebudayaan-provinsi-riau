@props(['currentPage'])


<section
    style="background-image: url('../{{ 'storage/' . $breadcrumb->image_path }}')"
    class="pt-[327px] xl:pt-[287px] lg:pt-[237px] sm:pt-[200px] xxs:pt-[180px] pb-[158px] xl:pb-[118px] lg:pb-[98px] sm:pb-[68px] xs:pb-[48px] text-center bg-no-repeat bg-cover bg-center relative z-[1] overflow-hidden before:absolute before:-z-[1] before:inset-0 before:bg-edblue/70 before:pointer-events-none">
    <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
        <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">
            {{ $currentPage }}
        </h1>
        <ul class="flex items-center justify-center gap-[10px] text-white">
            <li><a href="{{ route('beranda') }}" class="text-edyellow">Beranda</a></li>
            <li>
                <span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span>
            </li>
            <li>{{ $currentPage }}</li>
        </ul>
    </div>

    <div class="vectors">
        <img src="{{ asset('assets/guest/img/breadcrumb-vector-1.svg') }}" alt="vector"
            class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]">
        <img src="{{ asset('assets/guest/img/breadcrumb-vector-2.svg') }}" alt="vector"
            class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]">
    </div>
</section>
