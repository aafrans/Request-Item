@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Detail Permintaan</h1>

    <div class="mb-4">
        <strong>User ID:</strong> {{ $permintaan->user_id }}
    </div>
    <div class="mb-4">
        <strong>Item ID:</strong> {{ $permintaan->item_id }}
    </div>
    <div class="mb-4">
        <strong>Quantity:</strong> {{ $permintaan->quantity }}
    </div>
    <div class="mb-4">
        <strong>Status:</strong> {{ $permintaan->status }}
    </div>
    <div class="mb-4">
        <strong>Memo:</strong> {{ $permintaan->memo }}
    </div>
    <a href="{{ route('permintaan.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Kembali</a>
</div>
@endsection
