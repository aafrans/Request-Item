@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Permintaan</h1>

    <form action="{{ route('permintaan.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
            <input type="number" name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('user_id') }}">
            @error('user_id')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="item_id" class="block text-sm font-medium text-gray-700">Item ID</label>
            <input type="number" name="item_id" id="item_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('item_id') }}">
            @error('item_id')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('quantity') }}" required>
            @error('quantity')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="">Pilih Status</option>
                <option value="cek_spek">Cek Spek</option>
                <option value="cek_stok">Cek Stok</option>
                <option value="user_memo">User Memo</option>
                <option value="it_beli">IT Beli</option>
                <option value="it_info">IT Info</option>
            </select>
            @error('status')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="memo" class="block text-sm font-medium text-gray-700">Memo</label>
            <textarea name="memo" id="memo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('memo') }}</textarea>
            @error('memo')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
    </form>
</div>
@endsection
