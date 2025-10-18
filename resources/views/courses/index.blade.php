<x-app-layout>
    <x-slot name="page-title">Courses</x-slot>

    <!-- Courses Section -->
    <div id="courses" class="p-8">
        <!-- Header -->
        <div class="mb-8 flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-4xl font-black text-gray-800">Courses Management</h1>
                <p class="text-gray-500 mt-2">Manage all your courses and training programs</p>
            </div>
            <button onclick="openAddCourseModal()" class="bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-8 rounded-xl transition shadow-lg hover:shadow-xl flex items-center gap-2 whitespace-nowrap">
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
                    $colors = ['from-blue-500 to-blue-700', 'from-green-500 to-green-700', 'from-purple-500 to-purple-700', 'from-orange-500 to-orange-700', 'from-red-500 to-red-700'];
                    $colorIndex = $loop->index % count($colors);
                    $colorClass = $colors[$colorIndex];
                    $colorName = ['text-blue-600', 'text-green-600', 'text-purple-600', 'text-orange-600', 'text-red-600'][$colorIndex];
                @endphp
                <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 hover:shadow-2xl transition duration-300 overflow-hidden group">
                    <div class="relative h-40 bg-gradient-to-br {{ $colorClass }} overflow-hidden">
                        <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition">
                            <div class="absolute inset-0 bg-pattern"></div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-black text-gray-800 mb-2">{{ $course->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $course->description }}</p>
                        
                        <div class="space-y-3 mb-6 pb-6 border-b border-gray-200">
                            <div class="flex items-center text-sm text-gray-700">
                                <svg class="w-5 h-5 mr-3 {{ $colorName }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="font-semibold">Duration:</span>
                                <span class="ml-auto">{{ $course->duration }} Weeks</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <svg class="w-5 h-5 mr-3 {{ $colorName }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="font-semibold">Fees:</span>
                                <span class="ml-auto text-green-600 font-bold">₹{{ number_format($course->fees) }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
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
                                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition flex items-center justify-center gap-2">
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
                <div class="col-span-full bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <h3 class="text-xl font-black text-gray-800 mb-2">No Courses Found</h3>
                    <p class="text-gray-600 mb-6">Start by creating your first course to get started.</p>
                    <button onclick="openAddCourseModal()" class="bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-2 px-6 rounded-lg transition inline-flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add First Course
                    </button>
                </div>
            @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Course Modal -->
    <div id="addCourseModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 sticky top-0 flex items-center justify-between">
                <h2 class="text-2xl font-black text-white">Add New Course</h2>
                <button onclick="closeAddCourseModal()" class="text-white hover:bg-white hover:bg-opacity-20 p-2 rounded-lg transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form class="p-8 space-y-5">
                <!-- Course Name -->
                <div>
                    <label class="block text-sm font-bold text-gray-800 mb-2">Course Name <span class="text-red-600">*</span></label>
                    <input type="text" placeholder="e.g., Ethical Hacking Fundamentals" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition text-gray-800">
                </div>

                <!-- Duration and Modules -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">Duration (Weeks) <span class="text-red-600">*</span></label>
                        <input type="number" placeholder="e.g., 6" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition text-gray-800">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-2">Number of Modules <span class="text-red-600">*</span></label>
                        <input type="number" placeholder="e.g., 12" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition text-gray-800">
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-bold text-gray-800 mb-2">Description <span class="text-red-600">*</span></label>
                    <textarea placeholder="Write a compelling course description..." rows="4" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition text-gray-800"></textarea>
                </div>

                <!-- Fees -->
                <div>
                    <label class="block text-sm font-bold text-gray-800 mb-2">Course Fees (₹) <span class="text-red-600">*</span></label>
                    <input type="number" placeholder="e.g., 5999" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition text-gray-800">
                </div>

                <!-- Course Contents -->
                <div>
                    <label class="block text-sm font-bold text-gray-800 mb-2">Course Contents/Modules</label>
                    <textarea placeholder="List course modules and topics (one per line)&#10;e.g.,&#10;Introduction to Hacking&#10;Networking Basics&#10;Tools & Techniques..." rows="4" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition text-gray-800"></textarea>
                </div>

                <!-- Form Actions -->
                <div class="flex gap-3 pt-6 border-t border-gray-200">
                    <button type="button" onclick="closeAddCourseModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-4 rounded-lg transition">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-4 rounded-lg transition shadow-lg hover:shadow-xl">
                        Create Course
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddCourseModal() {
            document.getElementById('addCourseModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeAddCourseModal() {
            document.getElementById('addCourseModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('addCourseModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeAddCourseModal();
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAddCourseModal();
            }
        });

        // Handle form submission
        document.querySelector('form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('{{ route("courses.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('Course created successfully!');
                    closeAddCourseModal();
                    location.reload();
                } else {
                    alert('Error creating course: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</x-app-layout>