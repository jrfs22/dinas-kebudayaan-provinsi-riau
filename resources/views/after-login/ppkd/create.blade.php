@extends('layouting.auth.main')

@section('title', 'Tambah PPKD')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Tambah PPKD" route="{{ route('news') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <form class="needs-validation" action="{{ route('ppkd.store') }}" method="POST" enctype="multipart/form-data"
            novalidate>
            @csrf
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="title" label="Keterangan PPKD"
                        placeholder="Pokok Pikiran Kebudayaan Daerah Provinsi Riau" required=1 />
                </div>
                <div class="col-12">
                    <x-forms.select name="regency_id" label="Kabupaten / Kota" required=1>
                        @foreach ($regencies as $item)
                            <option value="{{ $item["code"] }}">{{ $item["name"] }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-12">
                    <x-forms.input name="file_path" label="File" type="file" fileLabel="Maksimal 4MB" required=1 />
                </div>
                <div class="col-6">
                    <x-forms.input name="date" label="Tanggal" type="date" required=1 />
                </div>
                <div class="col-6">
                    <x-forms.select name="status" label="Status" required=1>
                        <option value="disusun">Disusun</option>
                        <option value="disahkan">Disahkan</option>
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
