<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogs = Blog::latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    public function create(): View
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // 2MB max
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs'), $imageName);
            $validated['image'] = 'uploads/blogs/' . $imageName;
        }

        Blog::create($validated);

        return response()->json(['success' => true, 'message' => 'Blog created successfully']);
    }

    public function edit(Blog $blog): View
    {
        // Check if user is logged in and is admin
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        // Check if user is logged in and is admin
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs'), $imageName);
            $validated['image'] = 'uploads/blogs/' . $imageName;
        }

        $blog->update($validated);

        // Redirect to blogs index instead of returning JSON
        return redirect()->route('blogs.index')
                         ->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        // Check if user is logged in and is admin
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }
        // Delete image if exists
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }
}
