@extends('layouting.guest.main')

@section('title', 'Sejarah Singkat')

@section('content')
    <x-card.guest.breadcrumb currentPage="Sejarah Singkat" />

    <!-- TEAM MEMBER DETAILS SECTION START -->
    <div class="py-[130px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div
                class="flex md:flex-col items-center md:items-start gap-x-[30px] gap-y-[15px] border border-[#E5E5E5] rounded-[12px] p-[30px] xs:p-[20px] xxs:p-[15px]">
                <div class="img shrink-0">
                    <img src="{{ isFileExist('storage/' . $content?->image_path, asset('assets/guest/img/teacher-2.jpg')) }}" alt="Gambar Sejarah"
                        class="w-[370px] xxs:max-w-full aspect-[74/75] rounded-[12px]" />
                </div>

                <!-- txt -->
                <div class="txt">
                    <h3 class="text-[30px] xxs:text-[25px] font-semibold mb-[6px]">
                        Dinas Kebudayaan Provinsi Riau
                    </h3>
                    <p class="font-normal text-[16px] text-edgray mt-[16px]">
                        {!! $content?->content !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
