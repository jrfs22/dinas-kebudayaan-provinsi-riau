@props([
    'name',
    'placeholder' => '',
    'type' => 'text',
    'id' => $name,
    'required' => false,
    'message' => '',
    'label' => '',
    'value' => '',
    'fileLabel' => 'Maksimal 512kb'
])

<div class="mb-3" id="container-{{ $name }}">
    @if ($label != '')
        <label class="fw-bold mb-1">{{ $label }} @if ($required) <span class="text-danger">*</span> @endif
            @if ($type === 'file')
                (<i class="text-danger">{{ $fileLabel }}</i>)
            @endif
        </label>
    @endif
    <input type="{{ $type }}" id="input-{{ $id }}" name="{{ $name }}" class="form-control"
        placeholder="{{ $placeholder }}" value="{{ $value }}" @if ($required) required @endif>
    <div class="invalid-feedback">
        {{ $message }}
    </div>
</div>
