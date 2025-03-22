@extends('layouts.app')
@section('title', 'Inventories')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold">Inventories</h2>
    <a href="{{ route('inventories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Inventory Item</a>

    <table class="w-full mt-4 border">
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Category</th>
            <th class="border px-4 py-2">Serial Number</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($inventories as $inventory)
            <tr>
                <td class="border px-4 py-2">{{ $inventory->name }}</td>
                <td class="border px-4 py-2">{{ $inventory->category }}</td>
                <td class="border px-4 py-2">{{ $inventory->serial_number }}</td>
                <td class="border px-4 py-2">{{ $inventory->status }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('inventories.show', $inventory) }}" class="text-blue-500">View</a> |
                    <a href="{{ route('inventories.edit', $inventory) }}" class="text-green-500">Edit</a> |
                    <form action="{{ route('inventories.destroy', $inventory) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
