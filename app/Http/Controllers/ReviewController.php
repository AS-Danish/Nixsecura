<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderByDesc('created_at')->paginate(12);
        return view('reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        // Any authenticated user can create a review
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'stars' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $uploadDir = public_path('uploads/reviews');
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $imageName = time() . '_' . preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));
            $image->move($uploadDir, $imageName);
            $imagePath = 'uploads/reviews/' . $imageName;
        }

        $review = Review::create([
            'name' => $validated['name'],
            'message' => $validated['message'],
            'stars' => $validated['stars'],
            'image' => $imagePath,
        ]);

        return response()->json([
            'message' => 'Review created successfully',
            'review' => $review,
            'redirect' => route('reviews.index'),
        ], 201);
    }

    public function edit(Review $review)
    {
        if (!auth()->check() || auth()->user()->is_admin !== 1) {
            abort(403);
        }
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        if (!auth()->check() || auth()->user()->is_admin !== 1) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'stars' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($review->image && file_exists(public_path($review->image))) {
                @unlink(public_path($review->image));
            }
            $image = $request->file('image');
            $uploadDir = public_path('uploads/reviews');
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $imageName = time() . '_' . preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));
            $image->move($uploadDir, $imageName);
            $validated['image'] = 'uploads/reviews/' . $imageName;
        }

        $review->update($validated);
        return redirect()->route('reviews.index')->with('success', 'Review updated successfully');
    }

    public function destroy(Review $review)
    {
        if (!auth()->check() || auth()->user()->is_admin !== 1) {
            abort(403);
        }

        if ($review->image && file_exists(public_path($review->image))) {
            @unlink(public_path($review->image));
        }

        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully');
    }
}