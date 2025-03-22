@extends('layouts.app')
@section('title', 'Inventories')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold">Edit Inventory Item</h2>

    <form action="{{ route('inventories.update', $inventory) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" name="name" value="{{ $inventory->name }}" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Category</label>
            <input type="text" name="category" value="{{ $inventory->category }}" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Serial Number</label>
            <input type="text" name="serial_number" value="{{ $inventory->serial_number }}" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Status</label>
            <input type="text" name="status" value="{{ $inventory->status }}" class="border p-2 w-full" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2">Update</button>
    </form>
</div>
@endsection
