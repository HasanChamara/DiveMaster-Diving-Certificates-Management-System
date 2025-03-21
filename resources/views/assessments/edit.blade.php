@extends('layouts.app')
@section('title', 'Edit Assessments')
@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold">Edit Assessment</h2>

    <form action="{{ route('assessments.update', $assessment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block">Title</label>
            <input type="text" name="title" value="{{ $assessment->title }}" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="border p-2 w-full" required>{{ $assessment->description }}</textarea>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2">Update</button>
    </form>
</div>
@endsection
