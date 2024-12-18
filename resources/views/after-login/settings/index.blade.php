@extends('layouting.auth.main')

@section('title', $pageTitle)

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="{{ $pageTitle }}" route="" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-12 col-md-4 col-xl-3">
                <x-search.basic placeholder="Hero" />
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Kategori</th>
                <th>Konten</th>
                <th>Status</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($content as $item)
                    <tr class="search-items">
                        <td class="text-capitalize">
                            {{ $item->title }}
                        </td>
                        <td class="break-line">
                            @if ($item->content != null)
                                {!! $item->content !!}
                            @elseif ($item->image_path != null)
                                <img style="max-height: 100px; object-fit: contain;"
                                    src="{{ asset('storage/' . $item->image_path) }}" alt="Gambar">
                            @elseif ($item->url_path != null)
                                <a href="{{ $item->url_path }}">{{ $item->url_path }}</a>
                            @else
                                {!! $item->description !!}
                            @endif
                        </td>
                        <td>
                            <span
                                class="badge text-capitalize {{ $item->status == 'draft' ? 'bg-danger' : 'bg-success' }}">{{ $item->status }}</span>
                        </td>
                        <td>
                            <div class="action-btn d-flex gap-2">
                                <a href="{{ route('settings.edit', ['id' => $item->id, 'type' => $type]) }}"
                                    class="text-success edit">
                                    <i class="ti ti-pencil fs-5"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>

@endsection
