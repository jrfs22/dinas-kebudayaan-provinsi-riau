@extends('layouting.auth.main')

@section('title', 'Ubah Artikel')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Ubah Artikel" route="{{ route('article') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <form class="needs-validation" action="{{ route('article.update', ['id' => $article->id]) }}" method="POST"
            enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="title" label="Judul" placeholder="Penemuan Budaya"
                        value="{{ $article->title }}" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.input name="summary" label="Ringkasan Artikel" placeholder="Penemuan Budaya Baru"
                        value="{{ $article->summary }}" required=1/>
                </div>
                <div class="col-12 col-lg-6">
                    <x-preview.img
                        image="{{ asset('storage/' . $article->cover_image_path) }}"
                        title="{{ $article->title }}"
                        label="Gambar Cover Yang Lama"
                    />
                </div>
                <div class="col-12 col-lg-6">
                    <x-preview.img
                        image="{{ asset('storage/' . $article->image_path) }}"
                        title="{{ $article->title }}"
                        label="Gambar Utama Yang Lama"
                    />
                </div>
                <div class="col-12 col-lg-6">
                    <x-forms.input name="cover_image_path" label="Gambar Cover" type="file" fileLabel="Maksimal 4MB & Dimensi 330 x 223"/>
                </div>
                <div class="col-12 col-lg-6">
                    <x-forms.input name="image_path" label="Gambar Utama" type="file" fileLabel="Maksimal 4MB & Dimensi 770 x 381"/>
                </div>
                <div class="col-12 col-lg-6">
                    <x-forms.select name="category_id" label="Kategori" required=1>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" @if ($item->id === $article->category_id) selected @endif>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-12 col-lg-6">
                    <x-forms.input name="date" label="Tanggal" type="date" value="{{ $article->date }}" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.richeditor name="content" label="Isi Artikel" id="edt_content" value="{{ $article->content }}" required=1>
                    </x-forms.richeditor>
                </div>

                <div class="col-12">
                    <x-forms.hastag name="hashtags" label="Hastag" required=1/>
                </div>

                <div class="col-12 mb-3 fs-4">
                    <a href="{{ route('article') }}" class="btn btn-secondary w-100">Batal & Kembali</a>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Save changes</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script>
        edt_content.root.innerHTML = {!! json_encode($article->content) !!}

        var initialTags = @json($article->hashtags);

        const tagsArray = JSON.parse(initialTags);

        const formattedTags = tagsArray.map(value => ({
            value
        }));

        tagify.addTags(formattedTags);
    </script>
@endpush
