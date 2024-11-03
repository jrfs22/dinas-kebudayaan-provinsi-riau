@props([
    'image' => asset('assets/guest/img/news-details-img-1.jpg'),
    'categoryName' => 'pelestarian',
    'date',
    'title',
    'slug',
    'author',
    'content'
])


<div>
    <h3 class="text-[30px] lg:text-[27px] sm:text-[24px] xxs:text-[22px] font-semibold text-black mb-[18px]">
        {{ $title }}
    </h3>
    <div class="img overflow-hidden rounded-[8px] mb-[30px] relative">
        <img src="{{ $image }}" alt="Gambar Utama" class="max-h-[380px] max-w-full aspect-[770/380]">

        <div
            class="bg-[#ECF0F5] rounded-[10px] font-medium text-[14px] text-black inline-block uppercase overflow-hidden text-center absolute top-[20px] left-[20px]">
            <span class="bg-edgreen text-white block py-[3px] rounded-[10px]">{{ getDay($date) }}</span>
            <span class="px-[11px] py-[2px] block">{{ getMonth($date) }}</span>
        </div>
    </div>

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

        <p class="font-normal text-[16px] text-edgray mb-[16px]">
            {!! $content !!}
        </p>
    </div>
</div>
