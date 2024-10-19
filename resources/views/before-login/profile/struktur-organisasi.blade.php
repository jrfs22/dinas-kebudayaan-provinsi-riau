@extends('layouting.guest.main')

@section('title', 'Struktur Organisasi')

@section('content')
    <x-card.guest.breadcrumb currentPage="Struktur Organisasi" />

    <section class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="flex items-start justify-center gap-[15px]">
                <h2 class="ed-section-title mb-[25px]">Struktur Organisasi</h2>
            </div>
            <img src="{{ asset('storage/' . $content->image_path) }}" alt="Gambar Struktur Organisasi" class="rounded-xl" />
        </div>
    </section>
@endsection
