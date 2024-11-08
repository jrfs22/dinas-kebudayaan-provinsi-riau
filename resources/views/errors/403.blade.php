@extends('layouting.guest.secondary')

@section('title', '403')
@section('content')
    <x-errors
        errorCode="403"
        message="Akses Ditolak"
        description="Anda tidak memiliki izin untuk mengakses halaman ini. Jika Anda yakin ini adalah kesalahan, silakan hubungi tim dukungan kami."
    />
@endsection
