@extends('layouting.guest.main')

@section('title', 'UPT Museum')

@section('content')
    <!-- ABOUT SECTION START -->
    <x-card.guest.breadcrumb currentPage="UPT Museum" />
    <section
        class="ed-2-about bg-edoffwhite py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:bg-[url('../assets/img/about-us-bg.png')] before:opacity-[5%] before:bg-no-repeat before:bg-cover before:bg-center before:mix-blend-multiply">
        <div class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px]">
            <div class="flex md:flex-col gap-x-[75px] gap-y-[30px]">
                <!-- left -->
                <div class="max-w-[46%] md:max-w-full grow shrink-0">
                    <div class="relative flex items-end">
                        <img src="{{ isFileExist('storage/' . isDataNull($aboutMuseumMainImage), asset('assets/guest/img/about-2-image-1.png')) }}" alt="About Image"
                            class="border-[12px] border-white rounded-full" style="width: 432px; height: 432px; object-fit: cover;">

                        <a href="{{ $aboutMuseumYt }}" data-fslightbox="gallery"
                            class="flex items-center justify-center w-[60px] aspect-square bg-white rounded-full text-edyellow absolute top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] before:border before:absolute before:top-[50%] before:-translate-y-[50%] before:left-[50%] before:-translate-x-[50%] before:w-[calc(100%+15px)] before:h-[calc(100%+15px)] before:rounded-full before:transition before:duration-[400ms] hover:bg-edgreen hover:text-white hover:before:border-edgreen"><i
                                class="fa-solid fa-play"></i></a>

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
                    <h6 class="ed-section-sub-title">Tentang Museum</h6>
                    <h2 class="ed-section-title mb-[6px]">
                        {!! $aboutMuseumTitle !!}
                    </h2>
                    <p class="text-edgray mb-[34px]">
                        {{ $aboutMuseumDescription }}
                    </p>
                    <ul
                        class="ed-about-list font-medium text-[18px] text-edblue grid grid-cols-2 xxs:grid-cols-1 gap-[20px] xxs:gap-[15px] mb-[52px] *:pl-[40px] *:relative *:before:absolute *:before:left-0 *:before:-top-[3px] *:before:w-[30px] *:before:aspect-square *:before:border *:before:border-edgreen *:before:rounded-full *:before:bg-[url(../assets/img/icon/checkmark.svg)] *:before:bg-no-repeat *:before:bg-[length:15px_13px] *:before:bg-center">
                        @foreach ($aboutMuseumValues as $item)
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
                    <h6 class="ed-section-sub-title">Event Museum</h6>
                    <h2 class="ed-section-title">Event Museum</h2>
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
                    @foreach ($agenda->chunk(1) as $chunkAgenda)
                        <div class="swiper-slide w-[50%]">
                            <div class="space-y-[30px]">
                                @foreach ($chunkAgenda as $item)
                                    <x-card.guest.event
                                        title="{{ $item->name }}"
                                        summary="{{ $item->summary }}"
                                        detail="{{ route('agenda.detail', ['slug' => $item->slug]) }}"
                                        image="{{ asset('storage/' . isDataNull($item->image_path)) }}"
                                        time="{{ getTime($item->start_time) . ' - ' . getTime($item->end_time) }}" />
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- EVENTS SECTION END -->

    <section
        class="ed-2-cta overflow-hidden bg-edgreen pt-[15px] md:pt-[40px] relative z-[1] before:absolute before:inset-0 before:bg-[url(../assets/img/cta-2-vector.png)] before:bg-center before:bg-no-repeat before:bg-cover before:-z-[1]">
        <div class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px]">
            <div class="flex md:flex-col gap-y-[15px] items-center justify-between">
                <!-- text -->
                <div class="max-w-[600px] md:max-w-full shrink-0 relative">
                    <h3
                        class="font-semibold text-[36px] sm:text-[32px] xxs:text-[28px] text-white leading-[1.4] mb-[41px] xxs:mb-[31px]">
                        {{ $klasifikasi->title }}
                    </h3>
                    <!-- <p class="text-gray-50">menyajikan virtual tour dan informasi cgara budaya</p> -->
                    <a href="{{ route('klasifikasi') }}"
                        class="ed-btn !h-[56px] !bg-white !text-black gap-[10px] hover:!bg-edyellow hover:!text-edblue">Kunjungi
                        <span class="icon"><i class="fa-solid fa-arrow-right-long"></i></span></a>
                </div>

                <!-- image -->
                <div class="mr-[40px] lg:mr-0 relative z-[1] shrink-0">
                    <img src="{{ isFileExist('storage/' . isDataNull($klasifikasi->image_path), asset('assets/guest/img/cta-2-img.png')) }}"
                        alt="image" />
                    <!-- vector -->
                    <div
                        class="aspect-square w-[386px] border-[57px] border-edyellow rounded-full absolute bottom-0 right-[25%] translate-y-[50%] -z-[1]">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS SECTION START -->
    <section class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px]">
            <!-- heading -->
            <div class="flex flex-wrap items-end justify-between mb-[60px] lg:mb-[40px] gap-[15px]">
                <!-- left -->
                <div class="max-w-[35%] md:max-w-[40%] sm:max-w-none">
                    <h6 class="ed-section-sub-title">Berita Kegiatan</h6>
                    <h2 class="ed-section-title">UPT Museum</h2>
                </div>
            </div>

            <!-- news cards -->
            <div class="grid grid-cols-2 md:grid-cols-1 gap-[30px]">
                @if ($museumNews->count() > 0)
                    <x-card.guest.newsBig image="{{ asset('storage/' . isDataNull($museumNews[0]->image_path)) }}"
                        title="{{ $museumNews[0]->title }}" date="{{ $museumNews[0]->date }}"
                        author="admin {{ $museumNews[0]->category->departement->name }}"
                        detail="{{ route('news.detail', ['slug' => $museumNews[0]->slug]) }}" />
                @endif

                <!-- right / news small cards -->
                <div class="bg-edoffwhite rounded-[20px] p-[30px] xxs:p-[20px] space-y-[26px]">
                    @foreach ($museumNews->slice(1) as $item)
                        <x-card.guest.newsSmall image="{{ asset('storage/' . $item->cover_image_path) }}"
                            title="{{ $item->title }}" date="{{ $item->date }}"
                            author="admin {{ $item->category->departement->name }}"
                            detail="{{ route('news.detail', ['slug' => $item->slug]) }}" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- NEWS SECTION END -->
@endsection
