@extends('layouts.app')

@section('content')
<div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700" style="margin-top: 70px;">
    <div class="container mx-auto">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Dashboard User</h2>

        <!-- Message Section -->
        @if (session('status'))
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 p-4 rounded">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 p-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- User Data -->
        <div class="mt-6">
            <h3 class="text-xl font-medium text-gray-900 dark:text-white">Welcome, {{ auth()->user()->name }}!</h3>

            <!-- Display some user-specific data -->
            <div class="mt-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                <p class="text-gray-700 dark:text-gray-300">Here you can manage your requests and view the status of your items.</p>
            </div>

            <!-- Card Slider -->
            <div class="mt-6 relative">
                <div class="overflow-hidden">
                    <div id="slider" class="flex transition-transform duration-300 ease-in-out">
                        @foreach ($items as $item)
                            <div class="flex-shrink-0 w-64 mx-2">
                                <div class="bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-lg shadow-md p-4">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item->name }}</h4>
                                    <p class="text-gray-600 dark:text-gray-400">Category: {{ $item->category->name ?? 'N/A' }}</p>
                                    <p class="text-gray-600 dark:text-gray-400">Stock: {{ $item->stock }}</p>
                                    <a href="{{ route('request.create', $item->id) }}" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                                        Request Item
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white dark:bg-gray-800 p-2 rounded-full shadow">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white dark:bg-gray-800 p-2 rounded-full shadow">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
