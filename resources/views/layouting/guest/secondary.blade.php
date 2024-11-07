<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouting.metas')

    @include('layouting.guest._partials.headers')
</head>

<body>
    <div class="ed-overlay group">
        <div
            class="fixed inset-0 z-[100] group-[.active]:bg-edblue/80 duration-[400ms] pointer-events-none group-[.active]:pointer-events-auto">
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    @include('layouting.guest._partials.scripts')
</body>

</html>
