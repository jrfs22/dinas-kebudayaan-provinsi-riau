@extends('layouting.guest.main')

@section('title', 'Klasifikasi')

@section('content')
    <x-card.guest.breadcrumb currentPage="Klasifikasi" />

    <section class="py-[120px] xl:py-[80px] md:py-[60px]">
        @foreach ($klasifikasiByCategory as $parentItem)
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <div class="flex items-start justify-center gap-[15px]">
                    <h2 class="ed-section-title mb-[25px]">{{ $parentItem->name }}</h2>
                </div>
                <!-- Start Table -->
                <div class="overflow-auto rounded-lg shadow border">
                    <table class="border-collapse w-full">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                    Nama Benda
                                </th>
                                <th class="w-44 p-3 text-sm font-semibold tracking-wide text-left">
                                    Jenis
                                </th>
                                <th class="w-44 p-3 text-sm font-semibold tracking-wide text-left">
                                    Jumlah Benda
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($parentItem->klasifikasi as $item)
                                <tr class="bg-white">
                                    <td class="p-3 text-sm text-gray-700">
                                        {{ $item->name }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                        <span
                                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-40">{{ $item->jenis }}</span>
                                    </td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $item->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->
            </div>
        @endforeach
    </section>
@endsection
