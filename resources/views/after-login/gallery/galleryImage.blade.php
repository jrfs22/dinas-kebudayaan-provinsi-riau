@extends('layouting.auth.main')

@section('title', 'Dokumentasi ' . $gallery->title)

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Dokumentasi {{ $gallery->title }}" route="{{ route('gallery') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Dokumentasi" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <button data-bs-toggle="modal" data-bs-target="#defaultModal"
                    class="btn btn-primary d-flex align-items-center ms-3">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Dokumentasi
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($gallery->images as $item)
                    <tr class="search-items">
                        <td class="text-capitalize">
                            {{ $item->title }}
                        </td>
                        <td class="w-200px">
                            {{ $item->description }}
                        </td>
                        <td class="w-200px">
                            <img class="object-fit-contain" src="{{ asset('storage/' . $item->image_path) }}" alt="Gambar {{ $item->title }}" width="150" height="50">
                        </td>
                        <td class="action-btn">
                            <div class="d-flex gap-2">
                                <a href="javascript:void(0)" class="text-success edit"
                                    data-id="{{ $item->id }}"
                                    data-description="{{ $item->description }}"
                                    data-title="{{ $item->title }}"
                                    data-image_path="{{ $item->image_path }}" onclick="modalEditGallery(this)">
                                    <i class="ti ti-pencil fs-5"></i>
                                </a>

                                <x-card.deleted route="{{ route('gallery.images.destroy', ['id' => $item->id]) }}" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.lg title="Tambah Dokumentasi" action="{{ route('gallery.images.post', ['id' => $gallery->id]) }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="title" label="Keterangan" placeholder="Pembukaan Kegiatan" required=1 />
                </div>
                <div class="col-12">
                    <x-forms.textarea name="description" label="Deskripsi" placeholder="Pembukaan dibuka oleh gubernur Riau" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.input name="image_path" label="Gambar" type="file"
                    fileLabel="Maksimal 4 Mb" required=1 />
                </div>
            </div>
        </x-modal.lg>

        <x-modal.lg id="EditGallery" title="Edit Dokumentasi" action="{{ route('gallery.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <img class="mb-3" src="" id="edtNewImage" width="100%" height="400"
                        style="object-fit:contain;">
                </div>
                <div class="col-12">
                    <x-forms.input name="title" id="edt_title" label="Keterangan" placeholder="Pembukaan Kegiatan"
                        required=1 />
                </div>
                <div class="col-12">
                    <x-forms.textarea name="description" id="edt_description" label="Deskripsi" placeholder="Pembukaan dibuka oleh gubernur Riau" required=1/>
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
        function modalEditGallery(element) {
            var id = $(element).data('id');
            var image_path = $(element).data('image_path');
            var title = $(element).data('title');
            var description = $(element).data('description');

            var route = {!! json_encode(route('gallery.images.update') . '/') !!} + id


            $("#EditGallery form").attr('action', route)
            $("#input-edt_title").val(title)
            $("#edtNewImage").attr("src", "{{ asset('') }}" + "storage/" + image_path)
            $("#input-edt_description").val(description)

            $("#EditGallery").modal('show')
        }
    </script>
@endpush
