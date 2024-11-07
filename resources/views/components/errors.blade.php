@props([
    'errorCode',
    'message',
    'description'
])

<div class="centered-body text-center">
    <div
        class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">
        <span class="font-bold text-edyellow text-[120px]">{{ $errorCode }}</span>
        <h2 class="font-medium text-[32px] lg:text-[50px] md:text-[45px] sm:text-[40px] xxs:text-[35px] mb-[3px]">
            <span class="text-edyellow">Oops!</span> {{ $message }}
        </h2>
        <p class="text-[18px] text-etBlack mb-[32px] lg:mb-[31px] anim-text text-gray-500">
            {{ $description }}
        </p>
        <a href="{{ route('beranda') }}"
            class="bg-edred h-[56px] rounded-[10px] px-[24px] inline-flex items-center justify-center gap-[10px] font-medium text-[16px] text-white hover:bg-edblue">Kembali
            ke halaman beranda <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
</div>
