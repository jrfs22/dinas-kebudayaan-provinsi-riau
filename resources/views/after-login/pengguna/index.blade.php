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
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <button class="btn btn-primary d-flex align-items-center ms-3" data-bs-toggle="modal"
                    data-bs-target="#defaultModal">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Pengguna
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Departement</th>
                <th>Role</th>
                <th>Aksi</th>
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
                        <td>
                            {{ $item->departement->name }}
                        </td>
                        <td class="text-capitalize">
                            {{ $item->role }}
                        </td>
                        <td>
                            <div class="action-btn d-flex gap-2">
                                <a href="javascript:void(0)" class="text-success edit"
                                    data-id="{{ $item->id }}"
                                    data-name="{{ $item->name }}" data-email="{{ $item->email }}"
                                    data-name="{{ $item->name }}" data-departement_id="{{ $item->departement_id }}"
                                    onclick="modalEditPengguna(this)">
                                    <i class="ti ti-pencil fs-5"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>


    <x-modal.basic title="Tambah Pengguna Baru" action="{{ route('pengguna.store') }}">
        <div class="row">
            <div class="col-12">
                <x-forms.input name="name" label="Nama Lengkap" placeholder="Jhon Doe" required=1 />
            </div>
            <div class="col-12">
                <x-forms.input name="email" type="email" label="Email  (Password default adalah email)" placeholder="jhone.doe@example.com"
                    required=1 />
            </div>
            <div class="col-12 mb-3">
                <x-forms.select name="departement_id" label="Deprtement Penanggung Jawab" required=1>
                    @foreach ($departement as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </x-forms.select>
            </div>
        </div>
    </x-modal.basic>

    <x-modal.basic id="EditPengguna" title="Edit Kategori " action="{{ route('pengguna.store') }}" isUpdate=1>
        <div class="row">
            <div class="col-12">
                <x-forms.input name="name" id="edt_name" label="Nama Lengkap" placeholder="Jhon Doe" required=1 />
            </div>
            <div class="col-12">
                <x-forms.input name="email" id="edt_email" type="email" label="Email" placeholder="jhone.doe@example.com"
                    required=1 />
            </div>
            <div class="col-12 mb-3">
                <x-forms.select name="departement_id" id="edtDepartement" label="Deprtement Penanggung Jawab" required=1>
                    @foreach ($departement as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </x-forms.select>
            </div>
        </div>
    </x-modal.basic>
@endsection

@push('scripts')
    <script>
        function modalEditPengguna(element) {
            var id = $(element).data('id');
            var name = $(element).data('name');
            var email = $(element).data('email');
            var departement_id = $(element).data('departement_id');

            var route = {!! json_encode(route('news.category.update') . '/') !!} + id

            $("#EditPengguna form").attr('action', route)
            $("#input-edt_name").val(name)
            $("#input-edt_email").val(email)
            $("#edtDepartement").val(departement_id).change()

            $("#EditPengguna").modal('show')
        }
    </script>
@endpush
