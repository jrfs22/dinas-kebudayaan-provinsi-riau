@extends('layouting.guest.main')

@section('title', 'Survey')

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
            <div class="bg-white shadow-[0_4px_30px_rgba(0,0,0,0.1)] rounded-[20px] p-[30px] xxs:p-[20px] mb-[40px]"
                id="warningSection" style="display: none;">
                <!-- text -->
                <div>
                    <!-- infos -->
                    <div class="flex flex-wrap gap-x-[16px] gap-y-[8px] mb-[31px]">
                        <div
                            class="inline-flex items-center rounded-[6px] px-[8px] py-[7px] font-semibold border bg-red-200">
                            <span>Warning</span>
                        </div>
                    </div>
                    <p class="text-edgray font-medium">
                        Terdapat kolom yang belum diisi. Silakan periksa kembali.
                    </p>
                </div>
            </div>
            <form action="{{ route('survey.responden.store', ['survey_id' => $survey->id]) }}" method="POST" id="formSurvey">
                @csrf
                <div class="bg-white shadow-[0_4px_30px_rgba(0,0,0,0.1)] rounded-[20px] p-[30px] xxs:p-[20px]">
                    <div id="step-1" class="wizard-step hidden">
                        <div class="flex flex-wrap gap-x-[16px] gap-y-[8px] mb-[31px]">
                            <div
                                class="inline-flex items-center rounded-[6px] px-[8px] py-[7px] font-semibold border border-edgreen text-edgreen">
                                <span>Pertanyaan 1 dari {{ $survey->question_summary }}</span>
                            </div>
                        </div>
                        <h5 class="font-normal text-[20px] mb-[12px]">Nama Lengkap</h5>

                        <x-forms.guest.text name="fullname" isRequired=1 />

                        <div class="flex justify-end items-end gap-2 mt-[10px]">
                            <button type="button" onclick="nextStep()"
                                class="inline-flex items-center py-2 px-5 border rounded-full bg-edgreen text-white">
                                Lanjut
                            </button>
                        </div>
                    </div>

                    <div id="step-2" class="wizard-step hidden">
                        <div class="flex flex-wrap gap-x-[16px] gap-y-[8px] mb-[31px]">
                            <div
                                class="inline-flex items-center rounded-[6px] px-[8px] py-[7px] font-semibold border border-edgreen text-edgreen">
                                <span>Pertanyaan 2 dari {{ $survey->question_summary }}</span>
                            </div>
                        </div>
                        <h5 class="font-normal text-[20px] mb-[12px]">Email</h5>
                        <x-forms.guest.text name="email" type="email" placeholder="example@gmail.com" isRequired=1 />

                        <div class="flex justify-end items-end gap-2 mt-[10px]">
                            <button type="button" onclick="prevStep()"
                                class="inline-flex items-center py-2 px-5 border rounded-full border-edgreen text-edgreen">
                                kembali
                            </button>
                            <button type="button" onclick="nextStep()"
                                class="inline-flex items-center py-2 px-5 border rounded-full bg-edgreen text-white">
                                Lanjut
                            </button>
                        </div>
                    </div>
                    @foreach ($survey->questions as $key => $item)
                        <div id="step-{{ $key + 3 }}" class="wizard-step hidden">
                            <div class="flex flex-wrap gap-x-[16px] gap-y-[8px] mb-[31px]">
                                <div
                                    class="inline-flex items-center rounded-[6px] px-[8px] py-[7px] font-semibold border border-edgreen text-edgreen">
                                    <span>Pertanyaan {{ $key + 3 }} dari {{ $survey->question_summary }}</span>
                                </div>
                            </div>
                            <h5 class="font-normal text-[20px] mb-[12px]">{!! $item->question_text !!}</h5>

                            @if ($item->question_type === 'text')
                                <x-forms.guest.text name="{{ $item->id }}" type="text"                                   isRequired=1 />
                            @elseif ($item->question_type === 'radio')
                                @foreach ($item->option_decode as $itemDecode)
                                    <x-forms.guest.radio name="{{ $item->id }}" title="{{ $itemDecode }}" value="{{ $itemDecode }}"/>
                                @endforeach
                            @elseif ($item->question_type === 'checkbox')
                                @foreach ($item->option_decode as $itemDecode)
                                    <x-forms.guest.checkbox name="{{ $item->id }}" title="{{ $itemDecode }}" value="{{ $itemDecode }}"/>
                                @endforeach

                            @else
                                <x-forms.guest.range name="{{ $item->id }}" title="{{ $item->question_text }}" min="{{ $item->min_value }}"
                                    max="{{ $item->max_value }}" />
                            @endif

                            <div class="flex justify-end items-end gap-2 mt-[10px]">
                                <button type="button" onclick="prevStep()"
                                    class="inline-flex items-center py-2 px-5 border rounded-full border-edgreen text-edgreen">
                                    kembali
                                </button>
                                @if ($survey->question_summary === $key + 3)
                                    <button id="btnSubmit" type="submit"
                                        class="inline-flex items-center py-2 px-5 border rounded-full bg-edgreen text-white">
                                        Submit
                                    </button>
                                @else
                                    <button type="button" onclick="nextStep()"
                                        class="inline-flex items-center py-2 px-5 border rounded-full bg-edgreen text-white">
                                        Lanjut
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let currentStep = 1;
        let maxStep = {!! json_encode($survey->question_summary) !!}

        function showStep(step) {
            document.querySelectorAll(".wizard-step").forEach((el, index) => {
                el.classList.toggle("hidden", index !== step - 1);
            });
        }

        function nextStep() {
            if (currentStep < maxStep) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }

        document.addEventListener("DOMContentLoaded", () => showStep(currentStep));


        $("#formSurvey").on("submit", function(event) {
            let isFormValid = true;

            $(this).find("input[required], textarea[required], select[required]").each(function() {
                if (!$(this).val().trim()) {
                    isFormValid = false;
                    $("#warningSection").show()
                    return false;
                } else {
                    $("#warningSection").hide()
                }
            });

            if (!isFormValid) {
                event.preventDefault();
            }
        });

        $("#btnSubmit").on("click", function() {
            $("#formSurvey").submit();
        });
    </script>
@endpush
