@props([
    'ppid'
])

<div
    class="ed-single-accordion-item bg-white border border-[#E5E5E5] rounded-[8px] py-[24px] xs:py-[15px] px-[30px] xs:px-[20px]">
    <div class="ed-single-accordion-item__header flex items-center justify-between cursor-pointer">
        <h3 class="ed-single-accordion-item__title font-semibold text-[20px] text-etBlack">
            {{ $ppid->name }}
        </h3>
        <span class="text-[15px]"><i class="fa-solid fa-angles-right"></i></span>
    </div>

    <div class="ed-single-accordion-item__body">
        <div class="overflow-auto rounded-lg">
            <table class="border-collapse w-full">
                <tbody class="divide-y divide-gray-100">
                    <tr class="bg-white">
                        <td class="w-48 p-3 text-sm text-gray-700 whitespace-nowrap">
                            Penganggung Jawab Pembuatan Informasi
                        </td>
                        <td class="p-3 text-sm text-gray-700 font-semibold whitespace-nowrap">
                            : {{ $ppid->responsible_person }}
                        </td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            Tahun Pembuatan/Penerbitan Informasi
                        </td>
                        <td class="p-3 text-sm text-gray-700 font-semibold whitespace-nowrap">
                            : Tahun {{ $ppid->year_of_publication }}
                        </td>
                    </tr>
                    <tr class="bg-white">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            Bentuk Informasi yang Tersedia
                        </td>
                        <td class="p-3 text-sm text-gray-700 font-semibold whitespace-nowrap">
                            : {{ $ppid->information_format }}
                        </td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            Jangka Waktu Penyimpanan
                        </td>
                        <td class="p-3 text-sm text-gray-700 font-semibold whitespace-nowrap">
                            : {{ $ppid->storage_duration }}
                        </td>
                    </tr>
                    {{-- <tr class="bg-white">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            Jenis Media yang Memuat Informasi
                        </td>
                        <td class="p-3 text-sm text-gray-700 font-semibold whitespace-nowrap">
                            <a href="#" class="font-bold text-blue-500 hover:underline">
                                :
                                https://ppid.jakarta.go.id/detail/keputusan-pihak-yang-berwenang</a>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
            <div class="p-3">
                <h4 class="font-semibold">File:</h4>
                <ul class="list-disc ml-4">
                    @foreach ($ppid->files as $item)
                        <li>
                            <a href="{{ asset('storage/'. $item->file_path) }}" class="text-sm text-blue-500 hover:underline">
                                {{ $item->file_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
