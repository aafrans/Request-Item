@extends('layouts.app')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6 mt-10 bg-white p-4">
            <!-- Jumlah Permintaan -->
            <div class="bg-blue-100 p-4 shadow rounded-lg flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 12l7-7M3 12l7 7">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Jumlah Permintaan</h2>
                    <p class="text-xl font-bold text-blue-600">15</p>
                </div>
            </div>
            <!-- Permintaan Disetujui -->
            <div class="bg-green-100 p-4 shadow rounded-lg flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Approve</h2>
                    <p class="text-xl font-bold text-green-600">10</p>
                </div>
            </div>
            <!-- Permintaan Dalam Proses -->
            <div class="bg-yellow-100 p-4 shadow rounded-lg flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l2 2M12 4v2m4 8v2a1 1 0 001 1h4a1 1 0 001-1v-2m-8 0H4v2a1 1 0 001 1h4a1 1 0 001-1v-2">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Pending</h2>
                    <p class="text-xl font-bold text-yellow-600">3</p>
                </div>
            </div>
            <!-- Ditolak -->
            <div class="bg-red-100 p-4 shadow rounded-lg flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Ditolak</h2>
                    <p class="text-xl font-bold text-red-600">3</p>
                </div>
            </div>
        </div>

        <div class="mx-auto bg-white p-4 rounded-lg">
            <div class="bg-white p-4 shadow rounded-lg">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Formulir Persetujuan</h2>
                <form>
                    <label class="block mb-2 text-gray-600">ID Permintaan</label>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded mb-4" value="1" readonly>

                    <label class="block mb-2 text-gray-600">Status</label>
                    <select class="w-full p-2 border border-gray-300 rounded mb-4">
                        <option value="approved">Disetujui</option>
                        <option value="rejected">Ditolak</option>
                    </select>

                    <label class="block mb-2 text-gray-600">Catatan</label>
                    <textarea class="w-full p-2 border border-gray-300 rounded mb-4" rows="4"></textarea>

                    <button type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Kirim</button>
                </form>
            </div>
        </div>
        <div class="bg-white p-4 shadow rounded-lg mt-5">
            <h1 class="text-2xl font-bold mb-4 mt-5">Daftar Permintaan Barang</h1>

            @if (session('success'))
                <div class="bg-green-500 text-white p-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gray-200 shadow rounded-lg p-4">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">User</th>
                            <th class="px-4 py-2 text-left">Item</th>
                            <th class="px-4 py-2 text-left">Quantity</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $request->id }}</td>
                                <td class="px-4 py-2">{{ $request->user->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $request->item->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $request->quantity }}</td>
                                <td class="px-4 py-2">
                                    <span
                                        class="px-2 py-1 rounded
                                        @if ($request->status == 'requested') bg-yellow-500 text-white
                                        @elseif ($request->status == 'approved') bg-green-500 text-white
                                        @elseif ($request->status == 'rejected') bg-red-500 text-white
                                        @elseif ($request->status == 'in_process') bg-blue-500 text-white
                                        @elseif ($request->status == 'completed') bg-gray-500 text-white @endif">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.show', $request->id) }}"
                                        class="text-blue-500 hover:underline">Detail</a>
                                    <form action="{{ route('admin.approve', $request->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-green-500 hover:underline ml-2">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.reject', $request->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-red-500 hover:underline ml-2">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
