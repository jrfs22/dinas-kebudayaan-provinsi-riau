@extends('layouting.auth.main')

@section('title', 'Detail Survey')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Detail Survey" route="{{ route('survey') }}" />
@endsection

@push('headers')
    <style>
        .survey-iframe {
            width: 100%;
            height: 500px;
        }
    </style>
@endpush

@section('content')
    <div class="card card-body">
        <h5>{{ $survey->title }}</h5>
        <p>{!! $survey->content !!}</p>

        <iframe src="{{ $survey->url_path }}" frameborder="0" class="survey-iframe"></iframe>
    </div>
@endsection
