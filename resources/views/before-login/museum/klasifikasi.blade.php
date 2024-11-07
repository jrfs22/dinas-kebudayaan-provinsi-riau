@extends('layouting.guest.main')

@section('title', 'Klasifikasi')

@section('content')
    <x-card.guest.breadcrumb currentPage="Klasifikasi" />

    <section class="ed-2-courses py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[9.2%] xxxl:mx-[8.2%] xxl:mx-[3%]">
            <!-- section heading -->
            <div class="text-center mb-[21px]">
                <h6 class="ed-section-sub-title">Klasifikasi</h6>
                <h2 class="ed-section-title">Benda Museum Sang Nila</h2>
            </div>

            <div
                class="ed-2-courses-filter-navs flex flex-wrap justify-center gap-[10px] mb-[40px] xs:mb-[30px] pb-[30px] xs:pb-[20px] border-b border-[#002147]/15 mx-[200px] lg:mx-[100px] md:mx-[12px] *:border *:border-edgreen *:rounded-[6px] *:py-[5px] *:px-[10px] *:text-edgreen *:font-medium *:text-[14px]">
                <button class="hover:bg-edgreen hover:text-white mixitup-control-active" data-filter="all">
                    All
                </button>
                @foreach ($categories as $item)
                    <button class="hover:bg-edgreen hover:text-white capitalize" data-filter=".{{ $item->name }}">
                        {{ $item->name }}
                    </button>;
                @endforeach
            </div>

            <!-- course cards -->
            <div class="ed-2-courses-container grid grid-cols-4 xl:grid-cols-3 md:grid-cols-2 xs:grid-cols-1 gap-[30px] xxl:gap-[20px]"
                id="MixItUp37DF8E">
                @foreach ($klasifikasi as $item)
                    <x-card.guest.klasifikasi
                        image="{{ asset('assets/guest/img/course-1.jpg') }}"
                        categoryName="{{ $item->category->name }}"
                        title="{{ $item->title }}"
                        detail="{{ route('klasifikasi.detail', ['slug' => $item->slug]) }}"
                    />
                @endforeach
            </div>
    </section>
@endsection
