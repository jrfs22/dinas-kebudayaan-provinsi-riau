@extends('layouting.auth.main')

@section('title', 'Footer')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Footer" route="" />
@endsection

@section('content')
    <x-card.profile header="Edit Breadcrumb" :content="$content">
        @slot('slotForm')
        <div class="row">
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
