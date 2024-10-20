@props([
    'title',
    'image',
    'date',
    'detail'
])

<div class="flex items-center gap-[16px]">
    <div class="rounded-[6px] w-[78px] h-[79px] overflow-hidden shrink-0">
        <img src="{{ $image }}" alt="Post Image" class="h-full object-cover" />
    </div>

    <div>
        <span class="date text-[14px] text-edgray flex items-center gap-[12px] mb-[3px]">
            <span class="icon">
                <x-svg.calendar />
            </span>
            <span>{{ $date }}</span>
        </span>

        <h6 class="font-semibold text-[15px] text-black">
            <a href="{{ $detail }}" class="hover:text-edgreen">
                {{ $title }}
            </a>
        </h6>
    </div>
</div>
