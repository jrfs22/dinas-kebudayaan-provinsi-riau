@extends('layouting.guest.main')

@section('title', 'Gallery Kegiatan')

@section('content')
    <x-card.guest.breadcrumb currentPage="Gallery Kegiatan" />

    <section class="ed-2-courses py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[9.2%] xxxl:mx-[8.2%] xxl:mx-[3%]">
            <!-- section heading -->
            <div class="text-center mb-[21px]">
                <h6 class="ed-section-sub-title">Gallery</h6>
                <h2 class="ed-section-title">Gallery Kegiatan</h2>
            </div>

            <div
                class="ed-2-courses-filter-navs flex flex-wrap justify-center gap-[10px] mb-[40px] xs:mb-[30px] pb-[30px] xs:pb-[20px] border-b border-[#002147]/15 mx-[200px] lg:mx-[100px] md:mx-[12px] *:border *:border-edgreen *:rounded-[6px] *:py-[5px] *:px-[10px] *:text-edgreen *:font-medium *:text-[14px]">
                <button class="hover:bg-edgreen hover:text-white" data-filter="all">
                    All
                </button>
                @foreach ($categories as $item)
                    <button class="hover:bg-edgreen hover:text-white capitalize" data-filter=".{{ filterClassFormat($item->name) }}">
                        {{ $item->name }}
                    </button>
                @endforeach
            </div>

            <!-- course cards -->
            <div
                class="ed-2-courses-container grid grid-cols-3 xl:grid-cols-3 md:grid-cols-2 xs:grid-cols-1 gap-[30px] xxl:gap-[20px]">
                @foreach ($galleries as $item)
                    <x-card.guest.gallery
                        image="{{ asset('storage/' . $item->image_path) }}"
                        categoryName="{{ $item->category->name }}"
                        date="{{ indonesianDate($item->date) }}"
                        title="{{ $item->title }}"
                        detail="{{ route('gallery.detail', [
                        'slug' => $item->slug]) }}"
                    />
                @endforeach

                <x-card.guest.pagination :data="$galleries"/>
            </div>
        </div>
    </section>
@endsection
