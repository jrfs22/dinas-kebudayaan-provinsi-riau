@extends('layouting.auth.main')

@section('title', 'Misi')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Misi" route="{{ route('profiles', ['type' => 'misi']) }}" />
@endsection

@section('content')
    <x-card.profile header="Edit Misi" :content="$content">
        @slot('slotForm')
            <div class="row">
                <div class="col-12">
                    <x-forms.richeditor
                        name="content" value="{!! $content->content !!}">
                        {!! $content->content !!}
                    </x-forms.richeditor>
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
            <h5>Misi</h5>
            {!! $content->content !!}
        @endslot
    </x-card.profile>
@endsection
