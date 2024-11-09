@extends('layouting.guest.main')

@section('title', 'PPKD')

@section('content')
    <x-card.guest.breadcrumb currentPage="PPKD" />

    <section class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <form id="filterForm" method="GET" action="{{ url('/ppkd') }}">
                <div class="flex-col items-start justify-center gap-[15px]">
                    <!-- Filter Table -->
                    <div class="border rounded-lg p-4 mb-6 flex">
                        <div class="flex sm:flex-col gap-x-3 w-full">
                            <div class="w-full flex flex-col">
                                <label for="province">Provinsi</label>
                                <select name="province" id="province"
                                    class="border rounded-lg py-2 w-full min-w-24 ps-2 text-gray-500 sm:mb-2">
                                    <option value="riau" {{ request('province', 'riau') == 'riau' ? 'selected' : '' }}>
                                        Riau
                                    </option>
                                </select>
                            </div>
                            <div class="w-full flex flex-col">
                                <label for="regency">Kabupaten/kota</label>
                                <select name="regency" id="regency"
                                    class="border rounded-lg py-2 w-full ps-2 text-gray-500 sm:mb-2">
                                    <option value="all" {{ $regencyParam === 'all' ? 'selected' : '' }}>Seluruhnya
                                    </option>
                                    @foreach ($regency as $item)
                                        <option value="{{ $item->regency_id }}"
                                            {{ $regencyParam === $item->regency_id ? 'selected' : '' }}>
                                            {{ $item->regency_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full flex flex-col">
                                <label for="status">Status</label>
                                <select name="status" id="status"
                                    class="border rounded-lg py-2 w-full min-w-36 ps-2 text-gray-500 sm:mb-2">
                                    <option value="all" {{ $statusParam === 'all' ? 'selected' : '' }}>Seluruhnya
                                    </option>
                                    <option value="disusun" {{ $statusParam === 'disusun' ? 'selected' : '' }}>
                                        Disusun</option>
                                    <option value="disahkan" {{ $statusParam === 'disahkan' ? 'selected' : '' }}>Disahkan
                                    </option>
                                </select>
                            </div>
                            <div class="w-full flex flex-col">
                                <label for="year">Tahun</label>
                                <select name="year" id="year"
                                    class="border rounded-lg py-2 w-full min-w-36 px-2 text-gray-500 sm:mb-2">
                                    <option value="all" {{ $yearParam === 'all' ? 'selected' : '' }}>Seluruhnya</option>
                                    @foreach ($years as $item)
                                        <option value="{{ $item }}" {{ $yearParam == $item ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Start Table -->
                    <div class="overflow-auto rounded-lg shadow border">
                        <table class="border-collapse w-full">
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="w-24 p-3 text-sm text-center font-semibold tracking-wide">
                                        Nomor
                                    </th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                        Dokumen
                                    </th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                        Kabupaten/Kota
                                    </th>
                                    <th class="w-40 p-3 text-sm font-semibold tracking-wide">
                                        Tanggal Rilis
                                    </th>
                                    <th class="w-40 p-3 text-sm text-center font-semibold tracking-wide">
                                        Status
                                    </th>
                                    <th class="w-40 p-3 text-sm text-center font-semibold tracking-wide">
                                        Unduh
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($ppkd as $index => $item)
                                    <tr class="bg-white">
                                        <td class="p-3 text-sm text-center text-gray-700 whitespace-nowrap">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                            {{ $item->title }}
                                        </td>
                                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                            {{ $item->regency_name }}
                                        </td>
                                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                            {{ indonesianDate($item->date) }}
                                        </td>
                                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                                            <span class="{{ $item->status === 'disahkan' ? 'bg-edyellow' : 'bg-edgreen' }} text-white !rounded-[10px] p-[4px]">{{ $item->status }}</span>
                                        </td>
                                        <td class="p-3 text-sm text-center text-blue-500 hover:underline whitespace-nowrap">
                                            <a target="_blank" href="{{ asset('storage/' . $item->file_path) }}">Unduh</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('#filterForm select').forEach(select => {
            console.log('sd');

            select.addEventListener('change', () => {
                const province = document.querySelector('[name="province"]').value;
                const regency = document.querySelector('[name="regency"]').value;
                const status = document.querySelector('[name="status"]').value;
                const year = document.querySelector('[name="year"]').value;

                const params = new URLSearchParams({
                    province,
                    regency,
                    status,
                    year
                });

                window.location.href = `${window.location.pathname}?${params.toString()}`;
            });
        });
    </script>
@endpush
