@props([
    'image' => asset('assets/guest/img/news-details-img-1.jpg'),
    'date',
    'start_time',
    'end_time',
    'title',
    'content',
])


<h4 class="text-[30px] xs:text-[25px] xxs:text-[22px] font-semibold text-edblue mb-[11px] mt-[27px]">
    {{ $title }}
</h4>

<div class="relative rounded-[8px] overflow-hidden mb-[30px]">
    <img src="{{ $image }}" alt="Event Detail {{ $title }}" class="rounded-[8px]">
</div>

<div>
    <!-- infos -->
    <div class="flex flex-wrap gap-x-[16px] gap-y-[8px]">
        <div
            class="inline-flex items-center gap-[8px] rounded-[6px] px-[8px] py-[7px] font-semibold bg-edgreen text-white">

            <x-icon.calendar />
            <span>{{ $date }}</span>
        </div>
        <div
            class="inline-flex items-center gap-[8px] rounded-[6px] px-[8px] py-[7px] font-semibold border border-edgreen text-edgreen">

            <x-icon.clock />
            <span>{{ $start_time }}  - {{ $end_time }}</span>
        </div>
    </div>

    <p class="font-normal text-[16px] text-edgray mb-[15px]">
        {!! $content !!}
    </p>
</div>
