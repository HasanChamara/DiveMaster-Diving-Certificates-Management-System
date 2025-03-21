@extends('layouts.app')
@section('title', 'Assessments')
@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold">Assessments</h2>
    <a href="{{ route('assessments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Assessment</a>

    <table class="w-full mt-4 border">
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($assessments as $assessment)
            <tr>
                <td class="border px-4 py-2">{{ $assessment->title }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('assessments.show', $assessment) }}" class="text-blue-500">View</a> |
                    <a href="{{ route('assessments.edit', $assessment) }}" class="text-green-500">Edit</a> |
                    <form action="{{ route('assessments.destroy', $assessment) }}" method="POST" class="inline">
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