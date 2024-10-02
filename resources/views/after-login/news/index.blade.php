@extends('layouting.auth.main')

@section('title', 'News')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="News" route="{{ route('news') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="News" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <button class="btn btn-primary d-flex align-items-center ms-3" data-bs-toggle="modal"
                    data-bs-target="#defaultModal">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> News
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Judul</th>
                <th>Slug</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($news as $item)
                    <tr class="search-items">
                        <td>
                            {{ $item->title }}
                        </td>
                        <td>
                            {{ $item->slug }}
                        </td>
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit"
                                data-id="{{ $item->id }}"
                                data-date="{{ $item->date }}"
                                data-title="{{ $item->title }}"
                                data-slug="{{ $item->slug }}"
                                data-image_path="{{ $item->image_path }}"
                                data-content="{{ $item->content }}"

                                onclick="modalEditNews(this)"
                            >
                                <i class="ti ti-pencil fs-5"></i>
                            </a>

                            <x-card.deleted
                                    route="{{ route('news.destroy', ['id'=>$item->id]) }}"
                                />
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>

        <x-modal.lg title="Tambah Kontak" action="{{ route('news.store') }}">
            <div class="row">
                <div class="col-12">
                    <x-forms.input
                        name="title"
                        label="Judul"
                        placeholder="Penemuan Budaya"
                    />
                </div>
                <div class="col-12">
                    <x-forms.input
                        name="slug"
                        label="Ringkasan Berita"
                        placeholder="Penemuan Budaya Baru"
                    />
                </div>
                <div class="col-12">
                    <x-forms.input
                        name="image_path"
                        label="Gambar Berita"
                        type="file"
                    />
                </div>
                <div class="col-12">
                    <x-forms.input
                        name="date"
                        label="Tanggal"
                        type="date"
                    />
                </div>
                <div class="col-12">
                    <x-forms.richeditor
                        name="content" label="Konten Berita">
                    </x-forms.richeditor>
                </div>
            </div>
        </x-modal.lg>

        <x-modal.lg id="EditNews" title="Edit News" action="{{ route('news.store') }}" isUpdate=1>
            <div class="row">
                <div class="col-12">
                    <img class="img-fluid mb-3" src="" id="edtNewImage" alt="">
                </div>
                <div class="col-12">
                    <x-forms.input
                        name="title"
                        id="edt_title"
                        label="Judul"
                        placeholder="Penemuan Budaya"
                    />
                </div>
                <div class="col-12">
                    <x-forms.input
                        name="slug"
                        id="edt_slug"
                        label="Ringkasan Berita"
                        placeholder="Penemuan Budaya Baru"
                    />
                </div>
                <div class="col-12">
                    <x-forms.input
                        name="image_path"
                        id="edt_image_path"
                        label="Gambar Berita"
                        type="file"
                    />
                </div>
                <div class="col-12">
                    <x-forms.input
                        name="date"
                        id="edt_date"
                        label="Tanggal"
                        type="date"
                    />
                </div>
                <div class="col-12">
                    <x-forms.richeditor
                        name="content" id="edt_content" label="Konten Berita">
                    </x-forms.richeditor>
                </div>
            </div>
        </x-modal.lg>
    </div>

@endsection

@push('scripts')
    <script>
        function modalEditNews(element) {
            var id = $(element).data('id');
            var image_path = $(element).data('image_path');
            var slug = $(element).data('slug');
            var title = $(element).data('title');
            var date = $(element).data('date');
            var content = $(element).data('content');

            var route = {!! json_encode(route('news.update') . '/') !!} + id


            $("#EditNews form").attr('action', route)
            $("#input-edt_title").val(title)
            $("#edtNewImage").attr("src", "{{ asset('') }}"+"storage/"+image_path)
            $("#input-edt_slug").val(slug)
            $("#input-edt_date").val(date)
            $("#hidden-edt_content").val(content)
            $("#editor-edt_content").html(content)

            edt_content.root.innerHTML = content

            $("#EditNews").modal('show')
        }
    </script>
@endpush
