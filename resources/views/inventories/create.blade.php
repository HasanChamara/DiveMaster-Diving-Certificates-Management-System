@extends('layouts.app')
@section('title', 'Inventories')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold">Add Inventory Item</h2>

    <form action="{{ route('inventories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" name="name" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Category</label>
            <input type="text" name="category" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Serial Number</label>
            <input type="text" name="serial_number" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Status</label>
            <input type="text" name="status" class="border p-2 w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Submit</button>
    </form>
</div>
@endsection
