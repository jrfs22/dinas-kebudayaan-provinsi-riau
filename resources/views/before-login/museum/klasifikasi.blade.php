@extends('layouting.guest.main')

@section('title', 'Klasifikasi')

@section('content')
    <x-card.guest.breadcrumb currentPage="Klasifikasi" />

    <section class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="flex items-start justify-center gap-[15px]">
                <h2 class="ed-section-title mb-[25px]">Klasifikasi Filologi</h2>
            </div>
            <!-- Start Table -->
            <div class="overflow-auto rounded-lg shadow border">
                <table class="border-collapse w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="w-36 p-3 text-sm font-semibold tracking-wide text-left">
                                ID
                            </th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                Nama
                            </th>
                            <th class="w-44 p-3 text-sm font-semibold tracking-wide text-left">
                                Status
                            </th>
                            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">
                                Jumlah Benda
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700">
                                <a href="#" class="font-bold text-blue-500 hover:underline">101010</a>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                Koleksi Antik
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <span
                                    class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-40">Benda</span>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">5</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="#" class="font-bold text-blue-500 hover:underline">101011</a>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                Koleksi Antik
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <span
                                    class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-40">Dokumen</span>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">5</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="#" class="font-bold text-blue-500 hover:underline">101012</a>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                Koleksi Antik
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <span
                                    class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 rounded-lg bg-opacity-40">Prasasti</span>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->
        </div>
    </section>
@endsection
