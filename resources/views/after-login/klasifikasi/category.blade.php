@extends('layouting.auth.main')

@section('title', 'Kategori Klasifikasi')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Kategori Klasifikasi" route="{{ route('klasifikasi.category') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Kategori" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <button class="btn btn-primary d-flex align-items-center ms-3" data-bs-toggle="modal"
                    data-bs-target="#defaultModal">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Kategori
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Nama Kategori</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($categories as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->name }}
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit" data-id="{{ $item->id }}"
                                data-name="{{ $item->name }}" onclick="modalEditklasifikasi(this)">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>

                            <x-card.deleted route="{{ route('klasifikasi.category.destroy', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.basic title="Tambah Kategori" action="{{ route('klasifikasi.category.store') }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" label="Nama Kategori" placeholder="Nama Kategori" />
                </div>
            </div>
        </x-modal.basic>

        <x-modal.basic id="Editklasifikasi" title="Edit News" action="{{ route('klasifikasi.category.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" id="edt_name" label="Nama Kategori" placeholder="Nama Kategori" />
                </div>
            </div>
        </x-modal.basic>
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditklasifikasi(element) {
            var id = $(element).data('id');
            var name = $(element).data('name');

            var route = {!! json_encode(route('klasifikasi.category.update') . '/') !!} + id


            $("#Editklasifikasi form").attr('action', route)
            $("#input-edt_name").val(name)

            $("#Editklasifikasi").modal('show')
        }
    </script>
@endpush
