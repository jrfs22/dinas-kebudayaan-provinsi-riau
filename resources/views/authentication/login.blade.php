@extends('layouting.auth.second')

@section('title', 'Login')
@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <form action="{{ route('signin') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <a href=""
                                        class="text-nowrap logo-img text-center d-block py-3 w-100">
                                        <img src="{{ asset('assets/general/logo/android-chrome-192x192.png') }}" width="96" height="96" alt="">
                                    </a>
                                    <p class="text-center fw-2">Dinas Kebudayaan Provinsi Riau</p>
                                    <div class="row">
                                        <div class="col-12">
                                            <x-forms.input name="email" placeholder="Enter Your Email" label="Email"/>
                                        </div>
                                        <div class="col-12">
                                            <x-forms.input
                                                name="password"
                                                type="password"
                                                placeholder="************" label="Password"
                                            />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
