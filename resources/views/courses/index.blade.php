<x-app-layout>
    <x-slot name="page-title">Courses</x-slot>

    <!-- Courses Section -->
    <div id="courses" class="p-8 bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
        <!-- Header -->
        <div class="mb-8 flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-4xl font-black text-slate-900">Courses Management</h1>
                <p class="text-slate-500 mt-2">Manage all your courses and training programs</p>
            </div>
            <button onclick="openAddCourseModal()" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl transition shadow-lg hover:shadow-2xl hover:scale-105 flex items-center gap-2 whitespace-nowrap">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add New Course
            </button>
        </div>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($courses as $course)
                @php
                    $colors = ['from-blue-500 to-blue-600', 'from-emerald-500 to-emerald-600', 'from-purple-500 to-purple-600', 'from-amber-500 to-amber-600', 'from-rose-500 to-rose-600'];
                    $colorIndex = $loop->index % count($colors);
                    $colorClass = $colors[$colorIndex];
                    $colorName = ['text-blue-600', 'text-emerald-600', 'text-purple-600', 'text-amber-600', 'text-rose-600'][$colorIndex];
                @endphp
                <div class="bg-white rounded-2xl shadow-md border border-slate-200 hover:shadow-2xl transition duration-300 overflow-hidden group">
                    <div class="relative h-40 bg-gradient-to-br {{ $colorClass }} overflow-hidden">
                        <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition">
                            <div class="absolute inset-0 bg-pattern"></div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $course->name }}</h3>
                        <p class="text-slate-600 text-sm mb-4 line-clamp-2">{{ $course->description }}</p>
                        
                        <div class="space-y-3 mb-6 pb-6 border-b border-slate-200">
                            <div class="flex items-center text-sm text-slate-700">
                                <svg class="w-5 h-5 mr-3 {{ $colorName }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="font-semibold">Duration:</span>
                                <span class="ml-auto">{{ $course->duration }} Weeks</span>
                            </div>
                            <div class="flex items-center text-sm text-slate-700">
                                <svg class="w-5 h-5 mr-3 {{ $colorName }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="font-semibold">Fees:</span>
                                <span class="ml-auto text-emerald-600 font-bold">₹{{ number_format($course->fees) }}</span>
                            </div>
                            <div class="flex items-center text-sm text-slate-700">
                                <svg class="w-5 h-5 mr-3 {{ $colorName }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                <span class="font-semibold">Modules:</span>
                                <span class="ml-auto">{{ $course->modules ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('courses.edit', $course->id) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this course? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded-lg transition flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-2xl shadow-md border border-slate-200 p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-slate-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">No Courses Found</h3>
                    <p class="text-slate-600 mb-6">Start by creating your first course to get started.</p>
                    <button onclick="openAddCourseModal()" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition inline-flex items-center gap-2 hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add First Course
                    </button>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Add Course Modal -->
    <div id="addCourseModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" onclick="if(event.target === this) closeAddCourseModal()">
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-md max-h-[85vh] flex flex-col overflow-hidden">
            
            <!-- Scrollable Content Area -->
            <div class="flex-1 overflow-y-auto">
                <form id="courseForm" class="p-5" action="{{ route('courses.store') }}" method="POST">
                    @csrf

                    <!-- Error Alert -->
                    <div id="errorAlert" class="hidden bg-rose-50 border-l-4 border-rose-500 p-3 rounded mb-4">
                        <div class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-rose-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                            </svg>
                            <div>
                                <h4 class="font-semibold text-rose-800 text-sm">Please fix the following errors:</h4>
                                <ul id="errorList" class="text-rose-700 text-sm mt-1 space-y-1"></ul>
                            </div>
                        </div>
                    </div>

                    <!-- Basic Information -->
                    <div class="mb-5">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center text-sm font-bold">1</div>
                            <h3 class="text-base font-bold text-slate-900">Basic Information</h3>
                        </div>
                        
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-semibold text-slate-900 mb-1.5">
                                    Course Name <span class="text-rose-600">*</span>
                                </label>
                                <input type="text" name="name" placeholder="e.g., Ethical Hacking Fundamentals" class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-slate-900 placeholder-slate-400" required>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-900 mb-1.5">
                                    Description <span class="text-rose-600">*</span>
                                </label>
                                <textarea name="description" placeholder="Write a compelling description..." rows="2" class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-slate-900 placeholder-slate-400 resize-none" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Course Details -->
                    <div class="mb-5">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="w-6 h-6 rounded-full bg-emerald-600 text-white flex items-center justify-center text-sm font-bold">2</div>
                            <h3 class="text-base font-bold text-slate-900">Course Details</h3>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-900 mb-1.5">
                                        Duration (weeks) <span class="text-rose-600">*</span>
                                    </label>
                                    <input type="number" name="duration" placeholder="6" min="1" class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-slate-900" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-slate-900 mb-1.5">
                                        Modules <span class="text-rose-600">*</span>
                                    </label>
                                    <input type="number" name="modules" placeholder="12" min="1" class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-slate-900" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-900 mb-1.5">
                                    Course Fees (₹) <span class="text-rose-600">*</span>
                                </label>
                                <input type="number" name="fees" placeholder="5999" min="0" class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-slate-900" required>
                            </div>
                        </div>
                    </div>

                    <!-- Curriculum -->
                    <div class="mb-5">
                        <div class="flex items-center gap-2 mb-3">
                            <h3 class="text-base font-bold text-slate-900">Curriculum</h3>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-slate-900 mb-1.5">Course Modules & Topics</label>
                            <textarea name="contents" placeholder="List modules (one per line)&#10;&#10;Example:&#10;Introduction to Hacking&#10;Networking Basics&#10;Common Tools" rows="3" class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-slate-900 placeholder-slate-400 resize-none font-mono"></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer Buttons - Fixed, Always Visible -->
            <div class="bg-slate-50 border-t border-slate-200 px-5 py-4 flex gap-3 flex-shrink-0">
                <button type="button" onclick="closeAddCourseModal()" class="flex-1 bg-white hover:bg-slate-100 text-slate-700 font-bold py-3 px-5 rounded-lg transition border-2 border-slate-300 hover:border-slate-400 text-sm hover:scale-[1.02] active:scale-[0.98]">
                    Cancel
                </button>
                <button type="submit" form="courseForm" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded-lg transition shadow-lg hover:shadow-xl text-sm hover:scale-[1.02] active:scale-[0.98]" id="submitBtn">
                    Create Course
                </button>
            </div>
        </div>
    </div>

    <script>
        function openAddCourseModal() {
            document.getElementById('addCourseModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            document.getElementById('courseForm').reset();
        }

        function closeAddCourseModal() {
            document.getElementById('addCourseModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            document.getElementById('errorAlert').classList.add('hidden');
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeAddCourseModal();
        });

        document.getElementById('courseForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
            
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
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                if(data.success) {
                    closeAddCourseModal();
                    location.reload();
                } else {
                    showError(data.message || 'Error creating course');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showError('An error occurred. Please try again.');
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
    </script>
</x-app-layout>