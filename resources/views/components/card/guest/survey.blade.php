@props(['title', 'description', 'status', 'detail', 'periode'])

<div
    class="bg-white flex lg:flex-col items-start gap-x-[20px] gap-y-[10px] shadow-[0_4px_30px_rgba(0,0,0,0.1)] rounded-[20px] p-[30px] xxs:p-[20px]">
    <!-- text -->
    <div class="flex flex-col justify-between h-full w-full">
        <!-- infos -->
        <div class="flex flex-wrap gap-x-[16px] gap-y-[8px] mb-[16px]">
            <div
                class="inline-flex items-center gap-[8px] rounded-[6px] px-[8px] py-[7px] font-semibold {{ $status == 'Selesai' ? 'bg-edgreen' : 'bg-edyellow' }} text-white capitalize">
                <span>{{ $status }}</span>
            </div>
        </div>
        <h5 class="font-semibold text-[20px] mb-[7px] hover:text-edgreen line-clamp-2">
            {{ $title }}
        </h5>
        <p class="border-t border-[#002147]/20 pt-[17px] mt-[10px] line-clamp-3">
            {{ $description }}
        </p>
        <div class="flex justify-between mt-4">
            <div class="flex-col">
                <span class="text-gray-500">Periode Survey</span>
                <h5 class="text-edgreen">{{ $periode }}</h5>
            </div>

            @if ($status != 'Selesai')
                <button class="btn bg-edred hover:bg-red-800 py-2 px-6 rounded-lg text-white">
                    <a href="{{ $detail }}">Isi Survey</a>
                </button>
            @endif
        </div>
    </div>
</div>
