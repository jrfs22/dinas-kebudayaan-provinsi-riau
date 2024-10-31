@extends('layouting.auth.main')

@section('title', 'Pengguna')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Pengguna" route="{{ route('pengguna') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Pengguna" />
            </div>
            {{-- <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <a href="{{ route('pengguna') }}" class="btn btn-primary d-flex align-items-center ms-3">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Pengguna
                </a>
            </div> --}}
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Role</th>
                {{-- <th>Aksi</th> --}}
            @endslot

            @slot('slotBody')
                @foreach ($users as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->email }}
                        </td>
                        <td class="text-capitalize">
                            {{ $item->role }}
                        </td>
                        {{-- <td class="action-btn d-flex gap-2"> --}}
                            {{-- <a href="{{ route('news.edit', ['id' => $item->id]) }}" class="text-success edit">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>
                            <x-card.deleted route="{{ route('news.destroy', ['id' => $item->id]) }}" /> --}}
                        {{-- </td> --}}
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>

@endsection
