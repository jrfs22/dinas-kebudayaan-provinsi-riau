@extends('layouting.auth.main')

@section('title', 'Ubah Profil')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Ubah Profil" route="{{ route('agenda') }}" />
@endsection

@section('content')
    <div class="card card-body">
        <form class="needs-validation" action="{{ route('pengguna.profile.update') }}" method="POST" novalidate>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <x-forms.input name="name" label="Nama lengkap" placeholder="Jhon Doe" required=1 value="{{ auth()->user()->name }}"/>
                </div>
                <div class="col-12">
                    <x-forms.input name="email" label="Email" placeholder="jhon.doe@gmail.com" required=1 value="{{ auth()->user()->email }}"/>
                </div>
                <div class="col-12">
                    <x-forms.input name="old_password" type="password" label="Password Lama" placeholder="**************" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.input name="new_password" type="password"  label="Password Baru" placeholder="**************" required=1/>
                </div>
                <div class="col-12">
                    <x-forms.input name="new_password_confirmation" type="password"  label="Konfirmasi Password" placeholder="**************" required=1/>
                </div>
                <div class="col-12 mb-3 fs-4">
                    <a href="{{ route('agenda') }}" class="btn btn-secondary w-100">Batal & Kembali</a>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Save changes</button>
                </div>
            </div>
        </form>
    </div>

@endsection
