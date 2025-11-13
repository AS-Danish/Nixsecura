<x-app-layout>
    <div class="max-w-3xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Edit Review</h1>
            <a href="{{ route('reviews.index') }}" class="text-blue-700 hover:text-blue-900 font-semibold">Back to Reviews</a>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <form action="{{ route('reviews.update', $review) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $review->name) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" required />
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Review Message <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900 resize-none" required>{{ old('message', $review->message) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Stars <span class="text-red-500">*</span></label>
                        <select name="stars" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" required>
                            @for($i=1; $i<=5; $i++)
                                <option value="{{ $i }}" @selected(old('stars', $review->stars) == $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">User Photo (optional)</label>
                        @if($review->image)
                            <div class="mb-3">
                                <img src="/{{ $review->image }}" alt="{{ $review->name }}" class="w-20 h-20 rounded-lg object-cover border" />
                            </div>
                        @endif
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-lg" />
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <a href="{{ route('reviews.index') }}" class="flex-1 bg-white hover:bg-gray-100 text-gray-700 font-semibold py-3.5 px-6 rounded-lg border border-gray-300 text-base transition-all text-center">Cancel</a>
                    <button type="submit" class="flex-1 bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-semibold py-3.5 px-6 rounded-lg text-base shadow-lg hover:shadow-xl transition-all">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>