
<footer style="background-color: black; background-image: url('../../{{ 'storage/' . $footer->image_path }}');background-repeat: no-repeat; background-size: cover;"
class="relative z-[1] before:absolute before:inset-0 before:-z-[1] background before:opacity-[7%] before:bg-no-repeat before:bg-cover before:bg-center text-white">
<div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
    <!-- footer top -->
    <div class="flex flex-wrap justify-between gap-[35px] pt-[100px] pb-[58px] border-b border-white/20">
        <!-- footer about -->
        <div class="max-w-[370px] xxs:max-w-full">
            <a href="index.html" class="inline-block mb-[23px]"><img
                    src="http://sitari.disbud.riau.go.id/assets/img/logo1.png" style="width: 100px"
                    alt="logo" /></a>
            <p class="text-[#D9D9D9] mb-[19px]">
                {{ $aboutDescription }}
            </p>

            <ul class="space-y-[17px]">
                <li class="flex items-center gap-[8px]">
                    <span class="icon"><img src="{{ asset('assets/guest/img/call-icon-yellow.sv') }}g" alt="icon" /></span>
                    <a href="{{ $telepon->url_path }}" class="hover:text-edyellow">{{ $telepon->content }}</a>
                </li>

                <li class="flex items-center gap-[8px]">
                    <span class="icon"><img src="{{ asset('assets/guest/img/message-yellow.svg') }}" alt="icon" /></span>
                    <a href="{{ $email->url_path }}" class="hover:text-edyellow">{{ $email->content }}</a>
                </li>
            </ul>
        </div>

        <!-- footer widget -->
        <div>
            <h6
                class="font-semibold text-[18px] pb-[15px] mb-[30px] relative before:absolute before:bottom-0 before:left-0 before:h-[1.5px] before:w-[20px] before:bg-edyellow after:absolute after:bottom-0 after:left-[30px] after:h-[1.5px] after:w-[63px] after:bg-white">
                Sitemap
            </h6>

            <div class="space-y-[18px]">
                <a href="{{ route('beranda') }}" class="flex items-center gap-[10px] opacity-80 hover:text-edyellow"><span
                        class="icon"><img src="{{ asset('assets/guest/img/double-arrow.svg') }}" alt="icon" /></span>
                    Beranda</a>
                <a href="{{ route('profiles', ['type' => 'about']) }}"
                    class="flex items-center gap-[10px] opacity-80 hover:text-edyellow"><span
                        class="icon"><img src="{{ asset('assets/guest/img/double-arrow.svg') }}" alt="icon" /></span>
                    Tentang Kami</a>
                <a href="{{ route('public.news') }}"
                    class="flex items-center gap-[10px] opacity-80 hover:text-edyellow"><span
                        class="icon"><img src="{{ asset('assets/guest/img/double-arrow.svg') }}" alt="icon" /></span>
                    Kegiatan Disbud</a>
                <a href="{{ route('gallery') }}"
                    class="flex items-center gap-[10px] opacity-80 hover:text-edyellow"><span
                        class="icon"><img src="{{ asset('assets/guest/img/double-arrow.svg') }}" alt="icon" /></span>
                    Gallery</a>
            </div>
        </div>

        <!-- footer widget -->
        <div class="max-w-[300px]">
            <h6
                class="font-semibold text-[18px] pb-[15px] mb-[30px] relative before:absolute before:bottom-0 before:left-0 before:h-[1.5px] before:w-[20px] before:bg-edyellow after:absolute after:bottom-0 after:left-[30px] after:h-[1.5px] after:w-[63px] after:bg-white">
                Lokasi
            </h6>

            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.67732615472!2d101.4547997!3d0.4951528!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aedd2565414f%3A0x61f21d93f231fbf!2sDinas%20Kebudayaan%20Riau!5e0!3m2!1sen!2sid!4v1730348259663!5m2!1sen!2sid" aria-hidden="true" frameborder="0" tabindex="-1"></iframe>

                <!-- social links -->
                <div class="flex gap-[20px] mt-[30px]">
                    <span
                        class="pl-[30px] font-medium text-[#d9d9d9] relative before:absolute before:left-0 before:top-[50%] before:-translate-y-[50%] before:h-[1px] before:w-[20px] before:bg-[#d9d9d9]">Follow
                        on</span>
                    <span class="inline-flex gap-[16px] text-[#d9d9d9]">
                        @foreach ($mediaSocial as $item)
                            <a target="_blank" href="{{ $item->url_path }}" class="hover:text-edyellow"><i
                                    class="fa-brands {{ mediaSocial($item->category) }}"></i></a>
                        @endforeach
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- footer bottom -->
    <div class="flex flex-wrap items-center justify-between gap-[15px] pt-[20px] pb-[50px] text-[#d9d9d9]">
        <p>&copy; Copyright {{ now()->year }} by {{ config('app.name') }}</p>
    </div>
</div>
</footer>
<!-- FOOTER SECTION END -->
