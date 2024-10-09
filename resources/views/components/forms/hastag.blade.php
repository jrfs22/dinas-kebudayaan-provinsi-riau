@props(['name' => 'hashtags', 'label'])

@push('headers')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush

<div class="mb-3">
    @if ($label != '')
        <label class="fw-bold mb-1">
            {{ $label }}
        </label>
    @endif
    <input name="{{ $name }}" placeholder="Add hashtags" class="form-control" id="hashtagsInput">
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script>
        var input = document.querySelector('#hashtagsInput');
        var tagify = new Tagify(input, {
            enforceWhitelist: false,
            delimiters: " ",
            maxTags: 10,
            placeholder: "Tambah Hastag",
            dropdown: {
                maxItems: 5,
                enabled: 0
            }
        });
    </script>
@endpush
