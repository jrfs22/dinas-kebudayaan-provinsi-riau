@extends('layouting.auth.main')

@section('title', 'Survey')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Survey" route="{{ route('survey') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Survey" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <button data-bs-toggle="modal" data-bs-target="#defaultModal" class="btn btn-primary d-flex align-items-center ms-3">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Survey
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Judul</th>
                <th>Ringkasan</th>
                <th>Jumlah Pertanyaan</th>
                <th>Jumlah Respon</th>
                <th>Status</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($surveys as $item)
                    <tr class="search-items">
                        <td class="w-200px">
                            <h6>{{ $item->title }}</h6>
                            <p>
                                {{ indonesianDate($item->start_date) }} - {{ indonesianDate($item->end_date) }}
                            </p>
                        </td>
                        <td class="w-200px">
                            {{ $item->slug }}
                        </td>
                        <td>
                            <a href="{{ route('survey.questions', ['id' => $item->id]) }}" class="btn btn-info btn-sm">Detail <b>{{ $item->questions()->count() }}</b></a>
                        </td>
                        <td>
                            <a href="" class="btn btn-info btn-sm">Detail <b>{{ $item->responses()->count() }}</b></a>
                        </td>
                        <td>
                            <span class="badge {{ surveyStatus($item->status, 'bg') }}">{{ surveyStatus($item->status, 'status') }}</span>
                        </td>
                        <td>
                            <div class="action-btn d-flex gap-2">
                                <a href="javascript:void(0)" class="text-success edit"
                                    data-id="{{ $item->id }}"
                                    data-title="{{ $item->title }}"
                                    data-slug="{{ $item->slug }}"
                                    data-content="{{ $item->content }}"
                                    data-start_date="{{ $item->start_date }}"
                                    data-end_date="{{ $item->end_date }}"
                                    data-status="{{ $item->status }}"
                                    onclick="modalEditSurvey(this)">
                                    <i class="ti ti-pencil fs-5"></i>
                                </a>
                                <x-card.deleted route="{{ route('survey.destroy', ['id' => $item->id]) }}" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>

    <x-modal.lg title="Tambah Survey Baru" action="{{ route('survey.store') }}">
        <div class="row">
            <div class="col-12">
                <x-forms.input name="title" label="Judul Survey" placeholder="Survey Kepuasan" />
            </div>
            <div class="col-12">
                <x-forms.input name="slug" label="Ringkasan Survey" placeholder="Survey Kepuasan" />
            </div>
            <div class="col-12">
                <x-forms.richeditor name="content" label="Detail Survey" required=1>
                </x-forms.richeditor>
            </div>
            <div class="col-12 col-lg-6">
                <x-forms.input name="start_date" label="Tanggal Mulai" type="datetime-local" />
            </div>
            <div class="col-12 col-lg-6">
                <x-forms.input name="end_date" label="Tanggal Berakhir" type="datetime-local" />
            </div>
            <div class="col-12">
                <x-forms.select name="status" label="Status">
                    <option value="inactive">Tidak Aktif</option>
                    <option value="active">Aktif</option>
                    <option value="completed">Selesai</option>
                </x-forms.select>
            </div>
        </div>
    </x-modal.lg>

    <x-modal.lg id="EditSurvey" title="Tambah Survey Baru" action="{{ route('gallery.store') }}" isUpdate=1>
        <div class="row">
            <div class="col-12">
                <x-forms.input name="title" id="edt_title" label="Judul Survey" placeholder="Survey Kepuasan" />
            </div>
            <div class="col-12">
                <x-forms.input name="slug" id="edt_slug" label="Ringkasan Survey" placeholder="Survey Kepuasan" />
            </div>
            <div class="col-12">
                <x-forms.richeditor name="content" id="edt_content" label="Detail Survey" required=1>
                </x-forms.richeditor>
            </div>
            <div class="col-12 col-lg-6">
                <x-forms.input name="start_date" id="edt_start_date" label="Tanggal Mulai" type="datetime-local" />
            </div>
            <div class="col-12 col-lg-6">
                <x-forms.input name="end_date" id="edt_end_date"  label="Tanggal Berakhir" type="datetime-local" />
            </div>
            <div class="col-12">
                <x-forms.select name="status" id="edt_status" label="Status">
                    <option value="inactive">Tidak Aktif</option>
                    <option value="active">Aktif</option>
                    <option value="completed">Selesai</option>
                </x-forms.select>
            </div>
        </div>
    </x-modal.lg>
@endsection

@push('scripts')
    <script>
        function modalEditSurvey(element) {
            var id = $(element).data('id');
            var title = $(element).data('title');
            var slug = $(element).data('slug');
            var content = $(element).data('content');
            var start_date = $(element).data('start_date');
            var end_date = $(element).data('end_date');
            var status = $(element).data('status');

            var route = {!! json_encode(route('survey.update') . '/') !!} + id

            $("#EditSurvey form").attr('action', route)
            $("#input-edt_title").val(title)
            $("#input-edt_slug").val(slug)
            $("#input-edt_start_date").val(start_date)
            $("#input-edt_end_date").val(end_date)
            $("#edt_status").val(status).change()

            edt_content.root.innerHTML = content

            $("#EditSurvey").modal('show')
        }
    </script>
@endpush
