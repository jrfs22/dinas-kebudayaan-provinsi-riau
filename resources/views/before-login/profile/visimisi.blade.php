@extends('layouting.guest.main')

@section('title', 'Visi & Misi')

@push('headers')
    <style>
        ol {
            list-style:decimal;
        }
    </style>
@endpush

@section('content')
    <x-card.guest.breadcrumb currentPage="Visi & Misi" />

    <section class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="flex sm:flex-col items-start justify-between">
                <div class="max-w-[50%] sm:max-w-full mb-[60px]">
                    <h2 class="ed-section-title">Visi & Misi</h2>
                    <img src="{{ asset('assets/guest/img/news-details-img-2.jpg') }}" alt="Image" class="rounded-[10px]" />
                </div>
                <div class="max-w-[50%] sm:max-w-full mb-[60px]">
                    <h2 class="ed-section-heading mb-[16px] font-bold">Visi</h2>
                    <p class="text-edgray2 mb-[25px]">
                        {!! $visi?->content !!}
                    </p>
                    <h2 class="ed-section-heading mb-[16px] font-bold">Misi</h2>
                    <div class="text-edgray2 list-decimal pl-3">
                        {!! $misi?->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
