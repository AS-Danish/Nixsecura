<x-app-layout>
    <x-slot name="page-title">Courses</x-slot>

    <!-- Courses Section -->
    <div id="courses" class="p-4 md:p-8 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 min-h-screen">
        <!-- Animated Background Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none opacity-30">
            <div class="absolute top-0 left-0 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
        </div>

        <!-- Header -->
        <div class="relative mb-10 flex items-center justify-between flex-wrap gap-6">
            <div class="space-y-2">
                <h1 class="text-3xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600">
                    Courses Management
                </h1>
                <p class="text-slate-600 text-base md:text-lg font-medium">Manage all your courses and training programs with ease</p>
            </div>
            <button 
                onclick="openAddCourseModal()" 
                class="group relative bg-gradient-to-br from-blue-600 to-blue-800  text-white font-bold py-3.5 md:py-4 px-8 md:px-10 rounded-2xl transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 flex items-center gap-3 overflow-hidden text-sm md:text-base"
            >
                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                <svg class="w-5 h-5 md:w-6 md:h-6 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="relative z-10 p-5">Add New Course</span>
            </button>
        </div>

        <!-- Courses Grid -->
        <div class="relative grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @forelse($courses as $course)
                @php
                    $gradients = [
                        ['from' => 'from-blue-500', 'to' => 'to-cyan-400', 'icon' => 'text-blue-600', 'badge' => 'bg-blue-100 text-blue-700'],
                        ['from' => 'from-emerald-500', 'to' => 'to-teal-400', 'icon' => 'text-emerald-600', 'badge' => 'bg-emerald-100 text-emerald-700'],
                        ['from' => 'from-purple-500', 'to' => 'to-pink-400', 'icon' => 'text-purple-600', 'badge' => 'bg-purple-100 text-purple-700'],
                        ['from' => 'from-amber-500', 'to' => 'to-orange-400', 'icon' => 'text-amber-600', 'badge' => 'bg-amber-100 text-amber-700'],
                        ['from' => 'from-rose-500', 'to' => 'to-pink-400', 'icon' => 'text-rose-600', 'badge' => 'bg-rose-100 text-rose-700']
                    ];
                    $colorIndex = $loop->index % count($gradients);
                    $gradient = $gradients[$colorIndex];
                @endphp
                <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg border border-white/60 hover:shadow-2xl transition-all duration-500 overflow-hidden hover:-translate-y-2">
                    <!-- Course Image with Overlay -->
                    <div class="relative h-48 bg-gradient-to-br {{ $gradient['from'] }} {{ $gradient['to'] }} overflow-hidden">
                        @if($course->image && file_exists(public_path($course->image)))
                            <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        @else
                            <div class="absolute inset-0">
                                <div class="absolute inset-0 opacity-20 group-hover:opacity-30 transition-opacity">
                                    <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <pattern id="grid-{{ $loop->index }}" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                                <circle cx="10" cy="10" r="1.5" fill="white" opacity="0.5"/>
                                            </pattern>
                                        </defs>
                                        <rect width="100" height="100" fill="url(#grid-{{ $loop->index }})"/>
                                    </svg>
                                </div>
                            </div>
                        @endif
                        
                        <!-- Floating Badge -->
                        <div class="absolute top-4 right-4">
                            <span class="{{ $gradient['badge'] }} px-3 py-1.5 rounded-full text-xs font-bold shadow-lg backdrop-blur-sm">
                                Featured
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-5">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2 line-clamp-1 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r {{ $gradient['from'] }} {{ $gradient['to'] }} transition-all">
                                {{ $course->name }}
                            </h3>
                            <p class="text-slate-600 text-sm leading-relaxed line-clamp-2">{{ $course->description }}</p>
                        </div>
                        
                        <div class="space-y-3 pb-5 border-b border-slate-200">
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center gap-2 text-slate-700">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br {{ $gradient['from'] }} {{ $gradient['to'] }} flex items-center justify-center shadow-sm">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium">Duration</span>
                                </div>
                                <span class="font-bold {{ $gradient['icon'] }}">{{ $course->duration }} Weeks</span>
                            </div>
                            
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center gap-2 text-slate-700">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-400 flex items-center justify-center shadow-sm">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium">Fees</span>
                                </div>
                                <span class="font-bold text-emerald-600 text-base">₹{{ number_format($course->fees) }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center gap-2 text-slate-700">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br {{ $gradient['from'] }} {{ $gradient['to'] }} flex items-center justify-center shadow-sm">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium">Modules</span>
                                </div>
                                <span class="font-bold {{ $gradient['icon'] }}">{{ $course->modules ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('courses.edit', $course->id) }}" 
                               class="flex-1 group/btn bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-md hover:shadow-xl hover:scale-105 flex items-center justify-center gap-2"
                            >
                                <svg class="w-4 h-4 group-hover/btn:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this course? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full group/btn bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-md hover:shadow-xl hover:scale-105 flex items-center justify-center gap-2"
                                >
                                    <svg class="w-4 h-4 group-hover/btn:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full fixed inset-0 flex items-center justify-center pointer-events-none">
                    <div class="text-center space-y-6 pointer-events-auto">
                        <div class="space-y-2">
                            <p class="text-slate-900 text-2xl font-black">No courses yet</p>
                            <p class="text-slate-500 text-base">Start by creating your first course</p>
                        </div>
                        <button 
                            onclick="openAddCourseModal()"
                            class="inline-flex items-center gap-3 bg-gradient-to-br from-blue-600 to-blue-800 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span>Create Your First Course</span>
                        </button>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Add Course Modal -->
    <!-- Modal -->
    <div id="addCourseModal" 
         class="hidden fixed inset-0 z-50 overflow-hidden"
         onclick="if(event.target === this) closeAddCourseModal()"
    >
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/60 transition-opacity modal-backdrop"></div>
        
        <!-- Modal Container -->
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-2xl transform transition-all modal-content" style="max-height: 90vh; height: auto;">
                
                <!-- Modal Header - Fixed -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-5 rounded-t-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold ">Create New Course</h2>
                                <p class="text-blue-800 text-xs">Fill in the details to add a new course</p>
                            </div>
                        </div>
                        <button 
                            onclick="closeAddCourseModal()" 
                            class=" p-2"
                        >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Scrollable Content -->
                <div class="overflow-y-auto px-6 py-5" style="max-height: calc(90vh - 140px);">
                    <form id="courseForm" onsubmit="handleSubmit(event)">
                        
                        <!-- Error Alert -->
                        <div id="errorAlert" class="hidden mb-5 bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-red-900 text-sm mb-1">Please fix the following errors:</h4>
                                    <ul id="errorList" class="text-red-700 text-xs space-y-1 list-disc list-inside"></ul>
                                </div>
                            </div>
                        </div>

                        <!-- Basic Information -->
                        <div class="mb-6">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="flex items-center justify-center w-6 h-6 rounded-lg bg-blue-600 text-white text-xs font-bold">1</div>
                                <h3 class="text-base font-bold text-gray-900">Basic Information</h3>
                            </div>
                            
                            <div class="space-y-4">
                                <!-- Course Name -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Course Name <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        placeholder="e.g., Full Stack Web Development" 
                                        class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" 
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
                                        placeholder="Provide a detailed description of the course..." 
                                        rows="3" 
                                        class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900 resize-none" 
                                        required
                                    ></textarea>
                                </div>

                                <!-- Image Upload -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Course Image
                                    </label>
                                    
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
                                            <span class="text-blue-600 font-semibold text-sm mb-1">Click to upload image</span>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                        </label>
                                    </div>
                                    
                                    <div id="imagePreview" class="hidden mt-3">
                                        <div class="relative rounded-lg overflow-hidden border border-gray-300">
                                            <img id="previewImg" src="" alt="Preview" class="w-full h-40 object-cover">
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Course Details -->
                        <div class="mb-6">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="flex items-center justify-center w-6 h-6 rounded-lg bg-blue-600 text-white text-xs font-bold">2</div>
                                <h3 class="text-base font-bold text-gray-900">Course Details</h3>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <!-- Duration -->
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            Duration (weeks) <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="number" 
                                            name="duration" 
                                            placeholder="6" 
                                            min="1" 
                                            class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" 
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
                                            placeholder="12" 
                                            min="1" 
                                            class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" 
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
                                            placeholder="5999" 
                                            min="0" 
                                            class="w-full pl-8 pr-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" 
                                            required
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Curriculum -->
                        <div class="mb-4">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="flex items-center justify-center w-6 h-6 rounded-lg bg-blue-600 text-white text-xs font-bold">3</div>
                                <h3 class="text-base font-bold text-gray-900">Curriculum</h3>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Course Modules & Topics</label>
                                <textarea 
                                    name="contents" 
                                    placeholder="List your course modules (one per line)&#10;&#10;Example:&#10;• Introduction to Programming&#10;• Data Structures & Algorithms&#10;• Web Development Basics&#10;• Database Management" 
                                    rows="5" 
                                    class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900 resize-none font-mono"
                                ></textarea>
                                <div class="mt-2 flex items-start gap-2 text-xs text-gray-600 bg-blue-50 px-3 py-2 rounded-lg border border-blue-100">
                                    <svg class="w-4 h-4 text-blue-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
                                    </svg>
                                    <span>Optional: Add a brief curriculum outline to help students understand the course structure</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Footer - Fixed -->
                <div class="border-t border-gray-200 bg-gray-50 px-6 py-4 flex gap-3 rounded-b-xl">
                    <button 
                        type="button" 
                        onclick="closeAddCourseModal()" 
                        class="flex-1 bg-white hover:bg-gray-100 text-gray-700 font-semibold py-3.5 px-6 rounded-lg border border-gray-300 text-base"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        form="courseForm" 
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 px-6 rounded-lg flex items-center justify-center gap-2 text-base" 
                        id="submitBtn"
                    >
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Create Course</span>
                    </button>
                </div>
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

        #addCourseModal.show .modal-backdrop {
            animation: fadeIn 0.3s ease-out forwards;
        }

        #addCourseModal.show .modal-content {
            animation: slideUpScale 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUpScale {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script>
        function openAddCourseModal() {
            const modal = document.getElementById('addCourseModal');
            modal.classList.remove('hidden');
            setTimeout(() => modal.classList.add('show'), 10);
            document.body.style.overflow = 'hidden';
            document.getElementById('courseForm').reset();
            document.getElementById('uploadSection').classList.remove('hidden');
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('errorAlert').classList.add('hidden');
        }

        function closeAddCourseModal() {
            const modal = document.getElementById('addCourseModal');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
            document.getElementById('errorAlert').classList.add('hidden');
        }

        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('uploadSection').classList.add('hidden');
                    document.getElementById('imagePreview').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            document.getElementById('courseImage').value = '';
            document.getElementById('uploadSection').classList.remove('hidden');
            document.getElementById('imagePreview').classList.add('hidden');
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeAddCourseModal();
        });

        document.getElementById('courseForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            `;
            
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => {
                        throw err;
                    });
                }
                return response.json();
            })
            .then(data => {
                if(data.success) {
                    closeAddCourseModal();
                    setTimeout(() => location.reload(), 300);
                } else {
                    showError(data.message || 'Error creating course');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (error.errors) {
                    const errorMessages = Object.values(error.errors).flat();
                    showErrors(errorMessages);
                } else {
                    showError(error.message || 'An error occurred. Please try again.');
                }
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
        });

        function showError(message) {
            const errorAlert = document.getElementById('errorAlert');
            const errorList = document.getElementById('errorList');
            errorList.innerHTML = `<li>${message}</li>`;
            errorAlert.classList.remove('hidden');
            errorAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        function showErrors(messages) {
            const errorAlert = document.getElementById('errorAlert');
            const errorList = document.getElementById('errorList');
            errorList.innerHTML = messages.map(msg => `<li>${msg}</li>`).join('');
            errorAlert.classList.remove('hidden');
            errorAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    </script>
</x-app-layout>