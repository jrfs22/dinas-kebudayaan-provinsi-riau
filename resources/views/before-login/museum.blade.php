@extends('layouting.guest.main')

@section('title', 'UPT Museum')

@section('content')
    <!-- ABOUT SECTION START -->
    <section
        class="ed-2-about bg-edoffwhite py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:bg-[url('../assets/img/about-us-bg.png')] before:opacity-[5%] before:bg-no-repeat before:bg-cover before:bg-center before:mix-blend-multiply">
        <div class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px]">
            <div class="flex md:flex-col gap-x-[75px] gap-y-[30px]">
                <!-- left -->
                <div class="max-w-[46%] md:max-w-full grow shrink-0">
                    <div class="relative flex items-end">
                        <img src="{{ asset('assets/guest/img/about-2-image-1.png') }}" alt="About Image"
                            class="border-[12px] border-white rounded-full" />

                        <!-- video btn -->
                        <div class="relative shrink-0 -ml-[202px] lg:-ml-[262px] md:-ml-[202px] xs:-ml-[242px] -mb-[24px]">
                            <img src="{{ asset('assets/guest/img/about-2-image-2.png') }}" alt="About Image"
                                class="border-[8px] border-white rounded-full w-[292px] xs:w-[252px] aspect-square" />
                            <a href="https://youtu.be/K88OhAy7x9c" data-fslightbox="gallery"
                                class="flex items-center justify-center w-[60px] aspect-square bg-white rounded-full text-edyellow absolute top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] before:border before:absolute before:top-[50%] before:-translate-y-[50%] before:left-[50%] before:-translate-x-[50%] before:w-[calc(100%+15px)] before:h-[calc(100%+15px)] before:rounded-full before:transition before:duration-[400ms] hover:bg-edgreen hover:text-white hover:before:border-edgreen"><i
                                    class="fa-solid fa-play"></i></a>
                        </div>

                        <!-- vectors -->
                        <div>
                            <img src="{{ asset('assets/guest/img/about-2-img-vector.svg') }}" alt="vector"
                                class="absolute pointer-events-none top-[60px] right-[65px] -z-[1]" />
                            <img src="{{ asset('assets/guest/img/about-2-img-vector-2.svg') }}" alt="vector"
                                class="absolute pointer-events-none -bottom-[30px] right-0 -z-[1] md:hidden" />
                        </div>
                    </div>
                </div>

                <!-- right -->
                <div class="max-w-[54%] md:max-w-full">
                    <h6 class="ed-section-sub-title">Tentang Museum</h6>
                    <h2 class="ed-section-title mb-[6px]">
                        Pelestarian Budaya Riau
                        <span
                            class="text-edgreen font-bold relative before:absolute before:left-0 before:top-[calc(100%-6px)] before:w-[137px] before:h-[14px] before:bg-[url('../assets/img/banner-2-title-vector.svg')] before:bg-[length:100%_100%]">Museum
                            Sang Nila Utama</span>
                    </h2>
                    <p class="text-edgray mb-[34px]">
                        Museum Sang Nila Utama berkomitmen untuk melestarikan warisan budaya Riau yang kaya. Kami mengundang
                        masyarakat untuk ikut serta dalam menjaga sejarah, seni, dan tradisi yang menjadi bagian dari
                        identitas kita.
                    </p>
                    <ul
                        class="ed-about-list font-medium text-[18px] text-edblue grid grid-cols-2 xxs:grid-cols-1 gap-[20px] xxs:gap-[15px] mb-[52px] *:pl-[40px] *:relative *:before:absolute *:before:left-0 *:before:-top-[3px] *:before:w-[30px] *:before:aspect-square *:before:border *:before:border-edgreen *:before:rounded-full *:before:bg-[url(../assets/img/icon/checkmark.svg)] *:before:bg-no-repeat *:before:bg-[length:15px_13px] *:before:bg-center">
                        <li>Pelestarian Budaya</li>
                        <li>Komunitas Budaya</li>
                        <li>Bimbingan Ahli</li>
                        <li>Informasi Budaya</li>
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
                    @foreach ($agenda->chunk(3) as $chunkAgenda)
                        <div class="swiper-slide w-[50%]">
                            <div class="space-y-[30px]">
                                @foreach ($chunkAgenda as $item)
                                    <x-card.guest.event title="{{ $item->name }}" slug="{{ $item->slug }}"
                                        detail="{{ route('agenda.detail', ['id' => $item->id]) }}"
                                        image="{{ asset('storage/' . $item->image_path) }}"
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
                        Klasifikasi Filologi
                    </h3>
                    <a href="klasifikasi-filologi.html"
                        class="ed-btn !h-[56px] !bg-white !text-black gap-[10px] hover:!bg-edyellow hover:!text-edblue">Kunjungi
                        <span class="icon"><i class="fa-solid fa-arrow-right-long"></i></span></a>

                    <!-- vector -->
                    <img src="{{ asset('assets/guest/img/cta-2-txt-vector.svg') }}" alt="vector"
                        class="absolute bottom-[10px] left-[55%] xs:left-[75%]">
                </div>

                <!-- image -->
                <div class="mr-[40px] lg:mr-0 relative z-[1] shrink-0">
                    <img src="{{ asseT('assets/guest/img/cta-2-img.png') }}" alt="image">
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

                <!-- right -->
                <a href="upt-museum.html"
                    class="ed-btn !h-[56px] gap-[10px] border border-[#E5E5E5] !bg-transparent !text-edgreen hover:!bg-edgreen hover:!border-edgreen hover:!text-white">Selengkapnya
                    <span><i class="fa-solid fa-arrow-right-long"></i></span></a>
            </div>

            <!-- news cards -->
            <div class="grid grid-cols-2 md:grid-cols-1 gap-[30px]">
                <!-- news big card -->
                <div class="rounded-[20px] bg-edoffwhite overflow-hidden">
                    <!-- img -->
                    <div class="relative">
                        <img src="{{ asset('assets/guest/img/blog-big.jpg') }}" alt="blog cover"
                            class="w-full aspect-[570/290]" />
                        <!-- date -->
                        <div
                            class="absolute top-[30px] left-[30px] bg-[#ECF0F5] rounded-[10px] font-medium text-[14px] text-black inline-block uppercase overflow-hidden text-center">
                            <span class="bg-edgreen text-white block py-[3px] rounded-[10px]">10</span>
                            <span class="px-[11px] py-[2px] block">June</span>
                        </div>
                    </div>

                    <!-- txt -->
                    <div class="px-[30px] xxs:px-[20px] py-[22px] pt-[27px]">
                        <!-- infos -->
                        <div class="flex items-center gap-[16px] mb-[9px]">
                            <!-- single info -->
                            <div class="flex items-center gap-[10px] font-medium text-[12px] text-edgray">
                                <span><img src="{{ asset('assets/guest/img/icon/user-filled-purple.svg') }}"
                                        alt="icon" /></span>
                                <span>Admin Disbud</span>
                            </div>
                        </div>
                        <h5 class="font-medium text-[20px]">
                            <a href="kegiatan-disbud.html" class="hover:text-edgreen line-clamp-2">Disbud Adakan Workshop
                                Seni dan Budaya untuk Generasi
                                Muda</a>
                        </h5>
                    </div>
                </div>

                <!-- right / news small cards -->
                <div class="bg-edoffwhite rounded-[20px] p-[30px] xxs:p-[20px] space-y-[26px]">
                    <!-- single news -->
                    <div
                        class="flex xxs:flex-col gap-x-[25px] gap-y-[15px] items-center xxs:items-start border-b last:border-0 pb-[26px] last:pb-0">
                        <!-- img -->
                        <div class="shrink-0 rounded-[10px] overflow-hidden">
                            <img src="{{ asset('assets/guest/img/news-2-img-2.jpg') }}" alt="blog cover"
                                class="w-[142px] aspect-[142/153] object-cover" />
                        </div>

                        <!-- txt -->
                        <div>
                            <!-- infos -->
                            <div class="flex items-center gap-[16px] mb-[9px]">
                                <!-- single info -->
                                <div class="flex items-center gap-[10px] font-medium text-[12px] text-edgray">
                                    <span><img src="{{ asset('assets/guest/img/icon/user-filled-purple.svg') }}"
                                            alt="icon" /></span>
                                    <span>Admin Disbud</span>
                                </div>
                            </div>
                            <h5 class="font-medium text-[20px] mb-[17px]">
                                <a href="kegiatan-disbud.html" class="hover:text-edgreen line-clamp-2">Disbud Riau Gelar
                                    Festival Seni dan Budaya Tradisional</a>
                            </h5>

                            <!-- date -->
                            <div
                                class="bg-[#ECF0F5] rounded-[10px] font-medium text-[14px] text-black inline-block uppercase overflow-hidden text-center">
                                <span class="bg-edgreen text-white block py-[3px] rounded-[10px]">10</span>
                                <span class="px-[11px] py-[2px] block">June</span>
                            </div>
                        </div>
                    </div>

                    <!-- single news -->
                    <div
                        class="flex xxs:flex-col gap-x-[25px] gap-y-[15px] items-center xxs:items-start border-b last:border-0 pb-[26px] last:pb-0">
                        <!-- img -->
                        <div class="shrink-0 rounded-[10px] overflow-hidden">
                            <img src="{{ asset('assets/guest/img/news-2-img-3.jpg') }}" alt="blog cover"
                                class="w-[142px] aspect-[142/153] object-cover" />
                        </div>

                        <!-- txt -->
                        <div>
                            <!-- infos -->
                            <div class="flex items-center gap-[16px] mb-[9px]">
                                <!-- single info -->
                                <div class="flex items-center gap-[10px] font-medium text-[12px] text-edgray">
                                    <span><img src="{{ asset('assets/guest/img/icon/user-filled-purple.svg') }}"
                                            alt="icon" /></span>
                                    <span>Admin Disbud</span>
                                </div>
                            </div>
                            <h5 class="font-medium text-[20px] mb-[17px]">
                                <a href="kegiatan-disbud.html" class="hover:text-edgreen line-clamp-2">Disbud Luncurkan
                                    Program Pelestarian Budaya Lokal</a>
                            </h5>

                            <!-- date -->
                            <div
                                class="bg-[#ECF0F5] rounded-[10px] font-medium text-[14px] text-black inline-block uppercase overflow-hidden text-center">
                                <span class="bg-edgreen text-white block py-[3px] rounded-[10px]">10</span>
                                <span class="px-[11px] py-[2px] block">June</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- NEWS SECTION END -->
@endsection
