@props([
    'name',
    'placeholder',
    'type' => 'text',
    'id' => $name,
    'required' => false,
    'message' => '',
    'label' => ''
])

<div class="mb-3" id="container-{{ $name }}">
    @if($label != '')
    <label class="fw-bold mb-2">{{ $label }}
        @if ($type === "file")
            (<i class="text-danger">Maksimal 512kb</i>)
        @endif
    </label>
    @endif
    <input type="{{ $type }}" id="input-{{ $id }}" name="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}"
        @if ($required)
            required
        @endif
    >
    <div class="invalid-feedback">
        {{ $message }}
    </div>
</div>
