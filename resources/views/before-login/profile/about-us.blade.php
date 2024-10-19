@extends('layouting.guest.main')

@section('title', 'Tentang Kami')

@section('content')
    <x-card.guest.breadcrumb currentPage="Tentang Kami" />

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
                    <h6 class="ed-section-sub-title">Tentang Kami</h6>
                    <h2 class="ed-section-title mb-[6px]">
                        Pelajari dan Lestarikan
                        <span
                            class="inline-block text-edgreen font-bold relative before:absolute before:left-0 before:top-[calc(100%-6px)] before:w-[137px] before:h-[14px] before:bg-[url('../assets/img/banner-2-title-vector.svg')] before:bg-[length:100%_100%]">Warisan
                            Budaya</span>
                        untuk Masa Depan
                    </h2>
                    <p class="text-edgray mb-[34px]">
                        Dinas Kebudayaan Provinsi Riau berkomitmen untuk melestarikan
                        dan mengembangkan kebudayaan Melayu yang kaya. Kami mengajak
                        masyarakat untuk terlibat dalam menjaga tradisi, seni, dan adat
                        istiadat yang merupakan identitas kita bersama.
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

    <!-- ABOUT SECTION START -->
    <section
        class="ed-2-about bg-edoffwhite py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-[5%] before:bg-no-repeat before:bg-cover before:bg-center before:mix-blend-multiply">
        <div class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px]">
            <div class="flex md:flex-col gap-x-[75px] gap-y-[30px]">
                <!-- left -->
                <div class="max-w-[54%] md:max-w-full flex flex-col justify-center">
                    <h6 class="ed-section-sub-title">Kata Sambutan</h6>
                    <div>
                        <p class="text-edgray mb-[34px]">
                            {!! $sambutan->content !!}
                        </p>
                    </div>
                </div>
                <!-- right -->
                <div class="max-w-[46%] md:max-w-full grow shrink-0">
                    <div class="relative flex items-end">
                        <img src="{{ isFileExist('storage/' . $sambutan->image_path, asset('assets/guest/img/about-2-image-1.png')) }}" alt="About Image"
                            class="border-[50px] border-white rounded-full" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ABOUT SECTION END -->
@endsection
