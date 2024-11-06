@extends('before-login.detail.layout')

@section('title', 'Kegiatan Disbud')
@section('breadcrumb', 'Kegiatan Disbud')


@section('leftContent')
    <x-card.guest.detail
        gambar="{{ asset('assets/' . $news->image_path) }}"
        categoryName="{{ $news->category->name }}"
        title="{{ $news->title }}"
        author="Bidang {{ $news?->category?->departement?->name }}"
        date="{{ $news->date }}"
        content="{!! $news->content !!}"
    />
@endsection

@section('rightContent')
    <x-widget.guest.search />

    <!-- Categories widget -->
    <x-widget.guest.category>
        @foreach ($newsCategories as $item)
            <li class="text-black py-[16px] border-b border-t border-[#D9D9D9]">
                <a href="#" class="flex items-center justify-between hover:text-edgreen">
                    <span>{{ $item->name }}</span>
                    <span>({{ $item->news()->count() }})</span>
                </a>
            </li>
        @endforeach
    </x-widget.guest.category>

    <!-- Recent Post widget -->
    <x-widget.guest.recent widgetTitle="Berita Terkini">
        @foreach ($recent as $item)
            <x-card.guest.recent
                image="{{ asset('storage/' . $item->image_path) }}"
                title="{{ $item->name }}"
                date="{{ $item->date }}"
                detail="{{ route('news.detail', ['slug' => $item->slug]) }}"
            />
        @endforeach
    </x-widget.guest.recent>
@endsection
