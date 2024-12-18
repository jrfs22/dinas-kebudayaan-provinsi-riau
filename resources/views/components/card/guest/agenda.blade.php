@props([
    'image' => asset('assets/guest/img/news-details-img-1.jpg'),
    'categoryName' => 'pelestarian',
    'date',
    'title',
    'slug',
    'author',
    'detail'
])

<!-- single blog -->
<div class="border border-[#D9D9D9] rounded-[8px] p-[24px] xxs:p-[18px]">
    <div class="img overflow-hidden rounded-[8px] mb-[30px] relative">
        <img src="{{ $image }}" alt="Gambar {{ $title }}" class="w-full" />

        <div
            class="bg-[#ECF0F5] rounded-[10px] font-medium text-[14px] text-black inline-block uppercase overflow-hidden text-center absolute top-[20px] left-[20px]">
            <span class="bg-edgreen text-white block py-[3px] rounded-[10px]">{{ getDay($date) }}</span>
            <span class="px-[11px] py-[2px] block">{{ getMonth($date) }}</span>
        </div>
    </div>

    <!-- txt -->
    <div>
        <!-- infos -->
        <div class="flex items-center gap-[30px] mb-[7px]">
            <!-- single info -->
            <div class="flex gap-[10px] items-center">
                <x-icon.user />
                <span class="text-[14px] text-edgray">{{ $author }}</span>
            </div>

            <!-- single info -->
            <div class="flex gap-[10px] items-center">
                <x-icon.tag />
                <span class="text-[14px] text-edgray"><a href="#">{{ $categoryName }}</a></span>
            </div>
        </div>

        <h3
            class="text-[30px] lg:text-[27px] sm:text-[24px] xxs:text-[22px] font-semibold text-black mb-[10px]">
            <a href="{{ $detail }}" class="hover:text-edgreen line-clamp-2">{{ $title }}</a>
        </h3>

        <p class="font-normal text-[16px] text-edgray mb-[16px] line-clamp-3">
            {{ $slug }}
        </p>

        <div class="flex items-center justify-between">
            <a href="{{ $detail }}"
                class="text-edgreen text-[16px] hover:text-edyellow">Selengkapnya
                <span class="pl-[5px]"><i class="fa-solid fa-arrow-right-long"></i></span></a>
        </div>
    </div>
</div>
