<script src="{{ asset('assets/user/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/user/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/user/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/user/js/app.min.js') }}"></script>

<script src="{{ asset('assets/user/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('assets/user/js/dashboard.js') }}"></script>

<script src="{{ asset('assets/user/js/libs/dataTable.js') }}"></script>

<script src="{{ asset('assets/user/js/customs.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@vite('resources/js/app.js')

<x-sweetalert />

@stack('scripts')
