@props([
    'id' => 'dataTable',
    'placeholder' => 'Tenant'
])

<form class="position-relative">
    <input type="text" class="form-control product-search ps-5" id="input-search-{{ $id }}"
        placeholder="Cari {{ $placeholder }}...">
    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
</form>
