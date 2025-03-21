@extends('layouts.app')
@section('title', 'Create new Assessment')
@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold">Add Assessment</h2>

    <form action="{{ route('assessments.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block">Title</label>
            <input type="text" name="title" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="border p-2 w-full" required></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Submit</button>
    </form>
</div>
@endsection
