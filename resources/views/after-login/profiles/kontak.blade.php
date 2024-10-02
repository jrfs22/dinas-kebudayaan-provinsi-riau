@extends('layouting.auth.main')

@section('title', 'Kontak')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Kontak" route="{{ route('profiles', ['type' => 'kontak']) }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Kontak" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <button class="btn btn-primary d-flex align-items-center ms-3" data-bs-toggle="modal"
                    data-bs-target="#defaultModal">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Kontak
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Kontak</th>
                <th>Status</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($content as $item)
                    <tr class="search-items">
                        <td>
                            <a href="{{ $item->url_path }}">{{ $item->content }}</a>
                        </td>
                        <td>
                            <span class="badge text-capitalize {{ $item->status == 'draft' ? 'bg-danger' : 'bg-success' }}">{{ $item->status }}</span>
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit"
                                data-id="{{ $item->id }}"
                                data-url_path="{{ $item->url_path }}"
                                data-status="{{ $item->status }}"
                                data-content="{{ $item->content }}"

                                onclick="modalEditKontak(this)"
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

        <x-modal.basic title="Tambah Kontak" action="{{ route('profiles.store', ['type' => 'kontak']) }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input
                        name="content"
                        label="Kontak"
                        placeholder="08121212...."
                    />
                </div>
                <div class="col-12">
                    <x-forms.input
                        name="url_path"
                        label="Url"
                        placeholder="https://wa.me/628121212"
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
        </x-modal.basic>

        <x-modal.basic id="editKontak" title="Edit Kontak" action="{{ route('profiles.store', ['type' => 'kontak']) }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <x-forms.input
                        name="content"
                        label="Kontak"
                        id="edt_content"
                        placeholder="08121212...."
                    />
                </div>
                <div class="col-12">
                    <x-forms.input
                        name="url_path"
                        label="Url"
                        id="edt_url"
                        placeholder="https://wa.me/628121212"
                    />
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
        </x-modal.basic>
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditKontak(element) {
            var id = $(element).data('id');
            var url_path = $(element).data('url_path');
            var content = $(element).data('content');
            var status = $(element).data('status');

            var route = {!! json_encode(route('profiles.update') . '/') !!} + id


            $("#editKontak form").attr('action', route)
            $("#input-edt_content").val(content)
            $("#input-edt_url").val(url_path)
            $("#edt_status").val(status)

            $("#editKontak").modal('show')
        }
    </script>
@endpush
