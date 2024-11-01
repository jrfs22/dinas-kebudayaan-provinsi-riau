@extends('layouting.auth.main')

@section('title', 'Gallery')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Gallery" route="{{ route('gallery') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Gallery" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                @role('super admin')
                    <x-search.filter>
                        @foreach ($categories as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </x-search.filter>
                @endrole
                @if ($categories->isNotEmpty())
                    <button data-bs-toggle="modal" data-bs-target="#defaultModal" class="btn btn-primary d-flex align-items-center ms-3">
                        <i class="ti ti-plus text-white me-1 fs-5"></i> Gallery
                    </button>
                @endif
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Kategori</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($galleries as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->category?->name }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ indonesianDate($item->date) }}
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit" data-id="{{ $item->id }}"
                                data-date="{{ $item->date }}"
                                data-name="{{ $item->name }}"
                                data-image_path="{{ $item->image_path }}"
                                data-gallery_category_id="{{ $item->gallery_category_id }}"
                                onclick="modalEditGallery(this)">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>

                            <x-card.deleted route="{{ route('gallery.destroy', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.lg title="Tambah Gallery" action="{{ route('gallery.store') }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" label="Keterangan" placeholder="Penemuan Budaya" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.select name="gallery_category_id" label="Kategori" required=1>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-12">
                    <x-forms.input name="image_path" label="Gambar" type="file" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.input name="date" label="Tanggal" type="date" required=1/>
                </div>
            </div>
        </x-modal.lg>

        <x-modal.lg id="EditGallery" title="Edit Gallery" action="{{ route('gallery.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <img class="mb-3" src="" id="edtNewImage" width="100%" height="400" style="object-fit:contain;">
                </div>
                <div class="col-12">
                    <x-forms.input name="name" id="edt_name" label="Keterangan" placeholder="Penemuan Budaya" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.select name="gallery_category_id" id="edt_gallery_category_id" label="Kategori" required=1>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-12">
                    <x-forms.input name="image_path" id="edt_image_path" label="Gambar Gallery" type="file" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.input name="date" id="edt_date" label="Tanggal" type="date" required=1/>
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
            var name = $(element).data('name');
            var date = $(element).data('date');
            var gallery_category_id = $(element).data('gallery_category_id');

            var route = {!! json_encode(route('gallery.update') . '/') !!} + id


            $("#EditGallery form").attr('action', route)
            $("#input-edt_name").val(name)
            $("#edt_gallery_category_id").val(gallery_category_id).change();
            $("#edtNewImage").attr("src", "{{ asset('') }}" + "storage/" + image_path)
            $("#input-edt_date").val(date)

            $("#EditGallery").modal('show')
        }
    </script>
@endpush
