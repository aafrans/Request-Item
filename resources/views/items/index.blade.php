    @extends('layouts.app')

    @section('content')
    <div class="bg-gray-100 mt-10">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Items Section -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
                        <div class="w-full sm:w-auto mb-4 sm:mb-0">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">~Kategori</h1>
                            <p class="text-gray-600">Manage your inventory with ease</p>
                        </div>
                    </div>
                    <div class="create">
                        <a href="{{ route('kategori.index') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                            <i class="fas fa-plus mr-2"></i>List Kategori
                        </a>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8 mt-5">
                        @php
                            $categoryImages = [
                                'laptop' => 'laptop.jpg',
                                'smartphone' => 'smartphone.jpg',
                                'tablet' => 'tablet.jpg',
                                'accessory' => 'accessory.jpg',
                                'default' => 'default.jpg'
                            ];
                        @endphp

                        @foreach ($kategori as $kat)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 ease-in-out transform hover:scale-105">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        @php
                                            $imageName = $categoryImages[strtolower($kat->name)] ?? $categoryImages['default'];
                                        @endphp
                                        <img src="{{ asset('storage/' . $kat->image) }}" alt="{{ $kat->name }}" class="h-12 w-12 object-cover rounded-full mr-4">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">{{ $kat->name }}</h3>
                                            <p class="text-sm text-gray-600">Total Stock: <span class="font-bold text-blue-500">{{ $kat->items->sum('stock') }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $items->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-100 mt-10">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Items Section -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
                        <div class="w-full sm:w-auto mb-4 sm:mb-0">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">~Items</h1>
                            <p class="text-gray-600">Manage your inventory with ease</p>
                        </div>
                        <a href="{{ route('items.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                            <i class="fas fa-plus mr-2"></i> Add New Item
                        </a>
                    </div>
                    <div class="mb-8 mt-5">
                        <form action="{{ route('items.index') }}" method="GET" class="flex flex-col sm:flex-row items-center">
                            <div class="relative w-full sm:w-64 mb-4 sm:mb-0 sm:mr-4">
                                <select name="kategori_id"
                                    class="block w-full h-12 rounded-full border border-gray-300 bg-white text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                                    <option value="All">All Categories</option>
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}"
                                            {{ request('kategori_id') == $kat->id ? 'selected' : '' }}>
                                            {{ $kat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                                <i class="fas fa-filter mr-2"></i> Filter
                            </button>
                        </form>
                    </div>
                    <div class="bg-blue-100 rounded-lg p-3 mb-8">
                        <p class="text-xl text-blue-800 flex items-center font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            Total Unique Items: {{ $items->count() }}
                        </p>
                    </div>

                    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                            <thead>
                                <tr class="text-left">
                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Item
                                    </th>
                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Category
                                    </th>
                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Stock
                                    </th>
                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Price
                                    </th>
                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-800">
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800">
                                            {{ $item->kategori->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800">
                                            {{ $item->stock }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800">
                                            ${{ number_format($item->price, 2) }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800">
                                            <a href="{{ route('items.edit', $item->id) }}"
                                            class="text-blue-500 hover:text-blue-700">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $items->links('pagination::tailwind') }}

                </div>
            </div>
        </div>
    </div>
    @endsection

