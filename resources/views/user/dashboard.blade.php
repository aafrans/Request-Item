@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10 p-6">
            @forelse ($items as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden p-3">
                    <!-- Gambar Kategori -->
                    <img src="{{ asset('storage/' . $item->kategori->image) }}" alt="{{ $item->kategori->name }}"
                        class="w-full h-48 object-contain">

                    <!-- Konten Card -->
                    <div class="p-4">
                        <!-- Nama Kategori -->
                        <h3 class="text-lg font-semibold text-gray-700">{{ $item->kategori->name }}</h3>

                        <!-- Menampilkan total stok berdasarkan kategori -->
                        @php
                            $totalStock = $countStock->where('kategori_id', $item->kategori_id)->first();
                        @endphp

                        @if ($totalStock)
                            <p>Total stok: {{ $totalStock->total_stock }}</p>
                        @else
                            <p>Total stok: Tidak tersedia</p>
                        @endif

                        <!-- Form Request Kategori -->
                        {{-- {{ route('request.store', $item->id) }} --}}
                        <form action="" method="POST">
                            @csrf
                            <div class="mt-4">
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah</label>
                                <input type="number" name="quantity" id="quantity" min="1" max="{{ $item->stock }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>

                            <!-- Tombol Request -->
                            <button type="submit"
                                class="block bg-blue-500 text-white text-center py-2 mt-4 rounded-lg hover:bg-blue-600 p-3">
                                Request Barang
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-3">
                    <p class="text-center text-gray-500">Tidak ada item yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
