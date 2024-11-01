@props(['title', 'subtitle', 'icon' => '', 'color', 'colorIcon'])

<a href="javascript:void(0)"
    class="border rounded-[10px] py-[16px] px-[20px] flex sm:flex-col items-center sm:items-start gap-y-[15px] gap-x-[20px] {{ $color }} group">
    <!-- icon -->
    <div
        class="{{ $colorIcon }} shrink-0 w-[84px] sm:w-[64px] aspect-square rounded-full p-[14px] duration-[400ms] flex items-center justify-center group-hover:bg-white">
        <img src="{{ $icon }}" width="32" height="32" alt="Icon">

    </div>
    <!-- text -->
    <div>
        <h5 class="font-semibold text-[20px] text-edblue duration-[400ms] group-hover:text-white">
            {{ $title }}
        </h5>
        <h6 class="text-[#808080] duration-[400ms] group-hover:text-white">
            {{ $subtitle }}
        </h6>
    </div>
</a>
