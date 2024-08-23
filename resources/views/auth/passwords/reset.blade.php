@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4 text-lg font-semibold text-gray-700">
                {{ __('Reset Password') }}
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">
                        {{ __('Email Address') }}
                    </label>
                    <input id="email" type="email" class="w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror focus:outline-none focus:border-blue-500" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-2">
                        {{ __('Password') }}
                    </label>
                    <input id="password" type="password" class="w-full px-4 py-2 border rounded-lg @error('password') border-red-500 @enderror focus:outline-none focus:border-blue-500" name="password" required autocomplete="new-password">

                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="block text-gray-700 text-sm font-medium mb-2">
                        {{ __('Confirm Password') }}
                    </label>
                    <input id="password-confirm" type="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
