@extends('layouting.auth.main')

@section('title', 'Breadcrumb')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Breadcrumb" route="" />
@endsection

@push('headers')
<style>
    .iframe-container {
        width: 100%;
        max-height: 300px;
        height: auto;
        overflow: hidden;
        position: relative;
    }

    .iframe-container iframe {
        width: 1920px;
        height: 1080px;
        transform: scale(0.25);
        transform-origin: 0 0;
        border: 0;
    }
</style>
@endpush

@section('content')
    <x-card.profile header="Edit Breadcrumb" :content="$content">
        @slot('slotForm')
        <div class="row">
            @if (in_array($content->category, ['banner-description']))
                <div class="col-12">
                    <x-forms.richeditor
                        name="content" value="{!! $content->content !!}">
                        {!! $content->content !!}
                    </x-forms.richeditor>
                </div>
            @endif

            <div class="col-12">
                <x-forms.input
                    name="image_path"
                    label="Gambar"
                    fileLabel="Maksimal 512kb & Dimensi {{ $content->description }}"
                    type="file"
                />
            </div>

            <div class="col-12">
                <x-forms.select
                    name="status"
                    label="Status">
                    <option value="published" {{ $content->status == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ $content->status == 'draft' ? 'selected' : '' }}>Draft</option>
                </x-forms.select>
            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-primary w-100">Save Changes</button>
            </div>
        </div>
        @endslot

        @slot('slotResult')
            <img class="img-fluid mb-2" src="{{ asset('storage/' . $content->image_path) }}" alt="Gambar {{ $content->title }}" style="max-height: 250px; object-fit: contain;">
        @endslot
    </x-card.profile>
@endsection
