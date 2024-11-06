@extends('layouting.guest.main')

@section('title', 'Survey')

@push('headers')
    <style>
        .survey-iframe {
            width: 100%;
            height: 500px;
        }
    </style>
@endpush

@section('content')
    <x-card.guest.breadcrumb currentPage="Survey" />


    <div class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[24%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="bg-white shadow-[0_4px_30px_rgba(0,0,0,0.1)] rounded-[20px] p-[30px] xxs:p-[20px] mb-[40px]">
                <!-- text -->
                <div>
                    <!-- infos -->
                    <div class="flex flex-wrap gap-x-[16px] gap-y-[8px] mb-[31px]">
                        <div
                            class="inline-flex items-center rounded-[6px] px-[8px] py-[7px] font-semibold border border-edgreen text-edgreen">
                            <span>Deskripsi Survey </span>
                        </div>
                    </div>
                    <h5 class="font-normal text-[20px] mb-[12px]">
                        {{ $survey->title }}
                    </h5>
                    <p class="text-edgray font-medium">
                        {!! $survey->content !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="mx-[24%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="bg-white shadow-[0_4px_30px_rgba(0,0,0,0.1)] rounded-[20px] p-[30px] xxs:p-[20px] mb-[40px]">
                <!-- text -->
                <div>
                    <!-- infos -->
                    <div class="flex flex-wrap gap-x-[16px] gap-y-[8px] mb-[31px]">
                        <div
                            class="inline-flex items-center rounded-[6px] px-[8px] py-[7px] font-semibold border border-edgreen text-edgreen">
                            <span>Survey</span>
                        </div>
                    </div>
                    <iframe class="survey-iframe" src="{{ $survey->url_path }}" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
