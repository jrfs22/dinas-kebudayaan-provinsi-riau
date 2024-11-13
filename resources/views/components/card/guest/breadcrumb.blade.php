@props(['currentPage'])

{{-- @dd($breadcrumb) --}}
<section
    style="background-image: url('../../{{ 'storage/' . $breadcrumb->image_path }}')"
    class="pt-[128px] xl:pt-[128px] lg:pt-[96px] sm:pt-[64px] xxs:pt-[48px] pb-[96px] xl:pb-[96px] lg:pb-[96px] sm:pb-[72px] xs:pb-[54px] text-center bg-no-repeat bg-cover bg-center relative z-[1] overflow-hidden before:absolute before:-z-[1] before:inset-0 before:bg-edblue/70 before:pointer-events-none">
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
</section>
