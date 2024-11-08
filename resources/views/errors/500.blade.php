@extends('layouting.guest.secondary')

@section('title', '500')
@section('content')
    <x-errors
        errorCode="500"
        message="Maaf, terjadi kesalahan di server kami"
        description="Kami mengalami kendala teknis. Mohon coba lagi beberapa saat lagi atau hubungi tim dukungan kami jika masalah terus berlanjut."
    />
@endsection
