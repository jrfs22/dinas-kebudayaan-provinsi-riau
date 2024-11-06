@extends('before-login.detail.layout')

@section('title', 'Detail Artikel')
@section('breadcrumb', 'Detail Artikel')

@section('leftContent')
    <x-card.guest.eventDetail image="{{ asset('storage/' . $article->image_path) }}" title="{{ $article->title }}"
        date="{{ indonesianDate($article->date) }}" start_time="{{ getTime($article->start_time) }}"
        end_time="{{ getTime($article->end_time) }}" content="{!! $article->content !!}" />
@endsection

@section('rightContent')

    <x-widget.guest.search route="{{ route('article.search') }}"/>

    <x-widget.guest.category>
        @foreach ($articleCategories as $item)
            <li class="text-black py-[16px] border-b border-t border-[#D9D9D9]">
                <a href="#" class="flex items-center justify-between hover:text-edgreen">
                    <span>{{ $item->name }}</span>
                    <span>({{ $item->article()->count() }})</span>
                </a>
            </li>
        @endforeach
    </x-widget.guest.category>

    <x-widget.guest.recent widgetTitle="Artikel Terkini">
        @foreach ($recent as $item)
            <x-card.guest.recent image="{{ asset('storage/' . $item->image_path) }}" title="{{ $item->name }}"
                date="{{ $item->date }}" detail="{{ route('article.detail', ['slug' => $item->slug]) }}" />
        @endforeach
    </x-widget.guest.recent>
@endsection
