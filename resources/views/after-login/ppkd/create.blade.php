@extends('layouting.auth.main')

@section('title', 'Tambah PPKD')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Tambah PPKD" route="{{ route('news') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <form class="needs-validation" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data"
            novalidate>
            @csrf
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="title" label="Keterangan PPKD" placeholder="PPKD Kota Pekanbaru" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.input name="image_path" label="File" type="file" fileLabel="Maksimal 4MB" required=1/>
                </div>
                <div class="col-6">
                    <x-forms.input name="date" label="Tanggal" type="date"  required=1/>
                </div>
                <div class="col-6">
                    <x-forms.select name="Status">
                    </x-forms.select>
                </div>
                <div class="col-12 mb-3 fs-4">
                    <a href="{{ route('news') }}" class="btn btn-secondary w-100">Batal & Kembali</a>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Save changes</button>
                </div>
            </div>
        </form>
    </div>

@endsection
