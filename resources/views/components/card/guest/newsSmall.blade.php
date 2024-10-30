@props([
    'title',
    'image',
    'date',
    'author',
    'detail'
])

<div
    class="flex xxs:flex-col gap-x-[25px] gap-y-[15px] items-center xxs:items-start border-b last:border-0 pb-[26px] last:pb-0">
    <div class="shrink-0 rounded-[10px] overflow-hidden">
        <img src="{{ $image }}" alt="Cover {{ $title }}" class="w-[142px] aspect-[142/153] object-cover">
    </div>

    <div>
        <div class="flex items-center gap-[16px] mb-[9px]">
            <div class="flex items-center gap-[10px] font-medium text-[12px] text-edgray">
                <x-icon.userFilled />
                <span>{{ $author }}</span>
            </div>
        </div>
        <h5 class="font-medium text-[20px] mb-[17px]">
            <a href="{{ $detail }}" class="hover:text-edgreen line-clamp-2">{{ $title }}</a>
        </h5>

        <!-- date -->
        <div
            class="bg-[#ECF0F5] rounded-[10px] font-medium text-[14px] text-black inline-block uppercase overflow-hidden text-center">
            <span class="bg-edgreen text-white block py-[3px] rounded-[10px]">{{ getDay($date) }}</span>
            <span class="px-[11px] py-[2px] block">{{ getMonth($date) }}</span>
        </div>
    </div>
</div>
