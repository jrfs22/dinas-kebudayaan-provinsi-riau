@extends('layouting.guest.main')

@section('title', 'Beranda')

@section('content')
    <section class="ed-2-banner bg-edoffwhite pt-[120px] pb-[190px] relative z-[1] overflow-hidden"
        style="background-image: url('../../{{ 'storage/' . $heroBackground }}');background-repeat: no-repeat; background-size: cover;">
        <div class="container max-w-[71.6%] xxxl:max-w-[86.5%] xxl:max-w-[90.6%] mx-auto">
            <div class="flex md:flex-col gap-x-[112px] gap-y-[40px] items-center">
                <!-- banner text -->
                <div class="max-w-[49%] xxxl:max-w-[45.5%] md:max-w-full shrink-0">
                    <h6 class="ed-section-sub-title !text-black before:!content-none">
                        {!! $heroSubtitle !!}
                    </h6>
                    <h1
                        class="font-medium text-[clamp(35px,5.4vw,80px)] text-edblue tracking-tight leading-[1.12] mb-[25px]">
                        {!! $heroTitle !!}
                    </h1>
                    <p class="text-edgray font-medium mb-[41px]">
                        {!! $heroDescription !!}
                    </p>
                </div>

                <!-- banner image -->
                <div class="max-w-[51%] md:max-w-full">
                    <div class="w-max relative z-[1] flex gap-[30px] items-center">
                        <img src="{{ isFileExist('storage/' . isDataNull($heroSecondaryImage), asset('assets/guest/img/banner-2-img-1.jpg')) }}"
                            alt="banner image"
                            class="border-[10px] border-white rounded-[20px] max-w-[241px] aspect-[261/366] object-cover" />
                        <img src="{{ isFileExist('storage/' . isDataNull($heroMainImage), asset('assets/guest/img/banner-2-img-2.jpg')) }}"
                            alt="Main image" class="rounded-[20px] max-w-[425px] aspect-[435/544] object-cover" />

                        @if (!isset($heroBackground))
                            <!-- vectors -->
                            <div>
                                <div
                                    class="w-[242px] aspect-square rounded-full bg-edgreen opacity-80 blur-[110px] absolute -z-[1] bottom-0 left-[163px]">
                                </div>
                                {{-- <img src="{{ asset('assets/guest/img/banner-2-img-vector-1.svg') }}" alt="vector"
                                    class="pointer-events-none absolute -z[1] top-[30px] -left-[35px]" />
                                <img src="{{ asset('assets/guest/img/banner-2-img-vector-2.svg') }}" alt="vector"
                                    class="pointer-events-none absolute -z[1] -top-[50px] -right-[40px]" /> --}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BANNER SECTION END -->

    <!-- CATEGORIES SECTION START -->
    <div class="ed-2-categories -mt-[98px] relative z-[2]">
        <div
            class="mx-[15.8%] xxxl:mx-[9.8%] xxl:mx-[3.5%] bg-white p-[40px] sm:p-[30px] xxs:p-[20px] rounded-[20px] shadow-[0_4px_25px_rgba(0,0,0,0.06)]">
            <div class="grid grid-cols-4 xl:grid-cols-3 md:grid-cols-2 xxs:grid-cols-1 gap-[20px]">
                <!-- single category -->
                @foreach ($categoryInformasi as $key => $item)
                    <x-card.guest.category title="{{ $item->title }}" subtitle="{{ $item->description }}"
                        icon="{{ asset('storage/' . $item->image_path) }}" color="{{ kategoriInformasiColor($key) }}"
                        colorIcon="{{ kategoriInformasiColorIcon($key) }}" />
                @endforeach
            </div>
        </div>
    </div>
    <!-- CATEGORIES SECTION END -->

    <section class="ed-2-courses py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[9.2%] xxxl:mx-[8.2%] xxl:mx-[3%]">
            <!-- section heading -->
            <div class="text-center mb-[21px]">
                <h6 class="ed-section-sub-title">Berita Kegiatan</h6>
                <h2 class="ed-section-title">Dinas Kebudayaan Provinsi Riau</h2>
            </div>

            <div
                class="ed-2-courses-filter-navs flex flex-wrap justify-center gap-[10px] mb-[40px] xs:mb-[30px] pb-[30px] xs:pb-[20px] border-b border-[#002147]/15 mx-[200px] lg:mx-[100px] md:mx-[12px] *:border *:border-edgreen *:rounded-[6px] *:py-[5px] *:px-[10px] *:text-edgreen *:font-medium *:text-[14px]">
                <button class="hover:bg-edgreen hover:text-white" data-filter="all">
                    All
                </button>
                @foreach ($newsCategories as $item)
                    <button class="hover:bg-edgreen hover:text-white capitalize"
                        data-filter=".{{ filterClassFormat($item->name) }}">
                        {{ $item->name }}
                    </button>
                @endforeach
            </div>
            <!-- course cards -->
            <div
                class="ed-2-courses-container grid grid-cols-4 xl:grid-cols-3 md:grid-cols-2 xs:grid-cols-1 gap-[30px] xxl:gap-[20px]">
                @foreach ($news as $item)
                    <x-card.guest.news image="{{ asset('storage/' . isDataNull($item->cover_image_path)) }}"
                        categoryName="{!! $item->category->name !!}" date="{{ indonesianDate($item->date) }}"
                        title="{{ $item->title }}" summary="{{ $item->summary }}"
                        author="Bidang {!! $item?->category?->departement?->name !!}"
                        detail="{{ route('news.detail', ['slug' => $item->slug]) }}" />
                @endforeach
            </div>
        </div>
    </section>
    <!-- COURSES SECTION END -->

    <!-- ABOUT SECTION START -->
    @isset($aboutBackground)
        <section
            class="ed-2-about bg-edoffwhite py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-[5%] before:bg-no-repeat before:bg-cover before:bg-center before:mix-blend-multiply"
            style="background-image: url('../../{{ 'storage/' . $aboutBackground }}');background-repeat: no-repeat; background-size: cover;">
        @else
            <section
                class="ed-2-about bg-edoffwhite py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:bg-[url('../assets/img/about-us-bg.png')] before:opacity-[5%] before:bg-no-repeat before:bg-cover before:bg-center before:mix-blend-multiply">
            @endisset

            <div class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px]">
                <div class="flex md:flex-col gap-x-[75px] gap-y-[30px]">
                    <div class="max-w-[46%] md:max-w-full grow shrink-0">
                        <div class="relative flex items-end">
                            <img src="{{ isFileExist('storage/' . isDataNull($aboutMainImage), asset('assets/guest/img/about-2-image-1.png')) }}"
                                alt="About Image" class="border-[12px] border-white rounded-full"
                                style="width: 432px; height: 432px; object-fit: cover;">
                            <a href="{{ $aboutYt }}" data-fslightbox="gallery"
                                class="flex items-center justify-center w-[60px] aspect-square bg-white rounded-full text-edyellow absolute top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] before:border before:absolute before:top-[50%] before:-translate-y-[50%] before:left-[50%] before:-translate-x-[50%] before:w-[calc(100%+15px)] before:h-[calc(100%+15px)] before:rounded-full before:transition before:duration-[400ms] hover:bg-edgreen hover:text-white hover:before:border-edgreen"><i
                                    class="fa-solid fa-play"></i></a>
                            <!-- video btn -->

                            <!-- vectors -->
                            <div>
                                <img src="{{ asset('assets/guest/img/about-2-img-vector.svg') }}" alt="vector"
                                    class="absolute pointer-events-none top-[60px] right-[65px] -z-[1]">
                                <img src="{{ asset('assets/guest/img/about-2-img-vector-2.svg') }}" alt="vector"
                                    class="absolute pointer-events-none -bottom-[30px] right-0 -z-[1] md:hidden">
                            </div>
                        </div>
                    </div>

                    <!-- right -->
                    <div class="max-w-[54%] md:max-w-full">
                        <h6 class="ed-section-sub-title">Tentang Kami</h6>
                        <h2 class="ed-section-title mb-[6px]">
                            {!! $aboutTitle !!}
                        </h2>
                        <p class="text-edgray mb-[34px]">
                            {!! $aboutDescription ?? '' !!}
                        </p>
                        <ul
                            class="ed-about-list font-medium text-[18px] text-edblue grid grid-cols-2 xxs:grid-cols-1 gap-[20px] xxs:gap-[15px] mb-[52px] *:pl-[40px] *:relative *:before:absolute *:before:left-0 *:before:-top-[3px] *:before:w-[30px] *:before:aspect-square *:before:border *:before:border-edgreen *:before:rounded-full *:before:bg-[url(../assets/img/icon/checkmark.svg)] *:before:bg-no-repeat *:before:bg-[length:15px_13px] *:before:bg-center">
                            @foreach ($aboutValues as $item)
                                <li>{{ $item->description }}</li>
                            @endforeach
                        </ul>
                        <!-- <a href="#" class="ed-btn">know more</a> -->
                    </div>
                </div>
            </div>
        </section>
        <!-- ABOUT SECTION END -->

        <!-- EVENTS SECTION START -->
        <section class="ed-2-events py-[120px] xl:py-[80px] md:py-[60px]">
            <div class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px]">
                <!-- heading -->
                <div
                    class="flex flex-wrap items-end justify-between gap-x-[30px] gap-y-[15px] border-b border-[#002147]/15 pb-[32px] xxs:pb-[22px] mb-[40px] xxs:mb-[30px]">
                    <div class="left">
                        <h6 class="ed-section-sub-title">Event Budaya</h6>
                        <h2 class="ed-section-title">Event Budaya</h2>
                    </div>
                    <!-- nav -->
                    <div
                        class="ed-2-events-slider-nav flex gap-[15px] *:w-[40px] *:h-[40px] *:rounded-full *:border *:border-[#808080]/20 *:text-black *:text-[18px]">
                        <button class="prev hover:bg-edgreen hover:border-edpubg-edgreen hover:text-white">
                            <i class="fa-solid fa-angle-left"></i>
                        </button>
                        <button class="next hover:bg-edgreen hover:border-edpubg-edgreen hover:text-white">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    </div>
                </div>

                <!-- events slider -->
                <div class="ed-2-events-slider swiper">
                    <div class="swiper-wrapper">
                        @if ($agenda != null)
                            @foreach ($agenda->chunk(1) as $chunkAgenda)
                                <div class="swiper-slide w-[50%]">
                                    <div class="space-y-[30px]">
                                        @foreach ($chunkAgenda as $item)
                                            <x-card.guest.event title="{{ $item->title }}" summary="{{ $item->summary }}"
                                                detail="{{ route('agenda.detail', ['slug' => $item->slug]) }}"
                                                image="{{ asset('storage/' . isDataNull($item->image_path)) }}"
                                                time="{{ getTime($item->start_time) . ' - ' . getTime($item->end_time) }}" />
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- EVENTS SECTION END -->

        <!-- CTA SECTION START -->
        <section
            class="ed-2-cta overflow-hidden bg-edgreen pt-[15px] md:pt-[40px] relative z-[1] before:absolute before:inset-0 before:bg-[url(../assets/img/cta-2-vector.png)] before:bg-center before:bg-no-repeat before:bg-cover before:-z-[1]">
            <div class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px]">
                <div class="flex md:flex-col gap-y-[15px] items-center justify-between">
                    <!-- text -->
                    <div class="max-w-[600px] md:max-w-full shrink-0 relative">
                        <h3
                            class="font-semibold text-[36px] sm:text-[32px] xxs:text-[28px] text-white leading-[1.4] mb-[41px]  xxs:mb-[31px]">
                            {{ $sitari->title }}
                        </h3>
                        <!-- <p class="text-gray-50">menyajikan virtual tour dan informasi cgara budaya</p> -->
                        <a href="{{ $sitari->url_path }}"
                            class="ed-btn !h-[56px] !bg-white !text-black gap-[10px] hover:!bg-edyellow hover:!text-edblue">Kunjungi
                            <span class="icon"><i class="fa-solid fa-arrow-right-long"></i></span></a>

                        <!-- vector -->
                        <img src="{{ asset('assets/guest/img/cta-2-txt-vector.svg') }}" alt="vector"
                            class="absolute bottom-[10px] left-[37%] xs:left-[75%]" />
                    </div>

                    <!-- image -->
                    <div class="mr-[40px] lg:mr-0 relative z-[1] shrink-0">
                        <img src="{{ isFileExist('storage/' . isDataNull($sitari->image_path), asset('assets/guest/img/cta-2-img.png')) }}"
                            alt="image" />
                        <!-- vector -->
                        <div
                            class="aspect-square w-[386px] border-[57px] border-edyellow rounded-full absolute bottom-0 right-[25%] translate-y-[50%] -z-[1]">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
