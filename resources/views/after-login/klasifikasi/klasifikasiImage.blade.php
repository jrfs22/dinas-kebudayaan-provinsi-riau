@extends('layouting.auth.main')

@section('title', 'Detail Informasi ' . $klasifikasi->title)

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Detail Informasi {{ $klasifikasi->title }}" route="{{ route('klasifikasi') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <button data-bs-toggle="modal" data-bs-target="#defaultModal"
                    class="btn btn-primary d-flex align-items-center ms-3">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Gambar
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Gambar</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($klasifikasi->images as $item)
                    <tr class="search-items">
                        <td class="w-200px">
                            <img class="object-fit-contain" src="{{ asset('storage/' . $item->image_path) }}" alt="Gambar {{ $item->title }}" width="150" height="50">
                        </td>
                        <td class="action-btn">
                            <div class="d-flex gap-2">
                                <a href="javascript:void(0)" class="text-success edit"
                                    data-id="{{ $item->id }}"
                                    data-image_path="{{ $item->image_path }}" onclick="modalEditGambarKlasifikasi(this)">
                                    <i class="ti ti-pencil fs-5"></i>
                                </a>

                                <x-card.deleted route="{{ route('klasifikasi.informations.destroy', ['id' => $item->id]) }}" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.lg title="Tambah Gambar" action="{{ route('klasifikasi.informations.post', ['id' => $klasifikasi->id]) }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="image_path" label="Gambar" type="file"
                    fileLabel="Maksimal 4 Mb" required=1 />
                </div>
            </div>
        </x-modal.lg>

        <x-modal.lg id="EditGambarKlasifikasi" title="Edit Gambar" action="{{ route('klasifikasi.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <img class="mb-3" src="" id="edtNewImage" width="100%" height="400"
                        style="object-fit:contain;">
                </div>
                <div class="col-12">
                    <x-forms.input name="image_path" id="edt_image_path" label="Gambar Gallery" type="file" />
                </div>
            </div>
        </x-modal.lg>
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditGambarKlasifikasi(element) {
            var id = $(element).data('id');
            var image_path = $(element).data('image_path');

            var route = {!! json_encode(route('klasifikasi.informations.update') . '/') !!} + id

            $("#EditGambarKlasifikasi form").attr('action', route)
            $("#EditGambarKlasifikasi").modal('show')
            $("#edtNewImage").attr("src", "{{ asset('') }}" + "storage/" + image_path)
        }
    </script>
@endpush
