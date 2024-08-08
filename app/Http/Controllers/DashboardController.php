<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCourses = Course::count();
        $totalMaterials = Material::count();
        $recentCourses = Course::latest()->limit(5)->get();
        $courses = Course::with('materials')->get();
    
        return view('dashboard.index', compact('totalCourses', 'totalMaterials', 'recentCourses', 'courses'));
    }
    
}
