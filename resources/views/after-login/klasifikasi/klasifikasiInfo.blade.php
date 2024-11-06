@extends('layouting.auth.main')

@section('title', 'Dokumentasi ' . $klasifikasi->title)

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Dokumentasi {{ $klasifikasi->title }}" route="{{ route('klasifikasi') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <button data-bs-toggle="modal" data-bs-target="#defaultModal"
                    class="btn btn-primary d-flex align-items-center ms-3">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Informasi
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Jenis Informasi</th>
                <th>Keterangan Informasi</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($klasifikasi->informations as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->type }}
                        </td>
                        <td>
                            {{ $item->description }}
                        </td>
                        <td class="action-btn">
                            <div class="d-flex gap-2">
                                <a href="javascript:void(0)" class="text-success edit"
                                    data-id="{{ $item->id }}"
                                    data-type="{{ $item->type }}"
                                    data-description="{{ $item->description }}"
                                    onclick="modalEditInfoKlasifikasi(this)">
                                    <i class="ti ti-pencil fs-5"></i>
                                </a>

                                <x-card.deleted route="{{ route('klasifikasi.informations.destroy', ['id' => $item->id]) }}" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.basic title="Tambah Informasi" action="{{ route('klasifikasi.informations.post', ['id' => $klasifikasi->id]) }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="type" label="Jenis Informasi" placeholder="Bahan" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.input name="description" label="Keterangan Informasi" placeholder="Kayu" required=1/>
                </div>
            </div>
        </x-modal.basic>

        <x-modal.basic id="EditInfoKlasifikasi" title="Edit Informasi" action="{{ route('klasifikasi.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="type" id="edt_type" label="Jenis Informasi" placeholder="Bahan" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.input name="description" id="edt_description" label="Keterangan Informasi" placeholder="Kayu" required=1/>
                </div>
            </div>
        </x-modal.basic>
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditInfoKlasifikasi(element) {
            var id = $(element).data('id');
            var type = $(element).data('type');
            var description = $(element).data('description');

            var route = {!! json_encode(route('klasifikasi.informations.update') . '/') !!} + id

            $("#EditInfoKlasifikasi form").attr('action', route)

            $("#input-edt_type").val(type)
            $("#input-edt_description").val(description)
            $("#EditInfoKlasifikasi").modal('show')
        }
    </script>
@endpush
