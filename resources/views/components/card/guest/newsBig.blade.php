@props([
    'title',
    'image',
    'date',
    'author'
])

<div class="rounded-[20px] bg-edoffwhite overflow-hidden">
    <div class="relative">
        <img src="{{ $image }}" alt="Cover {{ $title }}" class="w-full aspect-[570/290]">
        <div
            class="absolute top-[30px] left-[30px] bg-[#ECF0F5] rounded-[10px] font-medium text-[14px] text-black inline-block uppercase overflow-hidden text-center">
            <span class="bg-edgreen text-white block py-[3px] rounded-[10px]">{{ getDay($date) }}</span>
            <span class="px-[11px] py-[2px] block">{{ getMonth($date) }}</span>
        </div>
    </div>

    <div class="px-[30px] xxs:px-[20px] py-[22px] pt-[27px]">
        <div class="flex items-center gap-[16px] mb-[9px]">
            <div class="flex items-center gap-[10px] font-medium text-[12px] text-edgray">
                <x-icon.userFilled />
                <span>{{ $author }}</span>
            </div>
        </div>
        <h5 class="font-medium text-[20px]">
            <a href="kegiatan-disbud.html" class="hover:text-edgreen line-clamp-2">{{ $title }}</a>
        </h5>
    </div>
</div>
