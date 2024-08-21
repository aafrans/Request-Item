@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('Dashboard') }}</h2>

            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{ __('Success') }}</strong>
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <p class="text-gray-700 dark:text-gray-300 mt-4">{{ __('You are logged in!') }}</p>
        </div>
    </div>
</div>
@endsection
