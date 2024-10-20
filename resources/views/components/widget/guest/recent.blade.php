@props([
    'widgetTitle',
])

<div class="bg-edoffwhite rounded-[10px] p-[30px] xxs:px-[20px] pt-[20px] xxs:pt-[10px]">
    <h4
        class="font-semibold text-[18px] text-black border-b border-[#dddddd] relative pb-[11px] before:content-normal before:absolute before:left-0 before:bottom-0 before:w-[50px] before:h-[2px] before:bg-edgreen">
        {{ $widgetTitle }}
    </h4>

    <div class="posts mt-[30px] space-y-[24px]">
        {{ $slot }}
    </div>
</div>
