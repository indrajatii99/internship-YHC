@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold py-3 mb-2">Materi untuk {{ $course->title }}</h4>
    <a href="{{ route('courses.materials.create', $course->id) }}" class="btn btn-primary">Tambah Materi Baru</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="text-white">Title</th>
                <th class="text-white">Description</th>
                <th class="text-white">Embed Link</th>
                <th class="text-white">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($materials as $material)
                <tr>
                    <td>{{ $material->title }}</td>
                    <td>{{ $material->description }}</td>
                    <td><a href="{{ $material->embed_link }}" target="_blank">View</a></td>
                    <td>
                        <a href="{{ route('courses.materials.edit', [$course->id, $material->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('courses.materials.destroy', [$course->id, $material->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No materials found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
