@props([
    'title',
    'summary',
    'detail',
    'image',
    'time',
])

<div
    class="bg-edoffwhite rounded-[20px] p-[30px] sm:p-[20px] flex lg:flex-col sm:flex-row xs:flex-col items-center lg:items-start sm:items-center xs:items-start gap-[30px] sm:gap-[20px]">
    <!-- img -->
    <div class="relative">
        <img src="{{ $image }}" alt="{{ $title }}"
            class="max-w-[215px] aspect-[215/203] object-cover rounded-[10px]" />
    </div>
    <!-- text -->
    <div>
        <div class="flex items-center gap-[10px] font-medium text-[#808080] mb-[6px]">
            <span class="icon">
                <img src="{{ asset('assets/guest/img/icon/clock-fill-yellow.svg') }}"
                    alt="icon" />
                </span>
            <span>{{ $time }}</span>
        </div>
        <h5 class="font-semibold text-[20px] text-edblue mb-[4px]">
            <a href="{{ $detail }}" class="hover:text-edgreen line-clamp-2">
                {{ $title }}
            </a>
        </h5>
        <p class="text-edgray mb-[15px] line-clamp-3">
            {{ $summary }}
        </p>
        <a href="{{ $detail }}"
            class="font-medium text-edgreen flex items-center gap-[10px] hover:text-black">Selengkapnya
            <span class="icon"><i class="fa-solid fa-arrow-right-long"></i></span></a>
    </div>
</div>
