@extends('layouting.auth.main')

@section('title', $ppid_category->name)

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="{{ $ppid_category->name }}" route="{{ route('ppid', ['id' =>  $ppid_category->id]) }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="PPID" />
            </div>
                <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <button data-bs-toggle="modal" data-bs-target="#defaultModal" class="btn btn-primary d-flex align-items-center ms-3">
                        <i class="ti ti-plus text-white me-1 fs-5"></i> PPID
                    </button>
                </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Keterangan</th>
                @if ($ppid_category->type == 'dokumen')
                <th>Jumlah File</th>
                @endif
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($ppid as $item)
                    <tr class="search-items">
                        <td style="word-break: break-all;">
                            {{ $item->name }}
                        </td>
                        @if ($ppid_category->type == 'dokumen')
                            <td style="word-break: break-all;">
                                <a href="{{ route('ppid.files', ['id' => $item->id]) }}">{{ $item->file_summary }}</a>
                            </td>
                        @endif
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit" data-id="{{ $item->id }}"
                                data-content="{{ $item->content }}"
                                data-name="{{ $item->name }}"
                                data-image_path="{{ $item->image_path ?? '' }}"
                                data-ppid_category_id="{{ $item->ppid_category_id }}"
                                onclick="modalEditppid(this)">
                                <i class="ti ti-pencil fs-5"></i>
                            </a>

                            <x-card.deleted route="{{ route('ppid.destroy', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>

    <x-modal.lg title="Tambah PPID" action="{{ route('ppid.store') }}">
        <div class="row">
            <input type="hidden" name="ppid_category_id" value="{{ $ppid_category->id }}">
            <div class="col-12">
                <x-forms.input name="name" label="Nama PPID" placeholder="Pelayanan" />
            </div>
            @if ($ppid_category->type === 'non dokumen')
                <div class="col-12">
                    <x-forms.input name="image_path" label="Gambar" type="file" />
                </div>
                <div class="col-12">
                    <x-forms.richeditor name="content" label="Konten">
                    </x-forms.richeditor>
                </div>
            @endif
        </div>
    </x-modal.lg>

    <x-modal.lg id="EditPPID" title="Edit PPID" action="{{ route('ppid.store') }}" isUpdate=1>
        <div class="row">
            <div class="col-12">
                <img class="mb-3" src="" id="edtNewImage" width="100%" height="400" style="object-fit:contain;">
            </div>
            <div class="col-12">
                <x-forms.input name="name" id="edt_name" label="Nama PPID" placeholder="Pelayanan" />
            </div>
            <div class="col-12">
                <x-forms.input name="image_path" id="edt_image_path" label="Gambar ppid" type="file" />
            </div>
            <div class="col-12">
                <x-forms.richeditor name="content" id="edt_content" label="Konten">
                </x-forms.richeditor>
            </div>
        </div>
    </x-modal.lg>
@endsection

@push('scripts')
    <script>
        function modalEditppid(element) {
            var id = $(element).data('id');
            var image_path = $(element).data('image_path');
            var name = $(element).data('name');
            var content = $(element).data('content');
            var ppid_category_id = $(element).data('ppid_category_id');

            var route = {!! json_encode(route('ppid.update') . '/') !!} + id

            $("#EditPPID form").attr('action', route)
            $("#input-edt_name").val(name)
            edt_content.root.innerHTML = content;
            $("#hidden-edt_content").val(content)
            $("#edt_ppid_category_id").val(ppid_category_id).change();

            if (image_path) {
                $("#edtNewImage").attr("src", "{{ asset('') }}" + "storage/" + image_path)
            }
            $("#EditPPID").modal('show')
        }
    </script>
@endpush
