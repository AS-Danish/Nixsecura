<x-app-layout>
    <x-slot name="page-title">Edit Gallery Image</x-slot>

    <div class="p-4 md:p-8">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('galleries.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">Back to Gallery</a>
        </div>

        <div class="max-w-3xl mx-auto bg-white rounded-xl border shadow">
            <div class="px-6 py-4 border-b">
                <h2 class="text-xl font-bold">Update Gallery Item</h2>
            </div>
            <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="p-4 bg-red-50 border border-red-200 rounded-md">
                        <ul class="list-disc list-inside text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label class="block text-sm font-medium text-gray-700">Title<span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $gallery->title) }}" class="w-full mt-1 px-3 py-2 border rounded-md" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Current Image</label>
                    @if($gallery->image && file_exists(public_path($gallery->image)))
                        <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="h-40 w-auto rounded-md border">
                    @else
                        <p class="text-sm text-gray-500">No image available</p>
                    @endif
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Upload New Image</label>
                    <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif" class="w-full mt-1">
                    <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF up to 2MB</p>
                </div>

                <div class="flex items-center justify-end gap-2">
                    <a href="{{ route('galleries.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>