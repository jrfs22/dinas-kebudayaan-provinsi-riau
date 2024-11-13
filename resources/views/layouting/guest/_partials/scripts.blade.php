<!-- js -->
<script src="{{ asset('assets/guest/vendor/swiper/swiper-bundle.min.js') }}?v={{ date('Ymd') }}"></script>
<script src="{{ asset('assets/guest/vendor/fslightbox/fslightbox.js') }}?v={{ date('Ymd') }}"></script>
<script src="{{ asset('assets/guest/vendor/mixitup/mixitup.min.js') }}?v={{ date('Ymd') }}"></script>
<script src="{{ asset('assets/guest/vendor/slim-select/slimselect.min.js') }}?v={{ date('Ymd') }}"></script>

<script src="{{ asset('assets/guest/js/main.js') }}?v={{ date('Ymd') }}"></script>
<script src="{{ asset('assets/guest/js/accordion.js') }}?v={{ date('Ymd') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<x-sweetalert />

@vite('resources/js/app.js')

@stack('scripts')
