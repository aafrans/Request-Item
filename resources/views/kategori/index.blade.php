@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 mt-12">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Kategori List</h1>
        <a href="{{ route('kategori.create') }}"
           class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
           Create New Kategori
        </a>

        @if ($kategori->count())
            <ul class="mt-6 divide-y divide-gray-200">
                @foreach ($kategori as $item)
                    <li class="py-4 flex justify-between items-center">
                        <span class="text-lg">{{ $item->name }}</span>
                        <div class="flex space-x-4">
                            <a href="{{ route('kategori.edit', $item->id) }}"
                               class="text-blue-500 hover:text-blue-600">
                               Edit
                            </a>
                            <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-500 hover:text-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="mt-4 text-gray-600">No categories found.</p>
        @endif
    </div>
</div>
@endsection
