@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 text-center">
            <h2 class="text-2xl font-bold mb-4">Access Denied</h2>
            <p class="text-lg mb-4">Your account does not have an assigned role yet.</p>
            <p class="text-sm text-gray-600 mb-6">Please contact the admin to assign a role to your account.</p>
            <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Return to Login
            </a>
        </div>
    </div>
</div>
@endsection
