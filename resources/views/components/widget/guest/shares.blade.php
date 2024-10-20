@props(['url'])


<div class="border border-[#e5e5e5] rounded-[10px] px-[30px] xxs:px-[15px] py-[24px] xxs:py-[25px]">
    <div class="flex items-center justify-between">
        <h6 class="font-semibold text-[16px] text-black">Share:</h6>
        <div class="flex gap-[15px] text-[16px]">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank"
                class="text-[#757277] hover:text-edgreen">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text=Check%20this%20out!" target="_blank"
                class="text-[#757277] hover:text-edgreen">
                <i class="fa-brands fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($url) }}" target="_blank"
                class="text-[#757277] hover:text-edgreen">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>
            <a href="https://www.youtube.com/share?url={{ urlencode($url) }}" target="_blank"
                class="text-[#757277] hover:text-edgreen">
                <i class="fa-brands fa-youtube"></i>
            </a>
            <a href="https://api.whatsapp.com/send?text={{ urlencode($url) }}" target="_blank"
                class="text-[#757277] hover:text-edgreen">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>
    </div>
</div>
