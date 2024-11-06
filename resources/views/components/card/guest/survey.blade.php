@props([
    'title',
    'description',
    'status',
    'detail'
])

<div
    class="bg-white flex lg:flex-col items-start gap-x-[20px] gap-y-[10px] shadow-[0_4px_30px_rgba(0,0,0,0.1)] rounded-[20px] p-[30px] xxs:p-[20px]">
    <!-- text -->
    <div>
        <!-- infos -->
        <div class="flex flex-wrap gap-x-[16px] gap-y-[8px] mb-[16px]">
            <div
                class="inline-flex items-center gap-[8px] rounded-[6px] px-[8px] py-[7px] font-semibold {{ $status == 'selesai' ? 'bg-edgreen' : 'bg-edyellow' }} text-white capitalize">
                <span>{{ $status }}</span>
            </div>
        </div>
        <h5 class="font-semibold text-[20px] mb-[7px]">
            <a href="{{ $detail }}" class="hover:text-edgreen line-clamp-2">{{ $title }}</a>
        </h5>
        <p class="border-t border-[#002147]/20 pt-[17px] mt-[10px] line-clamp-3">
            {{ $description }}
        </p>
    </div>
</div>
