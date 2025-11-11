<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::latest()->get();
        return view('galleries.index', compact('galleries'));
    }

    public function create(): View
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            if (!is_dir(public_path('uploads/galleries'))) {
                mkdir(public_path('uploads/galleries'), 0755, true);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . preg_replace('/[^A-Za-z0-9_\.-]/', '_', $image->getClientOriginalName());
            $image->move(public_path('uploads/galleries'), $imageName);
            $validated['image'] = 'uploads/galleries/' . $imageName;
        }

        Gallery::create($validated);

        return response()->json(['success' => true, 'message' => 'Gallery item created successfully']);
    }

    public function edit(Gallery $gallery): View
    {
        // Admin-only access for edits
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        // Admin-only access for updates
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }

            if (!is_dir(public_path('uploads/galleries'))) {
                mkdir(public_path('uploads/galleries'), 0755, true);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . preg_replace('/[^A-Za-z0-9_\.-]/', '_', $image->getClientOriginalName());
            $image->move(public_path('uploads/galleries'), $imageName);
            $validated['image'] = 'uploads/galleries/' . $imageName;
        }

        $gallery->update($validated);

        return redirect()->route('galleries.index')
                         ->with('success', 'Gallery item updated successfully!');
    }

    public function destroy(Gallery $gallery)
    {
        // Admin-only access for deletion
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }

        if ($gallery->image && file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }

        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery item deleted successfully');
    }
}