@extends('layouting.auth.main')

@section('title', 'Ubah Berita')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Ubah Berita" route="{{ route('news') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <form class="needs-validation" action="{{ route('news.update', ['id' => $news->id]) }}" method="POST"
            enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="title" label="Judul" placeholder="Penemuan Budaya"
                        value="{{ $news->title }}" />
                </div>
                <div class="col-12">
                    <x-forms.input name="slug" label="Ringkasan Berita" placeholder="Penemuan Budaya Baru"
                        value="{{ $news->slug }}" />
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label class="fw-bold mb-1">Gambar Cover Lama</label>
                        <img src="{{ asset('storage/' . $news->cover_image_path) }}" alt="Gambar Cover {{ $news->title }}" width="100%" height="400" style="object-fit:contain;" >
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label class="fw-bold mb-1">Gambar Utama Lama</label>
                        <img src="{{ asset('storage/' . $news->image_path) }}" alt="Gambar Utama {{ $news->title }}" width="100%" height="400" style="object-fit:contain;">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <x-forms.input name="cover_image_path" label="Gambar Cover" type="file" />
                </div>
                <div class="col-12 col-lg-6">
                    <x-forms.input name="image_path" label="Gambar Utama" type="file" />
                </div>
                <div class="col-12 col-lg-6">
                    <x-forms.select name="category_id" label="Kategori">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-12 col-lg-6">
                    <x-forms.input name="date" label="Tanggal" type="date" value="{{ $news->date }}" />
                </div>
                <div class="col-12">
                    <x-forms.richeditor name="content" label="Isi Berita" id="edt_content" value="{{ $news->content }}">
                    </x-forms.richeditor>
                </div>

                <div class="col-12">
                    <x-forms.hastag name="hashtags" label="Hastag" />
                </div>

                <div class="col-12 mb-3 fs-4">
                    <a href="{{ route('news') }}" class="btn btn-secondary w-100">Batal & Kembali</a>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Save changes</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script>
        edt_content.root.innerHTML = {!! json_encode($news->content) !!}

        var initialTags = @json($news->hashtags);

        const tagsArray = JSON.parse(initialTags);

        const formattedTags = tagsArray.map(value => ({
            value
        }));

        tagify.addTags(formattedTags);
    </script>
@endpush
