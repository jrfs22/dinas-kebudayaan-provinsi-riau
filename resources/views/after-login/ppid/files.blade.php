@extends('layouting.auth.main')

@section('title', 'PPID Files')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="PPID Files" route="" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="PPID" />
            </div>
                <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <button data-bs-toggle="modal" data-bs-target="#defaultModal" class="btn btn-primary d-flex align-items-center ms-3">
                        <i class="ti ti-plus text-white me-1 fs-5"></i> File
                    </button>
                </div>
        </div>
    </div>

    <div class="card card-body">
        <h4>{{ $ppid->name }}</h4>
        <table>
            <thead>
                <th>Penanggung Jawab</th>
                <th>Pembuatan/ Penerbitan Informasi</th>
                <th>Bentuk Informasi yang Tersedia</th>
                <th>Jangka Waktu Penyimpanan</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $ppid->responsible_person }}
                    </td>
                    <td>
                        {{ $ppid->year_of_publication }}
                    </td>
                    <td>
                        {{ $ppid->information_format }}
                    </td>
                    <td>
                        {{ $ppid->storage_duration }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Nama File</th>
                <th>Nomor File</th>
                <th>PPID</th>
                <th>Tanggal Rilis</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($files as $item)
                    <tr class="search-items">
                        <td style="word-break: break-all;">
                            <a target="_blank" href="{{ asset('storage/' . $item->file_path) }}">{{ $item->file_name }}</a>
                        </td>
                        <td>
                            {{ $item->file_name }}
                        </td>
                        <td>
                            {{ $item->file_name }}
                        </td>
                        <td>
                            {{ indonesianDate($item->release_date) }}
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit"
                                data-id="{{ $item->id }}"
                                data-file_name="{{ $item->file_name }}"
                                data-file_number="{{ $item->file_number }}"
                                data-release_date="{{ $item->release_date }}"
                                onclick="modalEditppid(this)">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>

                            <x-card.deleted route="{{ route('ppid.files.destroy', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>

    <x-modal.lg title="Tambah PPID" action="{{ route('ppid.files.store') }}">
        <div class="row">
            <input type="hidden" name="ppid_id" value="{{ $id }}">
            <div class="col-12">
                <x-forms.input name="file_name" label="Nama File" placeholder="Laporan Akuntabilitas Kinerja Akuntansi Pemerintah (LAKIP) - Tahun 2014" />
            </div>
            <div class="col-12">
                <x-forms.input name="file_number" label="Nomor Surat" placeholder="No 12" />
            </div>
            <div class="col-12">
                <x-forms.input name="file_path" type="file" label="File" fileLabel="Maksimal 5mb"/>
            </div>
            <div class="col-12">
                <x-forms.input name="release_date" type="date" label="Tanggal" />
            </div>
        </div>
    </x-modal.lg>

    <x-modal.lg id="EditPPID" title="Edit PPID File" action="{{ route('ppid.files.store') }}" isUpdate=1>
        <div class="row">
            <input type="hidden" name="ppid_id" value="{{ $id }}">
            <div class="col-12">
                <x-forms.input name="file_name" id="edt_file_name" label="Nama File" placeholder="Laporan Akuntabilitas Kinerja Akuntansi Pemerintah (LAKIP) - Tahun 2014" />
            </div>
            <div class="col-12">
                <x-forms.input name="file_number" id="edt_file_number" label="Nomor Surat" placeholder="No 12" />
            </div>
            <div class="col-12">
                <x-forms.input name="file_path" type="file" label="File" fileLabel="Maksimal 5mb"/>
            </div>
            <div class="col-12">
                <x-forms.input name="release_date" type="date" id="edt_release_date" label="Tanggal" />
            </div>
        </div>
    </x-modal.lg>
@endsection

@push('scripts')
    <script>
        function modalEditppid(element) {
            var id = $(element).data('id');
            var file_name = $(element).data('file_name');
            var file_number = $(element).data('file_number');
            var release_date = $(element).data('release_date');

            var route = {!! json_encode(route('ppid.files.update') . '/') !!} + id

            $("#EditPPID form").attr('action', route)

            $("#input-edt_file_name").val(file_name)
            $("#input-edt_file_number").val(file_number)
            $("#input-edt_release_date").val(release_date)

            $("#EditPPID").modal('show')
        }
    </script>
@endpush
