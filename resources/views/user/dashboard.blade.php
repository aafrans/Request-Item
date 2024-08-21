@extends('layouts.app')

@section('content')
<!-- Form Tambah Barang -->
<div class="w-full max-w-3xl mx-auto bg-white p-8 shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-bold mb-6 text-gray-900">Tambah Barang</h2>

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama Barang -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Barang</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror"
                   required>
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Spesifikasi -->
        <div class="mb-4">
            <label for="specifications" class="block text-sm font-medium text-gray-700">Spesifikasi</label>
            <textarea name="specifications" id="specifications"
                      class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('specifications') border-red-500 @enderror"
                      rows="3">{{ old('specifications') }}</textarea>
            @error('specifications')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kuantitas -->
        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Kuantitas</label>
            <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}"
                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('quantity') border-red-500 @enderror"
                   required>
            @error('quantity')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Stok -->
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('stock') border-red-500 @enderror"
                   required>
            @error('stock')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}"
                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('price') border-red-500 @enderror"
                   required>
            @error('price')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gambar -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
            <input type="file" name="image" id="image"
                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('image') border-red-500 @enderror">
            @error('image')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Tambah Barang
            </button>
        </div>
    </form>
</div>
@endsection
