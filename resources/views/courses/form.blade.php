@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold py-3 mb-2">{{ isset($course) ? 'Edit Course' : 'Add New Course' }}</h4>

    <!-- Formulir Create/Edit Kursus -->
    <form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" method="POST">
        @csrf
        @if (isset($course))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $course->title ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $course->description ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $course->duration ?? '') }}" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">{{ isset($course) ? 'Update Course' : 'Add Course' }}</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection