@extends('layouting.guest.main')

@section('title', 'Detail Klasifikasi')

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
    <x-card.guest.breadcrumb currentPage="Detail Klasifikasi" />

    <div class="py-[130px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div
                class="flex md:flex-col md:items-start gap-x-[30px] gap-y-[15px] border border-[#E5E5E5] rounded-[12px] p-[30px] xs:p-[20px] xxs:p-[15px]">
                <div class="w-80 h-80">
                    <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-css-mode">
                        <div class="swiper-wrapper" id="swiper-wrapper-3b9a1ddcd1264217" aria-live="polite">
                            @foreach ($klasifikasi->images as $key => $item)
                                <div class="swiper-slide swiper-slide-active"
                                role="group" aria-label="{{ $key }} / {{ $klasifikasi->images()->count() }}"
                                    style="width: 320px;">
                                    <img src="{{ asset('assets/guest/img/teacher-2.jpg') }}" alt="team member image"
                                        class="xxs:max-w-full aspect-[74/75] rounded-[12px]">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                            aria-controls="swiper-wrapper-3b9a1ddcd1264217" aria-disabled="false"></div>
                        <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                            aria-label="Previous slide" aria-controls="swiper-wrapper-3b9a1ddcd1264217"
                            aria-disabled="true"></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>

                <!-- txt -->
                <div class="txt">
                    <h3 class="text-[30px] xxs:text-[25px] font-semibold mb-[24px]">
                        {{ $klasifikasi->title }}
                    </h3>
                    <div class="mb-4 border p-4 py-5 rounded-xl">
                        <span class="font-medium">Deskripsi</span>
                        <p class="font-normal text-[16px] text-edgray mt-[8px]">
                            {{ $klasifikasi->description }}
                        </p>
                    </div>
                    <div class="overflow-auto rounded-lg border p-4">
                        <span class="font-medium">Informasi Objek</span>
                        <table class="border-collapse w-full mt-[8px]">
                            <tbody class="divide-y divide-gray-100">
                                <tr class="bg-white">
                                    <td class="w-48 p-3 text-sm text-gray-700 whitespace-nowrap">
                                        Klasifikasi
                                    </td>
                                    <td class="p-3 text-sm text-gray-700 font-semibold whitespace-nowrap">
                                        : {{ $klasifikasi->category->name }}
                                    </td>
                                </tr>
                                @foreach ($klasifikasi->informations as $item)
                                    <tr class="bg-gray-50">
                                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                            {{ $item->type }}
                                        </td>
                                        <td class="p-3 text-sm text-gray-700 font-semibold whitespace-nowrap">
                                            : {{ $item->description }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
