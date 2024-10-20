@props(['data'])

<!-- PAGINATION START -->
@if ($data->hasPages())
<div class="flex items-center gap-[20px] pt-[60px] justify-center text-[16px]">
    <!-- Previous Page Link -->
    @if ($data->onFirstPage())
        <span class="text-gray-500"><i class="fa-solid fa-arrow-left-long"></i></span>
    @else
        <a href="{{ $data->previousPageUrl() }}" class="hover:text-edgreen">
            <i class="fa-solid fa-arrow-left-long"></i>
        </a>
    @endif

    <!-- Pagination Links -->
    <div class="ed-pagination flex gap-[10px] items-center">
        @foreach ($data->links()->elements as $element)
            @if (is_string($element))
                <span class="text-gray-500">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $data->currentPage())
                        <a href="#" class="border border-[#d9d9d9] rounded-full w-[50px] h-[50px] flex items-center justify-center text-etBlack hover:bg-edgreen hover:border-edgreen hover:text-white active">
                            {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                        </a>
                    @else
                        <a href="{{ $url }}" class="border border-[#d9d9d9] rounded-full w-[50px] h-[50px] flex items-center justify-center text-etBlack hover:bg-edgreen hover:border-edgreen hover:text-white">
                            {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>

    <!-- Next Page Link -->
    @if ($data->hasMorePages())
        <a href="{{ $data->nextPageUrl() }}" class="hover:text-edgreen">
            <i class="fa-solid fa-arrow-right-long"></i>
        </a>
    @else
        <span class="text-gray-500"><i class="fa-solid fa-arrow-right-long"></i></span>
    @endif
</div>
@endif
<!-- PAGINATION END -->
