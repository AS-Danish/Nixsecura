<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index(): View
    {
        $certificates = Certificate::latest()->get();
        return view('certificates.index', compact('certificates'));
    }

    public function publicIndex(): View
    {
        $certificates = Certificate::latest()->get();
        return view('certificates.public-index', compact('certificates'));
    }

    public function publicShow(Certificate $certificate): View
    {
        return view('certificates.show', compact('certificate'));
    }

    public function create(): View
    {
        return view('certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'organization' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // 2MB max
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/certificates'), $imageName);
            $validated['image'] = 'uploads/certificates/' . $imageName;
        }

        Certificate::create($validated);

        return response()->json(['success' => true, 'message' => 'Certificate created successfully']);
    }

    public function edit(Certificate $certificate): View
    {
        // Check if user is logged in and is admin
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }
        return view('certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        // Check if user is logged in and is admin
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'organization' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($certificate->image && file_exists(public_path($certificate->image))) {
                unlink(public_path($certificate->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/certificates'), $imageName);
            $validated['image'] = 'uploads/certificates/' . $imageName;
        }

        $certificate->update($validated);

        // Redirect to certificates index instead of returning JSON
        return redirect()->route('certificates.index')
                         ->with('success', 'Certificate updated successfully!');
    }

    public function destroy(Certificate $certificate)
    {
        // Check if user is logged in and is admin
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized action.');
        }
        // Delete image if exists
        if ($certificate->image && file_exists(public_path($certificate->image))) {
            unlink(public_path($certificate->image));
        }

        $certificate->delete();

        return redirect()->route('certificates.index')->with('success', 'Certificate deleted successfully');
    }
}
