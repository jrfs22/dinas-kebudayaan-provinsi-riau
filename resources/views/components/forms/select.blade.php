@props([
    'name',
    'default' => false,
    'id' => $name,
    'placeholder' => "",
    'required' => false,
    'label' => ""
])
@if($label != '')
    <label class="fw-bold mb-1">{{ $label }}</label>
@endif

<div class="mb-3">
    <select placeholder="{{ $placeholder }}" class="form-control" name="{{ $name }}" id="{{ $id }}"
        @if ($required)
            required
        @endif>
        @if ($default)
            <option selected>Pilih</option>
        @endif
    {{ $slot }}
    </select>
</div>
