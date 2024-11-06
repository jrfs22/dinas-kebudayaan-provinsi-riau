@extends('before-login.detail.layout')

@section('title', 'Detail Event Kebudayaan')
@section('breadcrumb', 'Detail Event')

@section('leftContent')
    <x-card.guest.eventDetail
        image="{{ asset('storage/' . $agenda->image_path) }}"
        title="{{ $agenda->title }}"
        date="{{ indonesianDate($agenda->date) }}"
        start_time="{{ getTime($agenda->start_time) }}"
        end_time="{{ getTime($agenda->end_time) }}"
        content="{!! $agenda->content !!}" />
@endsection

@section('rightContent')
    <x-widget.guest.shares
        :url="url()->current()"
    />

    @if (isValidGoogleMapsEmbedURL($agenda->location))
        <iframe src="{{ $agenda->location }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-[280px] rounded-[5px]"></iframe>
    @endif

    <x-widget.guest.recent widgetTitle="Recent Agenda">
        @foreach ($recent as $item)
            <x-card.guest.recent
                image="{{ asset('storage/' . $item->image_path) }}"
                title="{{ $item->name }}"
                date="{{ $item->date }}"
                detail="{{ route('agenda.detail', ['slug' => $item->slug]) }}"
            />
        @endforeach
    </x-widget.guest.recent>
@endsection
