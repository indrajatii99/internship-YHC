@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold py-3 mb-2">{{ isset($material) ? 'Edit Material' : 'Add New Material' }}</h4>

    <!-- Formulir Create/Edit Materi -->
    <form action="{{ isset($material) ? route('courses.materials.update', [$course->id, $material->id]) : route('courses.materials.store', $course->id) }}" method="POST">
        @csrf
        @if (isset($material))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $material->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description', $material->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="embed_link" class="form-label">Embed Link</label>
            <input type="url" id="embed_link" name="embed_link" class="form-control" value="{{ old('embed_link', $material->embed_link ?? '') }}" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">{{ isset($material) ? 'Update Material' : 'Add Material' }}</button>
            <a href="{{ route('courses.materials.index', $course->id) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
