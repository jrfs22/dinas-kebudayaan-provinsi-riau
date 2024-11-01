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
                    <th>Penanggung Jawab</th>
                    <th>Jenis Informasi</th>
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
                                {{ $item->responsible_person }}
                                @if ($item->year_of_publication != null)
                                    <b>({{ $item->year_of_publication }})</b>
                                @endif
                            </td>
                            <td style="word-break: break-all;">
                                {{ $item->information_format }}
                            </td>
                            <td style="word-break: break-all;">
                                <a href="{{ route('ppid.files', ['id' => $item->id]) }}">{{ $item->file_summary }}</a>
                            </td>

                        @endif
                        <td class="action-btn d-flex gap-2">
                            <a href="javascript:void(0)" class="text-success edit" data-id="{{ $item->id }}"
                                data-content="{{ $item->content }}"
                                data-name="{{ $item->name }}"
                                data-responsible_person="{{ $item->responsible_person }}"
                                data-year_of_publication="{{ $item->year_of_publication }}"
                                data-information_format="{{ $item->information_format }}"
                                data-storage_duration="{{ $item->storage_duration }}"
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
                <x-forms.input name="name" label="Nama PPID" placeholder="Pelayanan" required=1 />
            </div>
            @if ($ppid_category->type === 'non dokumen')
                <div class="col-12">
                    <x-forms.input name="image_path" label="Gambar" type="file" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.richeditor name="content" label="Konten" required=1>
                    </x-forms.richeditor>
                </div>
            @else
                <div class="col-12">
                    <fieldset>
                        <legend class="fw-bold fs-4 bg-breadcrumb w-auto text-dark">Optional Jika Ada</legend>
                        <div class="row">
                            <div class="col-12">
                                <x-forms.input name="responsible_person" label="Penanggung Jawab Pembuatan Informasi" placeholder="Bidang Sekretariat" />
                            </div>
                            <div class="col-12">
                                <x-forms.input name="year_of_publication" label="Tahun Pembuatan/ Penerbitan Informasi" placeholder="{{ now()->year }}" type="number"/>
                            </div>
                            <div class="col-12">
                                <x-forms.select name="information_format" label="Bentuk Informasi yang Tersedia">
                                    <option value="Soft (Link)">Soft (Link)</option>
                                    <option value="Hard & Soft (Link)">Hard & Soft (Link)</option>
                                </x-forms.select>
                            </div>
                            <div class="col-12">
                                <x-forms.input name="storage_duration" label="Jangka Waktu Penyimpanan" placeholder="Selama berlaku" />
                            </div>
                        </div>
                    </fieldset>
                </div>
            @endif
        </div>
    </x-modal.lg>

    <x-modal.lg id="EditPPID" title="Edit PPID" action="{{ route('ppid.store') }}" isUpdate=1>
        <div class="row">
            @if ($ppid_category->type === 'non dokumen')
                <div class="col-12">
                    <img class="mb-3" src="" id="edtNewImage" width="100%" height="200" style="object-fit:contain;">
                </div>
            @endif
            <div class="col-12">
                <x-forms.input name="name" id="edt_name" label="Nama PPID" placeholder="Pelayanan" required=1/>
            </div>
            @if ($ppid_category->type === 'non dokumen')
                <div class="col-12">
                    <x-forms.input name="image_path" id="edt_image_path" label="Gambar ppid" type="file" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.richeditor name="content" id="edt_content" label="Konten" required=1>
                    </x-forms.richeditor>
                </div>
            @else
                <div class="col-12">
                    <fieldset>
                        <legend class="fw-bold fs-4 bg-breadcrumb w-auto text-dark">Optional Jika Ada</legend>
                        <div class="row">
                            <div class="col-12">
                                <x-forms.input name="responsible_person" id="edt_responsible_person" label="Penanggung Jawab Pembuatan Informasi" placeholder="Bidang Sekretariat" />
                            </div>
                            <div class="col-12">
                                <x-forms.input name="year_of_publication" id="edt_year_of_publication" label="Tahun Pembuatan/ Penerbitan Informasi" placeholder="{{ now()->year }}" type="number"/>
                            </div>
                            <div class="col-12">
                                <x-forms.select name="information_format" id="edt_information_format" label="Bentuk Informasi yang Tersedia">
                                    <option value="Soft (Link)">Soft (Link)</option>
                                    <option value="Hard & Soft (Link)">Hard & Soft (Link)</option>
                                </x-forms.select>
                            </div>
                            <div class="col-12">
                                <x-forms.input name="storage_duration" id="edt_storage_duration" label="Jangka Waktu Penyimpanan" placeholder="Selama berlaku" />
                            </div>
                        </div>
                    </fieldset>
                </div>
            @endif
        </div>
    </x-modal.lg>
@endsection

@push('scripts')
    @if ($ppid_category->type === 'non dokumen')
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

                if (image_path) {
                    $("#edtNewImage").attr("src", "{{ asset('') }}" + "storage/" + image_path)
                }
                $("#EditPPID").modal('show')
            }
        </script>
    @else
        <script>
            function modalEditppid(element) {
                var id = $(element).data('id');
                var name = $(element).data('name');
                var responsible_person = $(element).data('responsible_person');
                var year_of_publication = $(element).data('year_of_publication');
                var information_format = $(element).data('information_format');
                var storage_duration = $(element).data('storage_duration');

                var route = {!! json_encode(route('ppid.update') . '/') !!} + id

                $("#EditPPID form").attr('action', route)
                $("#input-edt_name").val(name)
                $("#input-edt_responsible_person").val(responsible_person)
                $("#input-edt_year_of_publication").val(year_of_publication)
                $("#input-edt_information_format").val(information_format).change();

                $("#input-edt_storage_duration").val(storage_duration)

                $("#EditPPID").modal('show')
            }
        </script>
    @endif
@endpush
