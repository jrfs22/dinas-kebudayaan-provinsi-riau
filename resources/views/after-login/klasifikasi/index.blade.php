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
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($galleries as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->category->name }}
                        </td>
                        <td class="text-capitalize">
                            {{ $item->name }}
                        </td>
                        <td class="text-capitalize">
                            {{ $item->jenis }}
                        </td>
                        <td>
                            {{ $item->total }}
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit" data-id="{{ $item->id }}"
                                data-total="{{ $item->total }}"
                                data-jenis="{{ $item->jenis }}"
                                data-name="{{ $item->name }}"
                                data-image_path="{{ $item->image_path }}"
                                data-klasifikasi_category_id="{{ $item->klasifikasi_category_id }}"
                                onclick="modalEditKlasifikasi(this)">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>

                            <x-card.deleted route="{{ route('klasifikasi.destroy', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.lg title="Tambah klasifikasi" action="{{ route('klasifikasi.store') }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" label="Nama Benda" placeholder="Prasasti" />
                </div>
                <div class="col-12">
                    <x-forms.select name="jenis" label="Jenis">
                        <option value="benda">Benda</option>
                        <option value="dokumen">Dokumen</option>
                        <option value="prasasti">Prasasti</option>
                    </x-forms.select>
                </div>
                <div class="col-12">
                    <x-forms.select name="klasifikasi_category_id" label="Kategori">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-12">
                    <x-forms.input name="image_path" label="Gambar" type="file" />
                </div>
                <div class="col-12">
                    <x-forms.input name="total" label="Jumlah" type="number" />
                </div>
            </div>
        </x-modal.lg>

        <x-modal.lg id="Editklasifikasi" title="Edit klasifikasi" action="{{ route('klasifikasi.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <img class="mb-3" src="" id="edtNewImage" width="100%" height="400" style="object-fit:contain;">
                </div>
                <div class="col-12">
                    <x-forms.input name="name" id="edt_name" label="Keterangan" placeholder="Penemuan Budaya" />
                </div>
                <div class="col-12">
                    <x-forms.select name="jenis" id="edt_jenis" label="Jenis">
                        <option value="benda">Benda</option>
                        <option value="dokumen">Dokumen</option>
                        <option value="prasasti">Prasasti</option>
                    </x-forms.select>
                </div>
                <div class="col-12">
                    <x-forms.select name="klasifikasi_category_id" id="edt_klasifikasi_category_id" label="Kategori">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-12">
                    <x-forms.input name="image_path" id="edt_image_path" label="Gambar klasifikasi" type="file" />
                </div>
                <div class="col-12">
                    <x-forms.input name="total" id="edt_total" label="Jumlah" type="number" />
                </div>
            </div>
        </x-modal.lg>
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditKlasifikasi(element) {
            var id = $(element).data('id');
            var image_path = $(element).data('image_path');
            var name = $(element).data('name');
            var total = $(element).data('total');
            var klasifikasi_category_id = $(element).data('klasifikasi_category_id');
            var edt_jenis = $(element).data('edt_jenis');

            var route = {!! json_encode(route('klasifikasi.update') . '/') !!} + id


            $("#Editklasifikasi form").attr('action', route)
            $("#input-edt_name").val(name)
            $("#edt_klasifikasi_category_id").val(klasifikasi_category_id).change();
            $("#edt_edt_jenis").val(edt_jenis).change();
            $("#edtNewImage").attr("src", "{{ asset('') }}" + "storage/" + image_path)
            $("#input-edt_total").val(total)

            $("#Editklasifikasi").modal('show')
        }
    </script>
@endpush
