@extends('layouting.guest.main')

@section('title', 'Kontak')

@section('content')

    <x-card.guest.breadcrumb currentPage="Kontak Kami"/>

    <section class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
            <div class="grid grid-cols-2 md:grid-cols-1 gap-[60px] xl:gap-[40px] items-center">
                <!-- left side contact infos -->
                <div class="rounded-[16px] overflow-hidden">
                    <div class="bg-edgreen p-[40px] sm:p-[30px] xxs:p-[20px] space-y-[24px] text-[16px]">
                        <!-- single contact info -->
                        <div
                            class="flex flex-wrap xxs:flex-col items-center xxs:items-start gap-[20px] gap-y-[10px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                            <span
                                class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                <img src="{{ asset('assets/guest/img/icon/call-msg.svg') }}" alt="icon">
                            </span>

                            <div class="txt">
                                <span class="font-normal">Telepon</span>
                                <h4 class="font-medium text-[24px] xxs:text-[22px]">
                                    <a href="tel:+208-555-0112">0812-3456-7890</a>
                                </h4>
                            </div>
                        </div>

                        <!-- single contact info -->
                        <div
                            class="flex flex-wrap xxs:flex-col items-center xxs:items-start gap-[20px] gap-y-[10px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                            <span
                                class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                <img src="{{ asset('assets/guest/img/icon/mail-at.svg') }}" alt="icon">
                            </span>

                            <div class="txt">
                                <span class="font-normal">Email</span>
                                <h4 class="font-medium text-[24px] xxs:text-[22px]">
                                    <a href="mailto:eventek@gmail.com">disbud@gmail.com</a>
                                </h4>
                            </div>
                        </div>

                        <!-- single contact info -->
                        <div
                            class="flex flex-wrap xxs:flex-col xxs:items-start gap-[20px] gap-y-[10px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                            <span
                                class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                <img src="{{ asset('assets/guest/img/icon/location-dot-circle.svg') }}" alt="icon">
                            </span>

                            <div class="txt">
                                <span class="font-normal">Location</span>
                                <h4 class="font-medium text-[24px] xxs:text-[22px]">
                                    <!-- location map -->
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6693315389807!2d101.45222477605746!3d0.4951527995000009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aedd2565414f%3A0x61f21d93f231fbf!2sDinas%20Kebudayaan%20Riau!5e0!3m2!1sen!2sid!4v1728827441163!5m2!1sen!2sid"
                                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                        class="w-[395px] h-[280px] rounded-[5px]"></iframe>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- right side contact form -->
                <div>
                    <h2
                        class="text-[40px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-semibold text-edblue mb-[7px]">
                        Kirim Pesan
                    </h2>
                    <p class="text-edgray font-normal text-[16px] mb-[38px]">
                        Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, jangan ragu untuk menghubungi kami. Tim kami akan dengan senang hati membantu Anda.
                    </p>

                    <form action="{{ route('contact_us.store') }}" method="POST" class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]">
                        @csrf
                        <div>
                            <label for="ed-contact-name"
                                class="font-lato font-semibold text-edblue block mb-[12px]">Nama*</label>
                            <input type="text" name="name" id="ed-contact-name" placeholder="Masukkan Nama"
                                class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                        </div>
                        <div>
                            <label for="ed-contact-email"
                                class="font-lato font-semibold text-edblue block mb-[12px]">Email*</label>
                            <input type="email" name="email" id="ed-contact-email" placeholder="Masukkan Email"
                                class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                        </div>
                        <div class="col-span-2 xxs:col-span-1">
                            <label for="ed-contact-message"
                                class="font-lato font-semibold text-edblue block mb-[12px]">Pesan*</label>
                            <textarea name="messages" id="ed-contact-message" placeholder="Tulis Pesan"
                                class="border border-[#ECECEC] h-[145px] p-[20px] rounded-[4px] w-full focus:outline-none"></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                class="bg-edgreen h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-edblue">
                                Kirim Pesan
                                <span class="icon pl-[10px]"><i class="fa-solid fa-arrow-right-long"></i></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
