@extends('layouting.auth.main')

@section('title', 'Kategori Berita')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Kategori Berita" route="{{ route('news.category') }}" />
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
                <th>Departement Penanggung Jawab</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($categories as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->departement->name }}
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit" data-id="{{ $item->id }}"
                                data-name="{{ $item->name }}"
                                data-departement_id="{{ $item->departement_id }}"
                                onclick="modalEditNews(this)">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>

                            <x-card.deleted route="{{ route('news.category.destroy', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.basic title="Tambah Kategori" action="{{ route('news.category.store') }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" label="Nama Kategori" placeholder="Nama Kategori" required=1/>
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

        <x-modal.basic id="EditNews" title="Edit News" action="{{ route('news.category.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" id="edt_name" label="Nama Kategori" placeholder="Nama Kategori" required=1/>
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
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditNews(element) {
            var id = $(element).data('id');
            var name = $(element).data('name');
            var departement_id = $(element).data('departement_id');

            var route = {!! json_encode(route('news.category.update') . '/') !!} + id

            $("#EditNews form").attr('action', route)
            $("#input-edt_name").val(name)
            $("#edtDepartement").val(departement_id).change()

            $("#EditNews").modal('show')
        }
    </script>
@endpush
