@props([
    'name',
    'placeholder' => 'Your answer',
    'type' => 'text',
    'isRequired' => false
])

<input type="{{ $type }}" name="text-{{ $name }}" class="border rounded-md p-3 w-full mb-4" placeholder="{{ $placeholder }}" @if ($isRequired) required @endif>
