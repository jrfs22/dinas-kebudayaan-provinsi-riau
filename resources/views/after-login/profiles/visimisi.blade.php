@extends('layouting.auth.main')

@section('title', 'Visi & Misi')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Visi & Misi" route="{{ route('profiles', ['type' => 'visi-misi']) }}" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-6 d-flex align-items-stretch">
            <div class="card card-body">
                <h4 class="card-title">Edit Visi & Misi</h4>
                <form action="{{ route('profiles.update', ['id' => $content->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                </form>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 d-flex align-items-stretch ">
            <div class="card card-body position-relative">
                {!! $content->content !!}
            </div>
        </div>
    </div>
@endsection
