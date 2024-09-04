@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Permintaan</h1>
    <a href="{{ route('requests.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded">Tambah Permintaan</a>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permintaans as $permintaan)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $permintaan->user_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permintaan->item_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permintaan->quantity }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permintaan->status }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('requests.show', $permintaan) }}" class="text-blue-600 hover:text-blue-900">Lihat</a>
                        <a href="{{ route('requests.edit', $permintaan) }}" class="text-yellow-600 hover:text-yellow-900 ml-4">Edit</a>
                        <form action="{{ route('request.destroy', $permintaan) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('content')
<div class="p-4 sm:ml-64" style="margin-top: 50px;">
    <h2 class="text-2xl font-bold mb-6 text-gray-900">create Requeats</h2>
</div>
@endsection
