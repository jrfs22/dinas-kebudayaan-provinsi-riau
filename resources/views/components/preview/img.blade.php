@props(['image', 'label', 'title'])

<div class="mb-3">
    <label class="fw-bold mb-1">{{ $label }}</label>
    <img src="{{ $image }}" alt="{{ $title }}" width="100%" height="200" style="object-fit:contain;">
</div>
