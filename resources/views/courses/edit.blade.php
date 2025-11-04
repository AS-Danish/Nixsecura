<x-app-layout>
    
    <x-slot name="page-title">Edit Course</x-slot>

    <div class="p-4 md:p-8 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 min-h-screen">
        <!-- Animated Background -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none opacity-30">
            <div class="absolute top-0 left-0 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
        </div>

        <!-- Header -->
        <div class="relative mb-8">
            <div class="flex items-center gap-4 mb-6">
                <a href="{{ route('courses.index') }}" 
                   class="group flex items-center gap-2 bg-white/80 backdrop-blur-sm hover:bg-white text-slate-700 font-semibold py-3 px-5 rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Back to Courses</span>
                </a>
            </div>
            
            <div class="space-y-2">
                <h1 class="text-3xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600">
                    Edit Course
                </h1>
                <p class="text-slate-600 text-base md:text-lg font-medium">Update course details and information</p>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="relative max-w-4xl mx-auto">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/60 overflow-hidden">
                
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
                    <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        Course Information
                    </h2>
                </div>

                <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    @method('PUT')

                    <!-- Error Alert -->
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-red-900 text-sm mb-1">Please fix the following errors:</h4>
                                    <ul class="text-red-700 text-sm space-y-1 list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Basic Information -->
                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-6">
                            <div class="w-8 h-8 rounded-lg bg-blue-600 text-white text-sm font-bold flex items-center justify-center">1</div>
                            <h3 class="text-xl font-bold text-gray-900">Basic Information</h3>
                        </div>
                        
                        <div class="space-y-5">
                            <!-- Course Name -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Course Name <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    value="{{ old('name', $course->name) }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" 
                                    required
                                >
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Description <span class="text-red-500">*</span>
                                </label>
                                <textarea 
                                    name="description" 
                                    rows="4" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900 resize-none" 
                                    required
                                >{{ old('description', $course->description) }}</textarea>
                            </div>

                            <!-- Current Image & Upload -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Course Image
                                </label>
                                
                                @if($course->image && file_exists(public_path($course->image)))
                                    <div class="mb-4">
                                        <p class="text-xs text-gray-600 mb-2 font-medium">Current Image:</p>
                                        <div class="relative inline-block">
                                            <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="h-40 w-auto rounded-lg border-2 border-gray-200 shadow-md">
                                            <div class="absolute -top-2 -right-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-full">Current</div>
                                        </div>
                                    </div>
                                @endif
                                
                                <div id="uploadSection">
                                    <input type="file" name="image" id="courseImage" accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden" onchange="previewImage(event)">
                                    <label 
                                        for="courseImage" 
                                        class="flex flex-col items-center justify-center w-full px-4 py-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 cursor-pointer transition-all bg-gray-50 hover:bg-blue-50"
                                    >
                                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-3">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <span class="text-blue-600 font-semibold text-sm mb-1">{{ $course->image ? 'Upload New Image' : 'Click to upload image' }}</span>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                    </label>
                                </div>
                                
                                <div id="imagePreview" class="hidden mt-3">
                                    <div class="relative rounded-lg overflow-hidden border border-gray-300">
                                        <img id="previewImg" src="" alt="Preview" class="w-full h-48 object-cover">
                                        <button 
                                            type="button" 
                                            onclick="removeImage()" 
                                            class="absolute top-2 right-2 bg-white hover:bg-red-50 text-red-600 p-2 rounded-lg shadow-md transition-all"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-xs text-green-600 mt-2 font-medium">✓ New image selected</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Course Details -->
                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-6">
                            <div class="w-8 h-8 rounded-lg bg-blue-600 text-white text-sm font-bold flex items-center justify-center">2</div>
                            <h3 class="text-xl font-bold text-gray-900">Course Details</h3>
                        </div>
                        
                        <div class="space-y-5">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <!-- Duration -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Duration (weeks) <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="number" 
                                        name="duration" 
                                        value="{{ old('duration', $course->duration) }}"
                                        min="1" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" 
                                        required
                                    >
                                </div>

                                <!-- Modules -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Total Modules <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="number" 
                                        name="modules" 
                                        value="{{ old('modules', $course->modules) }}"
                                        min="1" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" 
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Fees -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Course Fees <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-600 font-semibold">₹</span>
                                    <input 
                                        type="number" 
                                        name="fees" 
                                        value="{{ old('fees', $course->fees) }}"
                                        min="0" 
                                        step="0.01"
                                        class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" 
                                        required
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Curriculum -->
                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-6">
                            <div class="w-8 h-8 rounded-lg bg-blue-600 text-white text-sm font-bold flex items-center justify-center">3</div>
                            <h3 class="text-xl font-bold text-gray-900">Curriculum</h3>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Course Modules & Topics</label>
                            <textarea 
                                name="contents" 
                                rows="6" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900 resize-none font-mono text-sm"
                            >{{ old('contents', $course->contents) }}</textarea>
                            <p class="mt-2 text-xs text-gray-600 bg-blue-50 px-3 py-2 rounded-lg border border-blue-100">
                                💡 List course modules and topics (one per line)
                            </p>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('courses.index') }}" 
                           class="flex-1 bg-white hover:bg-gray-100 text-gray-700 font-semibold py-4 px-6 rounded-xl border border-gray-300 text-center transition-all shadow-sm hover:shadow-md">
                            Cancel
                        </a>
                        <button 
                            type="submit" 
                            class="flex-1 bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 shadow-lg hover:shadow-xl transition-all hover:scale-105"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Update Course</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            document.getElementById('courseImage').value = '';
            document.getElementById('imagePreview').classList.add('hidden');
        }
    </script>
</x-app-layout>