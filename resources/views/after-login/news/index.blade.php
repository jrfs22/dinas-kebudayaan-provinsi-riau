@extends('layouting.auth.main')

@section('title', 'Berita')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Berita" route="{{ route('news') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Berita" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <x-search.filter>
                    @foreach ($categories as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </x-search.filter>
                <a href="{{ route('news.create') }}" class="btn btn-primary d-flex align-items-center ms-3">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Berita
                </a>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Kategori</th>
                <th>Judul</th>
                <th>Ringkasan Berita</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($news as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->category->name }}
                        </td>
                        <td style="word-break: break-all;">
                            {{ $item->title }}
                        </td>
                        <td style="word-break: break-all;">
                            {{ $item->slug }}
                        </td>
                        <td>
                            {{ indonesianDate($item->date) }}
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="{{ route('news.edit', ['id' => $item->id]) }}" class="text-success edit">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>
                            <x-card.deleted route="{{ route('news.destroy', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>

@endsection

