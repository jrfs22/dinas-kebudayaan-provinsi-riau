@extends('layouting.guest.main')

@section('title', '404')

@section('content')
    <div class="py-[130px] xl:py-[80px] md:py-[60px] text-center">
        <div
            class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">
            <span class="font-bold text-edyellow text-[60px]">404</span>
            <h2 class="font-medium text-[48px] lg:text-[50px] md:text-[45px] sm:text-[40px] xxs:text-[35px] mb-[3px]">
                <span class="text-edyellow">Oops!</span> Halaman tidak ada
            </h2>
            <p class="text-[18px] text-etBlack mb-[41px] lg:mb-[31px] anim-text text-gray-500">
                Halaman yang anda cari tidak ditemukan
            </p>
            <a href="index.html"
                class="bg-edred h-[56px] rounded-[10px] px-[24px] inline-flex items-center justify-center gap-[10px] font-medium text-[16px] text-white hover:bg-edblue">Kembali
                ke halaman home <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
    </div>
@endsection
