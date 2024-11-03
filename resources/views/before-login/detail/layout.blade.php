@extends('layouting.guest.main')
@php
    $breadcrumb = 'Detail ' . $__env->yieldContent('breadcrumb');
@endphp


@section('content')
    <x-card.guest.breadcrumb currentPage="{{ $breadcrumb }}" />

    <!-- MAIN CONTENT START -->
    <div class="ed-event-details-content py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="flex gap-[30px] lg:gap-[20px] md:flex-col md:items-center">
                <!-- Left Content -->
                <div class="left grow space-y-[30px] md:space-y-[20px]">
                    @yield('leftContent')
                </div>

                <!-- Right Sidebar -->
                <div class="right max-w-full w-[370px] lg:w-[360px] shrink-0 space-y-[30px] md:space-y-[25px]">
                    @yield('rightContent')
                </div>
            </div>
        </div>
    </div>
    <!-- MAIN CONTENT END -->
@endsection
