@props([
    'image' => asset('assets/guest/img/course-1.jpg'),
    'categoryName' => 'pelestarian',
    'date',
    'title',
    'slug',
    'author',
    'detail'
])

<div class="ed-2-single-course mix {{ filterClassFormat($categoryName) }} border border-[#e5e5e5] rounded-[10px] p-[20px] group">
    <!-- course image  -->
    <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
        <img src="{{ $image }}" alt="Gambar {{ $title }}"
            class="aspect-[330/223] w-full object-cover group-hover:scale-110" />
        <span
            class="absolute bg-edyellow px-[10px] h-[33px] flex gap-[8px] items-center top-[16px] left-[16px] rounded-[6px]">
            <span class="icon"><img src="{{ asset('assets/guest/img/icon/clock.svg') }}" alt="icon" /></span>
            <span class="txt capitalize">{{ $categoryName }}</span>
        </span>
    </div>

    <!-- course infos -->
    <div class="flex justify-between items-center mb-[16px]">
        <span
            class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">{{ $date }}</span>
    </div>

    <!-- course title -->
    <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
        <a href="{{ $detail }}" class="hover:text-edgreen line-clamp-2">{{ $title }}</a>
    </h5>
    <h2 class="text-edgray text-xs line-clamp-3">
        {{ $slug }}
    </h2>
    <br />
    <hr />
    <br />
    <!-- course stats -->
    <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
        <div class="flex items-center gap-[8px] text-[14px] text-edgray">
            <span class="icon"><img src="{{ asset('assets/guest/img/icon/user-group.svg') }}" alt="icon" /></span>
            <span class="txt">{{ $author }}</span>
        </div>
    </div>
</div>
