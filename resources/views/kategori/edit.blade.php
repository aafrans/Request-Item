@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 mt-20">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Edit Kategori</h1>
        <a href="{{ route('kategori.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-600">
            Back to List
        </a>
    </div>

    <!-- Form Edit Kategori -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Category Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $kategori->name) }}" class="form-input mt-1 block w-full @error('name') border-red-500 @enderror" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end space-x-2">
                <a href="{{ route('kategori.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-600">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
