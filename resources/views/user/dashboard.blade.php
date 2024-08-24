@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Card 1 -->
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Total Permintaan</h5>
                <p class="mb-3 font-normal text-gray-700">Jumlah total permintaan yang telah Anda ajukan.</p>
                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                    Lihat Detail
                    <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 7.293a1 1 0 011.414 0L16 9.586a1 1 0 010 1.414l-2.293 2.293a1 1 0 01-1.414-1.414L13.586 10H6a1 1 0 010-2h7.586l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Permintaan Pending</h5>
                <p class="mb-3 font-normal text-gray-700">Permintaan yang saat ini masih dalam proses verifikasi.</p>
                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                    Lihat Detail
                    <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 7.293a1 1 0 011.414 0L16 9.586a1 1 0 010 1.414l-2.293 2.293a1 1 0 01-1.414-1.414L13.586 10H6a1 1 0 010-2h7.586l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Permintaan Ditolak</h5>
                <p class="mb-3 font-normal text-gray-700">Permintaan yang tidak disetujui dan telah ditolak.</p>
                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                    Lihat Detail
                    <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.293 7.293a1 1 0 011.414 0L16 9.586a1 1 0 010 1.414l-2.293 2.293a1 1 0 01-1.414-1.414L13.586 10H6a1 1 0 010-2h7.586l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
