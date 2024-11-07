@extends('layouting.guest.secondary')

@section('title', '404')
@section('content')
    <x-errors
        errorCode="404"
        message="Halaman tidak ada"
        description="Halaman yang Anda cari tidak ditemukan. Mungkin sudah dihapus atau tautan yang Anda gunakan salah."
    />
@endsection
