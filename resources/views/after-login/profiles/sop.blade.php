@extends('layouting.auth.main')

@section('title', 'Standard Operating Procedure')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="SOP" route="{{ route('profiles', ['type' => 'sop']) }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="SOP" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <button class="btn btn-primary d-flex align-items-center ms-3" data-bs-toggle="modal"
                    data-bs-target="#defaultModal">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> SOP
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Gambar</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($content as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->title }}
                        </td>
                        <td class="text-capitalize">
                            {{ $item->category }}
                        </td>
                        <td>
                            <span class="badge text-capitalize {{ $item->status == 'draft' ? 'bg-danger' : 'bg-success' }}">{{ $item->status }}</span>
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit"
                                data-id="{{ $item->id }}"
                                data-content="{{ $item->content }}"
                                data-image_path="{{ $item->image_path }}"
                                data-status="{{ $item->status }}"
                                data-title="{{ $item->title }}"

                                onclick="modalEditsop(this)"
                            >
                                <i class="ti ti-pencil fs-5"></i>
                            </a>

                            <x-card.deleted
                                    route="{{ route('profiles.destroy', ['id'=>$item->id]) }}"
                                />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.lg title="Tambah SOP" action="{{ route('profiles.store', ['type' => 'sop']) }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="title" label="Nama SOP" placeholder="K3" />
                </div>
                <div class="col-12">
                    <x-forms.richeditor
                        name="content" label="Detail SOP">
                    </x-forms.richeditor>
                </div>
                <div class="col-12">
                    <x-forms.input
                        name="image_path"
                        label="Gambar"
                        type="file"
                    />
                </div>
                <div class="col-12">
                    <x-forms.select
                        name="status"
                        label="Status">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </x-forms.select>
                </div>
            </div>
        </x-modal.lg>

        <x-modal.lg id="editsop" title="Edit SOP" action="{{ route('profiles.store', ['type' => 'sop']) }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <img class="mb-3" src="" id="edtNewImage" width="100%" height="400" style="object-fit:contain;">
                </div>
                <div class="col-12">
                    <x-forms.input name="name" id="edt_title" label="Nama SOP" placeholder="K3" />
                </div>
                <div class="col-12">
                    <x-forms.input
                        name="image_path"
                        label="Gambar"
                        type="file"
                    />
                </div>
                <div class="col-12">
                    <x-forms.richeditor
                        name="content" id="edt_content" label="Detail SOP">
                    </x-forms.richeditor>
                </div>
                <div class="col-12">
                    <x-forms.select
                        name="status"
                        id="edt_status"
                        label="Status">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </x-forms.select>
                </div>
            </div>
        </x-modal.lg>
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditsop(element) {
            var id = $(element).data('id');
            var image_path = $(element).data('image_path');
            var title = $(element).data('title');
            var content = $(element).data('content');
            var status = $(element).data('status');

            var route = {!! json_encode(route('profiles.update') . '/') !!} + id


            $("#editsop form").attr('action', route)
            $("#input-edt_title").val(title)
            $("#edt_status").val(status)

            $("#editsop").modal('show')
            $("#edtNewImage").attr("src", "{{ asset('') }}" + "storage/" + image_path)

            edt_content.root.innerHTML = content;
        }
    </script>
@endpush
