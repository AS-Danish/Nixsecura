<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::latest()->get();
        return view('courses.index', compact('courses'));
    }

    public function create(): View
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'fees' => 'required|numeric|min:0',
            'modules' => 'required|integer|min:1',
            'contents' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // 2MB max
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/courses'), $imageName);
            $validated['image'] = 'uploads/courses/' . $imageName;
        }

        Course::create($validated);

        return response()->json(['success' => true, 'message' => 'Course created successfully']);
    }

    public function edit(Course $course): View
    {
        // Check if user is logged in and is admin
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        // Check if user is logged in and is admin
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'fees' => 'required|numeric|min:0',
            'modules' => 'required|integer|min:1',
            'contents' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image && file_exists(public_path($course->image))) {
                unlink(public_path($course->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/courses'), $imageName);
            $validated['image'] = 'uploads/courses/' . $imageName;
        }

        $course->update($validated);

        return response()->json(['success' => true, 'message' => 'Course updated successfully']);
    }

    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);
        // Delete image if exists
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        }

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}