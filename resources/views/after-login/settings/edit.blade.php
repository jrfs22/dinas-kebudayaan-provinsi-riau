@extends('layouting.auth.main')

@section('title', 'Profil')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Profil" route="{{ route('profiles', ['type' => 'profil']) }}" />
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
    <x-card.profile header="Edit {{ category($content->category) }}" :content="$content">
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

            @if (in_array($content->category, ['banner-secondary-image', 'banner-main-image', 'breadcrumb']) )
                <div class="col-12">
                    <x-forms.input
                        name="image_path"
                        label="Gambar"
                        type="file"
                    />
                </div>
            @endif
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
            <h4 class="card-title">Preview</h4>
            <div class="iframe-container" style="flex-grow: 1;">
                <iframe src="{{ $content->url_path }}" frameborder="0"></iframe>
            </div>
            <h4 class="card-title">Detail</h4>
            <a href="{{ $content->url_path }}">
                {{ $content->url_path }}
            </a>
        @endslot
    </x-card.profile>
@endsection
