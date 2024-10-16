@extends('layouting.auth.main')

@section('title', 'Kategori PPID')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Kategori PPID" route="{{ route('ppid.category') }}" />
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
                <th>Tipe</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($categories as $item)
                    <tr class="search-items">
                        <td  class="text-capitalize">
                            {{ $item->name }}
                        </td>
                        <td  class="text-capitalize">
                            {{ $item->type }}
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit"
                                data-id="{{ $item->id }}"
                                data-type="{{ $item->type }}"
                                data-name="{{ $item->name }}" onclick="modalEditPpid(this)">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>

                            <x-card.deleted route="{{ route('ppid.category.destroy', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.basic title="Tambah Kategori" action="{{ route('ppid.category.store') }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" label="Nama Kategori" placeholder="Nama Kategori" />
                </div>
                <div class="col-12">
                    <x-forms.select
                        name="type"
                        label="Tipe">
                        <option value="dokumen">Dokumen</option>
                        <option value="non dokumen">Non Dokumen</option>
                    </x-forms.select>
                </div>
            </div>
        </x-modal.basic>

        <x-modal.basic id="Editppid" title="Edit News" action="{{ route('ppid.category.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" id="edt_name" label="Nama Kategori" placeholder="Nama Kategori" />
                </div>
                <div class="col-12">
                    <x-forms.select
                        name="type"
                        label="Tipe"
                        id="edt_type">
                        <option value="dokumen">Dokumen</option>
                        <option value="non dokumen">Non Dokumen</option>
                    </x-forms.select>
                </div>
            </div>
        </x-modal.basic>
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditPpid(element) {
            var id = $(element).data('id');
            var name = $(element).data('name');
            var type = $(element).data('type');

            var route = {!! json_encode(route('ppid.category.update') . '/') !!} + id


            $("#Editppid form").attr('action', route)
            $("#input-edt_name").val(name)
            $("#edt_type").val(type).change()

            $("#Editppid").modal('show')
        }
    </script>
@endpush
