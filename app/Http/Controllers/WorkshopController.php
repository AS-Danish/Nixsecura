<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkshopController extends Controller
{
    public function index(): View
    {
        $workshops = Workshop::latest()->get();
        return view('workshops.index', compact('workshops'));
    }

    public function create(): View
    {
        return view('workshops.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'topics' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (!is_dir(public_path('uploads/workshops'))) {
                mkdir(public_path('uploads/workshops'), 0755, true);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . preg_replace('/[^A-Za-z0-9_\.-]/', '_', $image->getClientOriginalName());
            $image->move(public_path('uploads/workshops'), $imageName);
            $validated['image'] = 'uploads/workshops/' . $imageName;
        }

        Workshop::create($validated);

        return response()->json(['success' => true, 'message' => 'Workshop created successfully']);
    }

    public function edit(Workshop $workshop): View
    {
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }
        return view('workshops.edit', compact('workshop'));
    }

    public function update(Request $request, Workshop $workshop)
    {
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'topics' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($workshop->image && file_exists(public_path($workshop->image))) {
                unlink(public_path($workshop->image));
            }

            if (!is_dir(public_path('uploads/workshops'))) {
                mkdir(public_path('uploads/workshops'), 0755, true);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . preg_replace('/[^A-Za-z0-9_\.-]/', '_', $image->getClientOriginalName());
            $image->move(public_path('uploads/workshops'), $imageName);
            $validated['image'] = 'uploads/workshops/' . $imageName;
        }

        $workshop->update($validated);

        return redirect()->route('workshops.index')
                         ->with('success', 'Workshop updated successfully!');
    }

    public function destroy(Workshop $workshop)
    {
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }
        if ($workshop->image && file_exists(public_path($workshop->image))) {
            unlink(public_path($workshop->image));
        }

        $workshop->delete();

        return redirect()->route('workshops.index')->with('success', 'Workshop deleted successfully');
    }
}