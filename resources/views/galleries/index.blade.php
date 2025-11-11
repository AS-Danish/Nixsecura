<x-app-layout>
    <x-slot name="page-title">Galleries</x-slot>

    <div class="p-4 md:p-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Gallery Management</h1>
            @auth
                @if(auth()->user()->is_admin == 1)
                    <button id="openAddModal" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow">
                        Add New Image
                    </button>
                @endif
            @endauth
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">{{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($galleries as $gallery)
                <div class="bg-white rounded-xl shadow border overflow-hidden">
                    <div class="relative">
                        @if($gallery->image && file_exists(public_path($gallery->image)))
                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-3">
                            <h3 class="text-white font-semibold">{{ $gallery->title }}</h3>
                        </div>
                    </div>
                    <div class="p-4 flex items-center gap-3">
                        @auth
                            @if(auth()->user()->is_admin == 1)
                                <a href="{{ route('galleries.edit', $gallery->id) }}" class="px-3 py-2 text-sm bg-indigo-600 hover:bg-indigo-700 text-white rounded-md">Edit</a>
                                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Delete this image?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-2 text-sm bg-red-600 hover:bg-red-700 text-white rounded-md">Delete</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="p-6 bg-white border rounded-xl text-center text-gray-600">No gallery images yet.</div>
                </div>
            @endforelse
        </div>

        @auth
        @if(auth()->user()->is_admin == 1)
        <!-- Add Modal -->
        <div id="addModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">
            <div class="bg-white w-full max-w-lg rounded-xl shadow-lg">
                <div class="flex items-center justify-between p-4 border-b">
                    <h2 class="font-bold text-lg">Add New Gallery Image</h2>
                    <button id="closeAddModal" class="text-gray-500 hover:text-gray-700">✕</button>
                </div>
                <form id="addGalleryForm" action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data" class="p-4 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title<span class="text-red-500">*</span></label>
                        <input type="text" name="title" class="w-full mt-1 px-3 py-2 border rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Image<span class="text-red-500">*</span></label>
                        <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif" class="w-full mt-1" required>
                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF up to 2MB</p>
                    </div>
                    <div class="flex items-center justify-end gap-2 pt-2">
                        <button type="button" id="cancelAdd" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">Save</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        @endauth
    </div>

    <script>
        const openBtn = document.getElementById('openAddModal');
        const modal = document.getElementById('addModal');
        const closeBtn = document.getElementById('closeAddModal');
        const cancelBtn = document.getElementById('cancelAdd');
        if (openBtn) {
            openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
        }
        if (closeBtn) {
            closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
        }
        if (cancelBtn) {
            cancelBtn.addEventListener('click', () => modal.classList.add('hidden'));
        }
        const form = document.getElementById('addGalleryForm');
        if (form) {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const data = new FormData(form);
                const resp = await fetch(form.action, { method: 'POST', body: data });
                if (resp.ok) {
                    window.location.reload();
                }
            });
        }
    </script>
</x-app-layout>