<!-- resources/views/kategori/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen mt-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 sm:p-8">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-semibold">Kategori List</h1>
                        <!-- Button to open the modal -->
                        <button id="openModalBtn"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600">
                            Create New Kategori
                        </button>
                    </div>

                    @if ($kategori->count())
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category Name
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($kategori as $category)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $category->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-4">
                                                <a href="{{ route('kategori.edit', $category->id) }}"
                                                    class="text-blue-500 hover:text-blue-600">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </a>
                                                <form action="{{ route('kategori.destroy', $category->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-600">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-600">No categories found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-semibold mb-4">Create Kategori</h2>
            <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Category Name</label>
                    <input type="text" name="name" id="name"
                        class="form-input mt-1 block w-full @error('name') border-red-500 @enderror" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-6 mb-4">
                    <label class="block text-sm font-medium text-gray-700">Item Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end space-x-2 pt-2">
                    <button type="button" id="closeModalBtn"
                        class="bg-gray-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Script -->
    <script>
        document.getElementById('openModalBtn').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
        });
        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });
    </script>
@endsection
