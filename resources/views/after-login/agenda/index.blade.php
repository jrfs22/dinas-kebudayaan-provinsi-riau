@extends('layouting.auth.main')

@section('title', 'Agenda')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Agenda" route="{{ route('agenda') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Agenda" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <x-search.filter>
                    @foreach ($categories as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </x-search.filter>
                <a href="{{ route('agenda.create') }}" class="btn btn-primary d-flex align-items-center ms-3">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Agenda
                </a>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Kategori</th>
                <th>Judul</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($agenda as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->category?->name }}
                        </td>
                        <td class="w-200px">
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->location }}
                        </td>
                        <td>
                            {{ indonesianDate($item->date) }}
                        </td>
                        <td >
                            <div class="action-btn d-flex gap-2">
                                <a href="{{ route('agenda.edit', ['id' => $item->id]) }}" class="text-success edit" >
                                    <i class="ti ti-pencil fs-5"></i>
                                </a>

                                <x-card.deleted route="{{ route('agenda.destroy', ['id' => $item->id]) }}" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.lg title="Tambah agenda" action="{{ route('agenda.store') }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" label="Keterangan" placeholder="Penemuan Budaya" />
                </div>
                <div class="col-12">
                    <x-forms.input name="location" label="Lokasi" placeholder="Hotel Pangeran" />
                </div>
                <div class="col-12">
                    <x-forms.select name="agenda_category_id" label="Kategori">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-12">
                    <x-forms.input name="image_path" label="Gambar" type="file" />
                </div>
                <div class="col-12">
                    <x-forms.input name="date" label="Tanggal" type="date" />
                </div>
            </div>
        </x-modal.lg>

        <x-modal.lg id="Editagenda" title="Edit agenda" action="{{ route('agenda.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <img class="mb-3" src="" id="edtNewImage" width="100%" height="400" style="object-fit:contain;">
                </div>
                <div class="col-12">
                    <x-forms.input name="name" id="edt_name" label="Keterangan" placeholder="Penemuan Budaya" />
                </div>
                <div class="col-12">
                    <x-forms.input name="location" id="edt_location" label="Lokasi" placeholder="Hotel Pangeran" />
                </div>
                <div class="col-12">
                    <x-forms.select name="agenda_category_id" id="edt_agenda_category_id" label="Kategori">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-12">
                    <x-forms.input name="image_path" id="edt_image_path" label="Gambar agenda" type="file" />
                </div>
                <div class="col-12">
                    <x-forms.input name="date" id="edt_date" label="Tanggal" type="date" />
                </div>
            </div>
        </x-modal.lg>
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditagenda(element) {
            var id = $(element).data('id');
            var image_path = $(element).data('image_path');
            var name = $(element).data('name');
            var location = $(element).data('location');
            var date = $(element).data('date');
            var agenda_category_id = $(element).data('agenda_category_id');

            var route = {!! json_encode(route('agenda.update') . '/') !!} + id


            $("#Editagenda form").attr('action', route)
            $("#input-edt_name").val(name)
            $("#input-edt_location").val(location)
            $("#edt_agenda_category_id").val(agenda_category_id).change();
            $("#edtNewImage").attr("src", "{{ asset('') }}" + "storage/" + image_path)
            $("#input-edt_date").val(date)

            $("#Editagenda").modal('show')
        }
    </script>
@endpush
