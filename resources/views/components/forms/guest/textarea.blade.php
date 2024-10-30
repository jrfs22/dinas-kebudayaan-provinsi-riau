@props([
    'name',
    'placeholder',
])

<textarea rows="4" class="border rounded-md p-3 w-full mb-4" name="{{ $name }}" placeholder="{{ $placeholder }}"></textarea>
