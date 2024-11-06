@extends('layouting.guest.main')

@section('title', 'Event Budaya')

@section('content')
    <x-card.guest.breadcrumb currentPage="Event Budaya" />

    <div class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="grid grid-cols-3 md:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px]">
                @foreach ($article as $item)
                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            {{-- asset('assets/guest/img/course-1.jpg') --}}
                            <img src="{{ asset('storage/' . $item->cover_image_path) }}" alt="gambar {{ $item->title }}"
                                class="aspect-[330/223] w-full object-cover group-hover:scale-110">
                        </div>

                        <!-- course infos -->
                        <div class="items-center mb-[16px]">
                            <span
                                class="inline-flex items-center justify-center border bg-edyellow px-[10px] h-[33px] rounded-[6px] font-medium text-black text-[14px]">{{ $item->category->name }}</span>
                        </div>

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a href="{{ route('article.detail', ['slug' => $item->slug]) }}" class="hover:text-edgreen">{{ $item->title }}</a>
                            <p class="text-sm font-normal text-gray-500 mt-2">
                                {{ $item->summary }}
                            </p>
                        </h5>

                        <!-- course footer -->
                        <div
                            class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">
                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="{{ asset('assets/guest/img/icon/user-group.svg') }}" alt="icon"></span>
                                <span class="txt">Bidang {{ $item->category->departement->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- pagination -->
            <x-card.guest.pagination :data="$article" />

        </div>
    </div>
@endsection
