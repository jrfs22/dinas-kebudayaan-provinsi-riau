@extends('layouting.guest.main')

@section('title', 'PPKD')

@section('content')
    <x-card.guest.breadcrumb currentPage="PPKD" />

    <section class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="flex-col items-start justify-center gap-[15px]">
                <!-- Filter Table -->
                <div class="border rounded-lg p-4 mb-6 flex">
                    <div class="flex sm:flex-col gap-x-3 w-full">
                        <div class="w-full flex flex-col">
                            <label for="">Provinsi</label>
                            <select name="provinsi" id=""
                                class="border rounded-lg py-2 w-full min-w-24 ps-2 text-gray-500 sm:mb-2">
                                <option value="1">Riau</option>
                            </select>
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="">Kabupaten/kota</label>
                            <select name="kabupaten-kota" id=""
                                class="border rounded-lg py-2 w-full ps-2 text-gray-500 sm:mb-2">
                                <option value="1">Kota Pekanbaru</option>
                            </select>
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="">Status</label>
                            <select name="status" id=""
                                class="border rounded-lg py-2 w-full min-w-36 ps-2 text-gray-500 sm:mb-2">
                                <option selected="">Pilih Status</option>
                                <option value="1">Disusun</option>
                                <option value="1">Disahkan</option>
                            </select>
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="">Tahun</label>
                            <select name="tahun" id=""
                                class="border rounded-lg py-2 w-full min-w-36 px-2 text-gray-500 sm:mb-2">
                                <option value="" selected="">Pilih Tahun</option>
                                <option value="1">2024</option>
                                <option value="1">2018</option>
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
                                <th class="w-40 p-3 text-sm text-center font-semibold tracking-wide">
                                    Jumlah File
                                </th>
                                <th class="w-40 p-3 text-sm text-center font-semibold tracking-wide">
                                    Unduh
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="bg-white">
                                <td class="p-3 text-sm text-center text-gray-700 whitespace-nowrap">
                                    1
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    Dokumen kinerja tahunan
                                </td>
                                <td class="p-3 text-sm text-center text-gray-700 whitespace-nowrap">
                                    5
                                </td>
                                <td class="p-3 text-sm text-center text-blue-500 hover:underline whitespace-nowrap">
                                    <a href="#">Unduh</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->
            </div>
        </div>
    </section>
@endsection
