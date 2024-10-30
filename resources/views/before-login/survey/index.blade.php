@extends('layouting.guest.main')

@section('title', 'Survey')

@section('content')
    <x-card.guest.breadcrumb currentPage="Survey" />

    <div class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <!-- event cards -->
            <div class="grid grid-cols-2 sm:grid-cols-1 gap-[30px] md:gap-[20px]">
                @foreach ($surveys as $item)
                    <x-card.guest.survey
                        title="{{ $item->title }}"
                        description="{{ $item->slug }}"
                        status="{{ surveyStatusOnGuest($item->status) }}"
                        time="{{ ceil($item->questions->count() * 5 / 60) }} Menit"
                        detail="{{ route('survey.detail', ['id' => $item->id, 'slugs' => $item->slugs]) }}"
                    />
                @endforeach
            </div>

            <!-- PAGINATION START -->

        </div>
    </div>
@endsection
