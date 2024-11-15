<script src="{{ asset('assets/user/libs/jquery/dist/jquery.min.js') }}?v={{ date('Ymd') }}"></script>
<script src="{{ asset('assets/user/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}?v={{ date('Ymd') }}"></script>
<script src="{{ asset('assets/user/js/sidebarmenu.js') }}?v={{ date('Ymd') }}"></script>
<script src="{{ asset('assets/user/js/app.min.js') }}?v={{ date('Ymd') }}"></script>

<script src="{{ asset('assets/user/libs/simplebar/dist/simplebar.js') }}?v={{ date('Ymd') }}"></script>
<script src="{{ asset('assets/user/js/dashboard.js') }}?v={{ date('Ymd') }}"></script>

<script src="{{ asset('assets/user/js/libs/dataTable.js') }}?v={{ date('Ymd') }}"></script>

<script src="{{ asset('assets/user/js/customs.js') }}?v={{ date('Ymd') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-sweetalert />


@vite('resources/js/app.js')


@stack('scripts')
