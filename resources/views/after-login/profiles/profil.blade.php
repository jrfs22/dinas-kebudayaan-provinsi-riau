@extends('layouting.auth.main')

@section('title', 'Profil')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Profil" route="{{ route('profiles', ['type' => 'profil']) }}" />
@endsection

@section('content')
    <x-card.profile header="Edit Profil" :content="$content">
        @slot('slotForm')
            <div class="row">
                <div class="col-12">
                    <x-forms.richeditor name="content" value="{!! $content->content !!}">
                        {!! $content->content !!}
                    </x-forms.richeditor>
                </div>
                <div class="col-12">
                    <x-forms.select name="status" label="Status">
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
            {!! $content->content !!}
        @endslot
    </x-card.profile>
@endsection
