@props(['image', 'categoryName', 'title', 'detail'])

<!-- single course -->
<div class="ed-2-single-course mix {{ $categoryName }} border border-[#e5e5e5] rounded-[10px] p-[20px] group">
    <!-- course image  -->
    <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
        <img src="{{ $image }}" alt="Course Image"
            class="aspect-[330/223] w-full object-cover group-hover:scale-110">
        <span
            class="absolute bg-edyellow px-[10px] h-[33px] flex gap-[8px] items-center top-[16px] left-[16px] rounded-[6px]">
            <span class="txt capitalize">{{ $categoryName }}</span>
        </span>
    </div>

    <!-- course title -->
    <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
        <a href="{{ $detail }}" class="hover:text-edgreen line-clamp-2">{{ $title }}</a>
    </h5>
    <div
        class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">
        <div class="flex items-center gap-[8px] text-[14px] text-edgray">
            <span class="icon"><img src="{{ asset('assets/guest/img/icon/location-dot.svg') }}" alt="icon"></span>
            <span class="txt">Museum Sang Nila Utama</span>
        </div>
    </div>
</div>
