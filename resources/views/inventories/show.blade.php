@extends('layouts.app')
@section('title', 'Inventories')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold">Inventory Details</h2>

    <div class="mb-4">
        <strong>Name:</strong> {{ $inventory->name }}
    </div>
    <div class="mb-4">
        <strong>Category:</strong> {{ $inventory->category }}
    </div>
    <div class="mb-4">
        <strong>Serial Number:</strong> {{ $inventory->serial_number }}
    </div>
    <div class="mb-4">
        <strong>Status:</strong> {{ $inventory->status }}
    </div>

    <a href="{{ route('inventories.index') }}" class="bg-gray-500 text-white px-4 py-2">Back</a>
</div>
@endsection
