@props([
    'min',
    'max',
    'name',
    'id' => $name
])

<div class="relative mb-12 w-3/5">
    <label class="text-gray-400">Berikan nilai dari {{ $min }} sampai {{ $max }}</label>
    <input id="{{ $id }}" type="range" value="1" min="{{ $min }}" max="{{ $max }}" name="range-{{ $name }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-edyellow dark:ring-edgreen">
    <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">{{ $min }}</span>
    <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">{{ $max }}</span>
</div>
