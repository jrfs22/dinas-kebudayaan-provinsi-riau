@extends('layouting.auth.main')

@section('title', 'Settings')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Settings" route="{{ route('profiles', ['type' => 'profil']) }}" />
@endsection

@section('content')
    <x-card.profile header="Edit Settings" route="{{ route('settings.update', ['id' => $content->id, 'type' => $type]) }}" :content="$content">
        @slot('slotForm')
        <div class="row">
            @if ($content->content != null)
                <div class="col-12">
                    <x-forms.richeditor
                        name="content" value="{!! $content->content !!}">
                        {!! $content->content !!}
                    </x-forms.richeditor>
                </div>
            @endif

            @if ($content->url_path != null)
                <x-forms.textarea
                    name="url_path"
                    label="Url"
                    value="{{ $content->url_path }}"
                />
            @endif

            @if ($content->image_path != null)
                <div class="col-12">
                    <x-forms.input
                        name="image_path"
                        label="Gambar"
                        type="file"
                        fileLabel="Maksimal 512kb & Dimensi {{ $content->description }}"
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
            @if ($content->content != null)
                {!! $content->content !!}
            @endif

            @if ($content->image_path != null)
                <img class="img-fluid mb-2" src="{{ asset('storage/' . $content->image_path) }}" alt="Gambar {{ $content->title }}" style="max-height: 250px; object-fit: contain;">
            @endif

            @if ($content->url_path != null)
                {{ $content->url_path }}
            @endif
        @endslot
    </x-card.profile>
@endsection
