@extends('layouting.guest.main')

@section('title', 'Event Budaya')

@section('content')
    <x-card.guest.breadcrumb currentPage="Event Budaya" />

    <!-- MAIN CONTENT START -->
    <div class="ed-event-details-content py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="flex gap-[30px] lg:gap-[20px] md:flex-col md:items-center">
                <div class="left grow space-y-[30px] md:space-y-[20px]">
                    @foreach ($agenda as $item)
                        <x-card.guest.agenda
                            gambar="{{ asset('assets/' . $item->image_path) }}"
                            categoryName="{{ $item->category->name }}"
                            title="{{ $item->name }}"
                            slug="{{ $item->slug }}"
                            author="{{ $item->user->role }}"
                            date="{{ $item->date }}"
                            detail="{{ route('agenda.detail', ['id' =>  $item->id]) }}"
                        />
                    @endforeach

                    <x-card.guest.pagination :data="$agenda" />
                </div>

                <!-- right sidebar -->
                <div class="right max-w-full w-[370px] lg:w-[360px] shrink-0 space-y-[30px] md:space-y-[25px]">
                    <!-- search widget -->
                    <x-widget.guest.search />

                    <!-- Categories widget -->
                    <x-widget.guest.category>
                        @foreach ($categories as $item)
                            <li class="text-black py-[16px] border-b border-t border-[#D9D9D9]">
                                <a href="#" class="flex items-center justify-between hover:text-edgreen">
                                    <span>{{ $item->name }}</span>
                                    <span>({{ $item->agenda()->count() }})</span>
                                </a>
                            </li>
                        @endforeach
                    </x-widget.guest.category>
                </div>
            </div>
        </div>
    </div>
    <!-- MAIN CONTENT END -->
@endsection
