@extends('layouting.guest.main')

@section('title', 'PPID')

@section('content')
    <x-card.guest.breadcrumb currentPage="PPID" />

    <section class="ed-faq py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <!-- faq section -->
            <div class="grid gap-x-[70px] xl:gap-x-[50px] lg:gap-x-[30px] gap-y-[40px]">
                <div>
                    <div class="ed-accordion space-y-[16px]">
                        @foreach ($ppid as $item)
                            <x-card.guest.ppid :ppid="$item"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
