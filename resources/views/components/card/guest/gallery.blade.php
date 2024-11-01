@props([
    'title',
    'image',
    'categoryName',
    'date',
])

<div class="ed-2-single-course mix {{ filterClassFormat($categoryName) }} border border-[#e5e5e5] rounded-[10px] p-[20px] group">
    <!-- course image  -->
    <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
        <img src="{{ $image }}" alt="Course Image"
            class="aspect-[330/223] w-full object-cover group-hover:scale-110">
    </div>

    <!-- course infos -->
    <div class="flex justify-between items-center mb-[16px]">
        <span class="bg-edyellow px-[10px] h-[33px] flex gap-[8px] items-center rounded-[6px]">
            <span class="txt capitalize">{{ $categoryName }}</span>
        </span>
        <span
            class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">{{ $date }}</span>
    </div>

    <!-- course title -->
    <h5 class="font-semibold text-[20px] text-edblue mb-[23px] line-clamp-2">
        {{ $title }}
    </h5>
</div>
