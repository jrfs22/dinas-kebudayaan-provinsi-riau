@extends('layouting.auth.main')

@section('title', 'Responden')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Responden" route="{{ route('survey') }}" />
@endsection

@push('headers')
    <style>
        .text-left,
        .text-left p {
            vertical-align: middle !important;
        }

        .text-left p {
            margin-bottom: 0;
        }
    </style>
@endpush

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <x-search.basic placeholder="Responden" />
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
                <th class="text-left">Nama</th>

                @foreach ($survey->questions as $item)
                    <th class="text-left">{!! $item->question_text !!}</th>
                @endforeach
            @endslot

            @slot('slotBody')
                @foreach ($survey->responses as $item)
                    <tr class="search-items">
                        <td>
                            <div class="d-flex flex-column">
                                <h6 class="text-capitalize">{{ $item->fullname }}</h6>
                                <span>{{ $item->email }}</span>
                            </div>
                        </td>
                        @foreach ($item->answer as $answerItem)
                            <td>
                                @if (!is_array($answerItem->answer_decode))
                                    {{ $answerItem->answer_decode }}
                                @else
                                    @foreach ($answerItem->answer_decode as $answerChildItem)
                                        {{ $answerChildItem }}{{ $loop->last ? '' : ',' }}
                                    @endforeach
                                @endif
                            </td>
                        @endforeach
                        @if ($survey->questions->count() > $item->answer->count())
                        <td>-</td>
                        @endif
                    </tr>
                @endforeach
            @endslot
        </x-table.basic>
    </div>
@endsection
