@extends('layouting.auth.main')

@section('title', 'Edit Agenda')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Edit Agenda" route="{{ route('agenda') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <form class="needs-validation" action="{{ route('agenda.update', ['id' => $agenda->id]) }}" method="POST"
            enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" label="Judul Kegiatan" placeholder="Festival" required=1
                        value="{{ $agenda->name }}" />
                </div>
                <div class="col-12">
                    <x-forms.input name="slug" label="Ringkasan Kegiatan" placeholder="Festival" required=1
                        value="{{ $agenda->slug }}" />
                </div>
                <div class="col-12">
                    <x-forms.richeditor name="content" label="Detail Kegiatan" id="edt_content"
                        value="{{ $agenda->content }}">
                    </x-forms.richeditor>
                </div>
                <div class="col-12">
                    <x-forms.input name="location" label="Lokasi Kegiatan" placeholder="Hotel Pangeran" required=1
                        value="{{ $agenda->location }}" />
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.select name="agenda_category_id" label="Kategori Kegiatan" required=1>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" @if ($item->id === $agenda->agenda_category_id) selected @endif>
                                {{ $item->name }}
                            </option>
                        @endforeach

                    </x-forms.select>
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="date" label="Tanggal Kegiatan" type="date" required=1
                        value="{{ $agenda->date }}" />
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="contact_person" label="Kontak Penanggung Jawab"
                        placeholder="081250301020 (Supriadi)" value="{{ $agenda->contact_person }}" />
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="email" label="Email Penanggung Jawab" placeholder="disbud@gmail.com"
                        value="{{ $agenda->email }}" />
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="start_time" type="time" label="Waktu Mulai" required=1
                        value="{{ $agenda->start_time }}" />
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="end_time" type="time" label="Waktu Berakhir" required=1
                        value="{{ $agenda->end_time }}" />
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label class="fw-bold mb-1">Gambar Cover Lama</label>
                        <img src="{{ asset('storage/' . $agenda->cover_image_path) }}"
                            alt="Gambar Cover {{ $agenda->title }}" width="100%" height="150"
                            style="object-fit:contain;">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label class="fw-bold mb-1">Gambar Utama Lama</label>
                        <img src="{{ asset('storage/' . $agenda->image_path) }}" alt="Gambar Utama {{ $agenda->title }}"
                            width="100%" height="150" style="object-fit:contain;">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="cover_image_path" label="Gambar Cover" type="file"
                        fileLabel="Maksimal 512kb & Dimensi 215 x 203 " />
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="image_path" label="Gambar Utama" type="file"
                        fileLabel="Maksimal 512kb & Dimensi 770 x 411 " />
                </div>

                <div class="col-12 mb-3 fs-4">
                    <a href="{{ route('agenda') }}" class="btn btn-secondary w-100">Batal & Kembali</a>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Save changes</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script>
        edt_content.root.innerHTML = {!! json_encode($agenda->content) !!}
    </script>
@endpush