@props([
    'title',
    'name',
    'value',
    'id' => $name
])

<div class="flex items-center mb-4">
    <input id="{{ $id }}" type="radio" name="radio-{{ $name }}[]" class="w-5 h-5" value="{{ $value }}">
    <label for="{{ $id }}" class="ms-2 text-md font-normal text-gray-900">{{ $title }}</label>
</div>
