<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Course;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(Course $course)
    {
        $materials = $course->materials;
        return view('materials.index', compact('course', 'materials'));
    }

    public function create(Course $course)
    {
        // Arahkan ke view yang sama untuk create dan edit
        return view('materials.form', ['course' => $course]);
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'embed_link' => 'required|url',
        ]);

        $course->materials()->create($request->all());

        return redirect()->route('courses.materials.index', $course->id)
                         ->with('success', 'Material added successfully.');
    }

    public function show(Course $course, Material $material)
    {
        return view('materials.show', compact('course', 'material'));
    }

    public function edit(Course $course, Material $material)
    {
        // Arahkan ke view yang sama untuk create dan edit
        return view('materials.form', ['course' => $course, 'material' => $material]);
    }

    public function update(Request $request, Course $course, Material $material)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'embed_link' => 'required|url',
        ]);

        $material->update($request->all());

        return redirect()->route('courses.materials.index', $course->id)
                         ->with('success', 'Material updated successfully.');
    }

    public function destroy(Course $course, Material $material)
    {
        $material->delete();

        return redirect()->route('courses.materials.index', $course->id)
                         ->with('success', 'Material deleted successfully.');
    }
}
