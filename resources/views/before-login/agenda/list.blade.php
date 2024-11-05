@extends('layouting.guest.main')

@section('title', 'Event Budaya')

@section('content')
    <x-card.guest.breadcrumb currentPage="Event Budaya" />

    <div class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <!-- event cards -->
            <div class="grid grid-cols-2 sm:grid-cols-1 gap-[30px] md:gap-[20px]">
                @foreach ($festival as $item)
                    <div
                        class="bg-white flex lg:flex-col items-start gap-x-[20px] gap-y-[10px] shadow-[0_4px_30px_rgba(0,0,0,0.1)] rounded-[20px] p-[30px] xxs:p-[20px]">
                        <!-- date -->
                        <div
                            class="bg-edyellow rounded-[10px] font-medium text-[16px] text-black inline-block uppercase overflow-hidden text-center shrink-0">
                            <span class="bg-edgreen text-white text-[20px] block py-[7px] px-[30px] rounded-[10px]">{{ getYear($item->date) }}</span>
                            <span class="px-[15px] p-[10px] block leading-[1.44] font-semibold">{{ getDay($item->date) }}
                                <span
                                    class="block">{{ getMonth($item->date) }}</span></span>
                        </div>

                        <!-- text -->
                        <div>
                            <h5 class="font-semibold text-[20px] mb-[7px]">
                                <a href="detail-event-budaya.html" class="hover:text-edgreen line-clamp-2">
                                    {{ $item->title }}
                                </a>
                            </h5>
                            <h6 class="text-edgreen font-medium">{{ getTime($item->start_time) . ' - ' . getTime($item->end_time) }}</h6>
                            <p class="border-t border-[#002147]/20 pt-[17px] mt-[10px] line-clamp-3">
                                {{ $item->summary }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION START -->
            <x-card.guest.pagination :data="$festival" />
            <!-- PAGINATION END -->
        </div>
    </div>
@endsection
