@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold py-3 mb-2">Data Kursus</h4>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Tambah Kursus Baru</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="text-white">Title</th>
                <th class="text-white">Description</th>
                <th class="text-white">Duration</th>
                <th class="text-white">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->duration }}</td>
                <td>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('courses.materials.index', $course->id) }}" class="btn btn-info">View Materials</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
