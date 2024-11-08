@extends('layouting.auth.main')

@section('title', 'PPKD')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="PPKD" route="{{ route('news') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="PPKD" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <a href="{{ route('ppkd.create') }}" class="btn btn-primary d-flex align-items-center ms-3">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> PPKD
                </a>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Kabupaten/Kota</th>
                <th>Nama Dokumen</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($ppkd as $item)
                    <tr class="search-items">
                        <td>
                            <a target="_blank" href="{{ asset('storage/' . $item->file_path) }}">{{ $item->regency_name }}</a>
                        </td>
                        <td class="w-200px">
                            {{ $item->title }}
                        </td>
                        <td class="w-200px">
                            {{ indonesianDate($item->date) }}
                        </td>
                        <td>
                            <span class="badge text-capitalize {{ $item->status == 'disahkan' ? 'bg-success ' : 'bg-secondary' }}">{{ $item->status }}</span>
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="{{ route('ppkd.edit', ['id' => $item->id]) }}" class="text-success edit">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>
                            <x-card.deleted route="{{ route('ppkd.destroy', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>

@endsection

