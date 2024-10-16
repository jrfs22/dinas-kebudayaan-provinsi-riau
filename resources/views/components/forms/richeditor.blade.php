@props(['name', 'placeholder',  'type' => 'text', 'id' => $name, 'required' => false, 'label' => '', 'value' => ''])

<input type="hidden" id="hidden-{{ $id }}" name="{{ $name }}" value="{{ $value }}">
<div class="mb-3" id="{{ $id }}">
    @if($label != '')
    <label class="fw-bold mb-1">{{ $label }}</label>
    @endif
    <div id="editor{{ $id }}" style="min-height: 100px;">
        {{ $slot }}
    </div>
</div>

@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        const {{$id}} = new Quill('#editor{{ $id }}', {
            theme: 'snow'
        });

        {{$id}}.on('text-change', function(delta, oldDelta, source) {
            document.querySelector("#hidden-{{ $id }}").value = {{$id}}.root.innerHTML;
        });
    </script>
@endpush
