@extends('layouts.app')

@section('content')
<div class="p-6 sm:ml-64">
    <!-- Header -->
    <div class="mb-6" style="margin-top: 50px;">
        <h1 class="text-3xl font-bold text-gray-900">Welcome to the Goods Request System</h1>
        <p class="text-gray-700 mt-2">Manage and request goods efficiently.</p>
    </div>

    <!-- Overview -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Overview</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-blue-100 p-4 rounded-lg shadow">
                <h3 class="text-xl font-bold text-blue-600">Total Requests</h3>
                <p class="text-gray-700 mt-2">150</p>
            </div>
            <div class="bg-green-100 p-4 rounded-lg shadow">
                <h3 class="text-xl font-bold text-green-600">Approved Requests</h3>
                <p class="text-gray-700 mt-2">120</p>
            </div>
            <div class="bg-red-100 p-4 rounded-lg shadow">
                <h3 class="text-xl font-bold text-red-600">Pending Requests</h3>
                <p class="text-gray-700 mt-2">30</p>
            </div>
        </div>
    </div>

    <!-- Item Cards -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Available Items</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Card 1 -->
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md">
                <img class="rounded-t-lg w-full h-48 object-cover" src="{{ asset('path_to_image_1.jpg') }}" alt="Item 1">
                <div class="p-5">
                    <h5 class="text-2xl font-bold text-gray-900 mb-2">Item 1</h5>
                    <p class="text-gray-700 mb-3">Description for Item 1.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                        View Details
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md">
                <img class="rounded-t-lg w-full h-48 object-cover" src="{{ asset('path_to_image_2.jpg') }}" alt="Item 2">
                <div class="p-5">
                    <h5 class="text-2xl font-bold text-gray-900 mb-2">Item 2</h5>
                    <p class="text-gray-700 mb-3">Description for Item 2.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                        View Details
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md">
                <img class="rounded-t-lg w-full h-48 object-cover" src="{{ asset('path_to_image_3.jpg') }}" alt="Item 3">
                <div class="p-5">
                    <h5 class="text-2xl font-bold text-gray-900 mb-2">Item 3</h5>
                    <p class="text-gray-700 mb-3">Description for Item 3.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                        View Details
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
