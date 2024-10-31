@extends('layouting.auth.main')

@section('title', 'Departement')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Departement" route="{{ route('departement') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Departement    " />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <button class="btn btn-primary d-flex align-items-center ms-3" data-bs-toggle="modal"
                    data-bs-target="#defaultModal">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Departement
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Departement</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($departement as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->name }}
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit" data-id="{{ $item->id }}"
                                data-name="{{ $item->name }}""
                                onclick="modalEditDepartement(this)">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>

                            <x-card.deleted route="{{ route('departement.destroy', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.basic title="Tambah Departement" action="{{ route('departement.store') }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" label="Nama Departement" placeholder="Nama Departement" />
                </div>
            </div>
        </x-modal.basic>

        <x-modal.basic id="EditDepartement" title="Edit Departement" action="{{ route('departement.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" id="edt_name" label="Nama Departement" placeholder="Nama Departement" />
                </div>
            </div>
        </x-modal.basic>
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditDepartement(element) {
            var id = $(element).data('id');
            var name = $(element).data('name');

            var route = {!! json_encode(route('departement.update') . '/') !!} + id

            $("#EditDepartement form").attr('action', route)
            $("#input-edt_name").val(name)

            $("#EditDepartement").modal('show')
        }
    </script>
@endpush
