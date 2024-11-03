@extends('layouting.guest.main')

@section('title', 'Detail Gallery')

@push('headers')
    <link rel="stylesheet" href="{{ asset('assets/guest/vendor/swiper/swiper-bundle.min.css') }}" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
    <x-card.guest.breadcrumb currentPage="Detail Gallery" />

    <section class="ed-2-courses py-[120px] xl:py-[80px] md:py-[60px] h-full">
        <div class="mx-[9.2%] xxxl:mx-[8.2%] xxl:mx-[3%]">
            <!-- section heading -->
            <div class="text-center mb-12">
                <h6 class="ed-section-sub-title">Detail Gallery Kegiatan</h6>
                <h2 class="ed-section-title">{{ $gallery->title }}</h2>
            </div>

            <!-- Slider main container -->
            <div class="relative swiper mySwiper max-w-5xl rounded-2xl swiper-initialized swiper-horizontal swiper-css-mode">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper" id="swiper-wrapper-f4f9a7e64eea6109e" aria-live="polite">
                    <!-- Slides -->
                    @foreach ($gallery->images as $key => $item)
                        <div class="swiper-slide flex-col items-center h-full swiper-slide-active" role="group"
                            aria-label="{{ $key }} / {{ $gallery->images->count() }}" style="width: 1024px;">
                            <img src="{{ asset('storage/'. $item->image_path) }}" alt="Gambar {{ $item->title }}" width="100%" height="100%"
                                class="object-fill" style="aspect-ratio: 16/9; width: 100%; object-fit: cover;">
                            <div class="text-center mt-4 w-full">
                                <h5 class="text-2xl font-semibold mb-2">
                                    {{ $item->title }}
                                </h5>
                                <p class="text-sm text-gray-500">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- If we need navigation buttons -->
                <div class="absolute swiper-button-prev w-16 h-16 rounded-full bg-edyellow left-8 swiper-button-disabled"
                    tabindex="-1" role="button" aria-label="Previous slide"
                    aria-controls="swiper-wrapper-f4f9a7e64eea6109e" aria-disabled="true"></div>

                <div class="absolute swiper-button-next w-16 h-16 rounded-full bg-edyellow right-8" tabindex="0"
                    role="button" aria-label="Next slide" aria-controls="swiper-wrapper-f4f9a7e64eea6109e"
                    aria-disabled="false"></div>

                <!-- If we need pagination -->
                <!-- <div class="swiper-pagination"></div> -->
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/guest/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            mousewheel: true,
            keyboard: true,
        });
    </script>
@endpush
