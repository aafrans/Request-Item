@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-200">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white flex-shrink-0">
        <div class="p-4">
            <h1 class="text-2xl font-semibold">Admin Dashboard</h1>
        </div>
        <nav class="mt-6">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
            <a href="{{ route('requests.index') }}" class="block px-4 py-2 hover:bg-gray-700">Requests</a>
            <a href="{{ route('items.index') }}" class="block px-4 py-2 hover:bg-gray-700">Items</a>
            <a href="{{ route('user.memos') }}" class="block px-4 py-2 hover:bg-gray-700">Memos</a>
            <!-- Add more links as needed -->
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <!-- Page Header -->
        <div class="mb-4">
            <h2 class="text-3xl font-semibold text-gray-800">Welcome to the Admin Dashboard</h2>
        </div>

        <!-- Content Area -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Card 1 -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-xl font-semibold mb-2">Card 1 Title</h3>
                <p class="text-gray-700 mb-4">Some details about card 1.</p>
                <a href="#" class="text-blue-500 hover:underline">View Details</a>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-xl font-semibold mb-2">Card 2 Title</h3>
                <p class="text-gray-700 mb-4">Some details about card 2.</p>
                <a href="#" class="text-blue-500 hover:underline">View Details</a>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <h3 class="text-xl font-semibold mb-2">Card 3 Title</h3>
                <p class="text-gray-700 mb-4">Some details about card 3.</p>
                <a href="#" class="text-blue-500 hover:underline">View Details</a>
            </div>
        </div>
    </div>
</div>
@endsection
