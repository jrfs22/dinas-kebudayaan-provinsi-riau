@extends('layouting.auth.main')

@section('title', 'Tambah Agenda')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Tambah Agenda" route="{{ route('agenda') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <form class="needs-validation" action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data"
            novalidate>
            @csrf
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" label="Judul Kegiatan" placeholder="Festival" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.input name="slug" label="Ringkasan Kegiatan" placeholder="Festival" required=1 />
                </div>
                <div class="col-12">
                    <x-forms.richeditor name="content" label="Detail Kegiatan" id="edt_content" required=1>
                    </x-forms.richeditor>
                </div>
                <div class="col-12">
                    <x-forms.input name="location" label="Lokasi Kegiatan (Iframe Google Maps)" placeholder="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6693315389807!2d101.45222477605746!3d0.4951527995000009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aedd2565414f%3A0x61f21d93f231fbf!2sDinas%20Kebudayaan%20Riau!5e0!3m2!1sen!2sid!4v1728827441163!5m2!1sen!2sid" required=1/>
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.select name="agenda_category_id" label="Kategori Kegiatan" required=1>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="date" label="Tanggal Kegiatan" type="date" required=1/>
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="start_time" type="time" label="Waktu Mulai"  required=1/>
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="end_time" type="time" label="Waktu Berakhir"  required=1/>
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="cover_image_path" label="Gambar Cover" type="file" fileLabel="Maksimal 512kb & Dimensi 215 x 203 " required=1/>
                </div>
                <div class="col-12 col-md-6">
                    <x-forms.input name="image_path" label="Gambar Utama" type="file" fileLabel="Maksimal 512kb & Dimensi 770 x 411 " required=1/>
                </div>

                <div class="col-12 mb-3 fs-4">
                    <a href="{{ route('news') }}" class="btn btn-secondary w-100">Batal & Kembali</a>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Save changes</button>
                </div>
            </div>
        </form>
    </div>

@endsection
