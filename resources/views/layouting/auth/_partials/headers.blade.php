@include('layouting.metas')

<link rel="stylesheet" href="{{ asset('assets/user/css/styles.min.css') }}?v={{ date('Ymd') }}" />
<link rel="stylesheet" href="{{ asset('assets/user/css/customs.css') }}?v={{ date('Ymd') }}" />
<link rel="stylesheet" href="{{ asset('assets/user/css/libs/dataTable.css') }}?v={{ date('Ymd') }}" />

@stack('headers')

@vite('resources/css/app.css')
