@extends('layouting.auth.main')

@section('title', 'Klasifikasi')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Klasifikasi" route="{{ route('klasifikasi') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Klasifikasi" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <x-search.filter>
                    @foreach ($categories as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </x-search.filter>
                <button data-bs-toggle="modal" data-bs-target="#defaultModal" class="btn btn-primary d-flex align-items-center ms-3">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Klasifikasi
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Kategori</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Total Gambar</th>
                <th>Total Informasi</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($galleries as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->category->name }}
                        </td>
                        <td class="text-capitalize">
                            {{ $item->title }}
                        </td>
                        <td class="w-200px">
                            {{ $item->description }}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary fw-semibold fs-4" href="{{ route('klasifikasi.images', ['id' => $item->id]) }}">
                                {{ $item->images()->count() }}
                                <i class="ti ti-search text-white me-1 fs-4 ms-1"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary fw-semibold fs-4" href="{{ route('klasifikasi.informations', ['id' => $item->id]) }}">
                                {{ $item->informations()->count() }}
                                <i class="ti ti-search text-white me-1 fs-4 ms-1"></i>
                            </a>
                        </td>
                        <td>
                            <div class="action-btn d-flex gap-2">
                                <a href="javascript:void(0)" class="text-success edit" data-id="{{ $item->id }}"
                                    data-title="{{ $item->title }}"
                                    data-description="{{ $item->description }}"
                                    data-klasifikasi_category_id="{{ $item->klasifikasi_category_id }}"
                                    onclick="modalEditKlasifikasi(this)">
                                    <i class="ti ti-pencil fs-5"></i>
                                </a>

                                <x-card.deleted route="{{ route('klasifikasi.destroy', ['id' => $item->id]) }}" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.lg title="Tambah klasifikasi" action="{{ route('klasifikasi.store') }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="title" label="Nama Benda" placeholder="Prasasti" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.textarea name="description" label="Deskripsi Benda" placeholder="Prasasti adalah .." required=1/>
                </div>
                <div class="col-12">
                    <x-forms.select name="klasifikasi_category_id" label="Kategori" required=1>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
            </div>
        </x-modal.lg>

        <x-modal.lg id="Editklasifikasi" title="Edit klasifikasi" action="{{ route('klasifikasi.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="title" id="edt_title" label="Keterangan" placeholder="Penemuan Budaya" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.textarea name="description" id="edt_description" label="Deskripsi Benda" placeholder="Prasasti adalah .." required=1/>
                </div>
                <div class="col-12">
                    <x-forms.select name="klasifikasi_category_id" id="edt_klasifikasi_category_id" label="Kategori" required=1>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
            </div>
        </x-modal.lg>
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditKlasifikasi(element) {
            var id = $(element).data('id');
            var title = $(element).data('title');
            var description = $(element).data('description');
            var klasifikasi_category_id = $(element).data('klasifikasi_category_id');

            var route = {!! json_encode(route('klasifikasi.update') . '/') !!} + id


            $("#Editklasifikasi form").attr('action', route)
            $("#input-edt_title").val(title)
            $("#input-edt_description").val(description)
            $("#edt_klasifikasi_category_id").val(klasifikasi_category_id).change();
            $("#Editklasifikasi").modal('show')
        }
    </script>
@endpush
