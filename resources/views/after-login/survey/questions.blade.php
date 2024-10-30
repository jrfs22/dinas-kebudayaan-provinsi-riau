@extends('layouting.auth.main')

@section('title', 'Pertanyaan')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Pertanyaan" route="{{ route('survey') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Pertanyaan" />
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <button data-bs-toggle="modal" data-bs-target="#defaultModal"
                    class="btn btn-primary d-flex align-items-center ms-3">
                    <i class="ti ti-plus text-white me-1 fs-5"></i> Pertanyaan
                </button>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <h5>{{ $survey->title }}</h5>
        <p>{{ $survey->slug }}</p>
        <table>
            <thead>
                <th class="text-center">Jumlah Pertanyaan</th>
                <th class="text-center">Jumlah Reponden</th>
                <th class="text-center">Waktu Selesai</th>
                <th class="text-center">Status</th>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">
                        {{ $survey->questions()->count() }}
                    </td>
                    <td class="text-center">
                        {{ $survey->responses()->count() }}
                    </td>
                    <td class="text-center">
                        {{ indonesianDate($survey->start_date) }} - {{ indonesianDate($survey->end_date) }}
                    </td>
                    <td class="text-center">
                        <span
                            class="badge {{ surveyStatus($survey->status, 'bg') }}">{{ surveyStatus($survey->status, 'status') }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card card-body">
        <x-table.basic>
            @slot('slotHead')
                <th>Pertanyaan</th>
                <th>Tipe Pertanyaan</th>
                <th>Opsi</th>
                <th>Aksi</th>
            @endslot

            @slot('slotBody')
                @foreach ($survey->questions as $item)
                    <tr class="search-items">
                        <td class="w-200px">
                            {!! $item->question_text !!}
                        </td>
                        <td class="text-capitalize">
                            {{ $item->question_type }}
                        </td>
                        <td>
                            @if ($item->question_type != 'text')
                                {{ $item->options }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="action-btn d-flex gap-2">
                                <a href="javascript:void(0)" class="text-success edit" data-id="{{ $item->id }}"
                                    data-title="{{ $item->title }}" data-slug="{{ $item->slug }}"
                                    data-content="{{ $item->content }}" data-start_date="{{ $item->start_date }}"
                                    data-end_date="{{ $item->end_date }}" data-status="{{ $item->status }}"
                                    onclick="modalEditSurvey(this)">
                                    <i class="ti ti-pencil fs-5"></i>
                                </a>
                                <x-card.deleted route="{{ route('survey.questions.destroy', ['id' => $item->id]) }}" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>

    <x-modal.lg title="Tambah Pertanyaan Baru" action="{{ route('survey.questions.store') }}">
        <div class="row">
            <input type="hidden" name="survey_id" value="{{ $survey->id }}">
            <div class="col-12">
                <x-forms.richeditor name="question_text" label="Pertanyaan" required=1>
                </x-forms.richeditor>
            </div>
            <div class="col-12">
                <x-forms.select label="Jenis Jawaban" name="question_type">
                    <option value="text">Teks</option>
                    <option value="radio">Radio</option>
                    <option value="checkbox">Checkbox</option>
                    <option value="range">Range</option>
                </x-forms.select>
            </div>

            <div id="repeater-section" style="display: none;">
                <label class="mb-1">Options:</label>
                <div id="repeater">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="options[]" class="form-control" placeholder="Masukkan opsi 1">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success add-row">
                                <span class="ti ti-plus fw-bold"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="range-section" style="display: none;">
                <div class="row mt-1">
                    <div class="col-md-6">
                        <label for="range_min">Range Minimum</label>
                        <input type="number" name="min_value" id="range_min" class="form-control" placeholder="Nilai Minimum">
                    </div>
                    <div class="col-md-6">
                        <label for="range_max">Range Maksimal</label>
                        <input type="number" name="max_value" id="range_max" class="form-control" placeholder="Nilai Maksimal">
                    </div>
                </div>
            </div>
        </div>
    </x-modal.lg>

    <x-modal.lg id="EditSurvey" title="Tambah Survey Baru" action="{{ route('gallery.store') }}" isUpdate=1>
        <div class="row">
            <input type="hidden" name="survey_id" value="{{ $survey->id }}">
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
                <x-forms.input name="end_date" id="edt_end_date" label="Tanggal Berakhir" type="datetime-local" />
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

        $(document).ready(function() {
            $('#question_type').change(function() {
                var selectedValue = $(this).val();

                if (selectedValue === 'radio' || selectedValue === 'checkbox') {
                    $('#repeater-section').show();
                    $('#range-section').hide();
                } else if (selectedValue === 'range') {
                    $('#repeater-section').hide();
                    $('#range-section').show();
                } else {
                    $('#repeater-section').hide();
                    $('#range-section').hide();
                }
            });

            var row = 2;

            $(document).on('click', '.add-row', function() {
                var html = `
                <div class="row mt-2">
                    <div class="col-md-10 mt-1">
                        <input type="text" name="options[]" class="form-control" placeholder="Masukkan opsi ${row}" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-row"><span class="ti ti-minus fw-bold"></span></button>
                    </div>
                </div>`;
                $('#repeater').append(html);
                row++;
            });

            $(document).on('click', '.remove-row', function() {
                $(this).closest('.row').remove();
            });
        });
    </script>
@endpush
