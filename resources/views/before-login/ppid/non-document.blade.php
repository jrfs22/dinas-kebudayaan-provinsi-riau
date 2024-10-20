@extends('layouting.guest.main')

@section('title', 'PPID')

@section('content')
    <x-card.guest.breadcrumb currentPage="PPID" />

    <section class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            @foreach ($ppid as $item)
                <div style="margin-bottom: 50px;" class="flex items-center justify-center flex-col gap-[15px]">
                    <h2 class="ed-section-title mb-[25px]">{{ $item->name }}</h2>
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="Gambar PPID" class="rounded-xl" />
                </div>
            @endforeach
        </div>
    </section>
@endsection
