@extends('layouting.auth.main')

@section('title', 'Tambah Berita')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Tambah Berita" route="{{ route('news') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <form class="needs-validation" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data"
            novalidate>
            @csrf
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="title" label="Judul" placeholder="Penemuan Budaya" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.input name="summary" label="Ringkasan Berita" placeholder="Penemuan Budaya Baru"  required=1/>
                </div>
                <div class="col-6">
                    <x-forms.input name="cover_image_path" label="Gambar Cover" type="file" fileLabel="Maksimal 4MB & Dimensi 330 x 223" required=1/>
                </div>
                <div class="col-6">
                    <x-forms.input name="image_path" label="Gambar Utama" type="file" fileLabel="Maksimal 4MB & Dimensi 770 x 381" required=1/>
                </div>
                <div class="col-6">
                    <x-forms.select name="category_id" label="Kategori" required=1>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-6">
                    <x-forms.input name="date" label="Tanggal" type="date"  required=1/>
                </div>
                <div class="col-12">
                    <x-forms.richeditor name="content" label="Isi Berita" required=1>
                    </x-forms.richeditor>
                </div>

                <div class="col-12">
                    <x-forms.hastag
                        name="hashtags"
                        label="Hashtags"
                        required=1
                    />
                </div>

                <div class="col-12 mb-3 fs-4">
                    <a href="{{ route('news') }}" class="btn btn-secondary w-100">Batal & Kembali</a>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Save changes</button>
                </div>
            </div>
        </form>
    </div>

@endsection
