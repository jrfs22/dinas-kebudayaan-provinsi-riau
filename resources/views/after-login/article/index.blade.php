@extends('layouting.auth.main')

@section('title', 'Artikel')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Artikel" route="{{ route('news') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Artikel" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                @role('super admin')
                    <x-search.filter>
                        @foreach ($categories as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </x-search.filter>
                @endrole
                @if ($categories->isNotEmpty())
                    <a href="{{ route('article.create') }}" class="btn btn-primary d-flex align-items-center ms-3">
                        <i class="ti ti-plus text-white me-1 fs-5"></i> Artikel
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Kategori</th>
                <th>Judul</th>
                <th>Ringkasan Artikel</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($article as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->category->name }}
                        </td>
                        <td class="w-200px">
                            {{ $item->title }}
                        </td>
                        <td class="w-200px">
                            {{ $item->summary }}
                        </td>
                        <td>
                            {{ indonesianDate($item->date) }}
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="{{ route('article.edit', ['id' => $item->id]) }}" class="text-success edit">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>
                            <x-card.deleted route="{{ route('article.destroy', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>

@endsection

