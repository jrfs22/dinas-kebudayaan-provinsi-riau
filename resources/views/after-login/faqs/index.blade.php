@extends('layouting.auth.main')

@section('title', 'Pesan')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Pesan" route="{{ route('contact_us') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Pesan" />
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Nama</th>
                <th>Pesan</th>
                <th>Tanggal</th>
            @endslot

            @slot('slotBody')
                @foreach ($ContactUS  as $item)
                    <tr class="search-items">
                        <td>
                            <h6>{{ $item->name }}</h6>
                            <p>{{ $item->email }}</p>
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ indonesianDate($item->created_at) }}
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>

@endsection
