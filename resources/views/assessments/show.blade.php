@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold">{{ $assessment->title }}</h2>
    <p>{{ $assessment->description }}</p>
    <a href="{{ route('assessments.index') }}" class="bg-gray-500 text-white px-4 py-2">Back</a>
</div>
@endsection
