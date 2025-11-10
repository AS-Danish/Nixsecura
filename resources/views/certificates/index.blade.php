<x-app-layout>
    <x-slot name="page-title">Certificates</x-slot>

    <!-- Certificates Section -->
    <div id="certificates" class="p-4 md:p-8 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 min-h-screen">
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
                    Certificate Management
                </h1>
                <p class="text-slate-600 text-base md:text-lg font-medium">Manage all your certificates and achievements</p>
            </div>
            <button 
                onclick="openAddCertificateModal()" 
                class="group relative bg-gradient-to-br from-blue-600 to-blue-800 text-white font-bold py-3.5 md:py-4 px-8 md:px-10 rounded-2xl transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 flex items-center gap-3 overflow-hidden text-sm md:text-base"
            >
                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                <svg class="w-5 h-5 md:w-6 md:h-6 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="relative z-10 p-5">Add New Certificate</span>
            </button>
        </div>

        <!-- Certificates Grid -->
        <div class="relative">
            @forelse($certificates as $certificate)
                @if($loop->first)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @endif
                
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
                    <!-- Certificate Image with Overlay -->
                    <div class="relative h-48 bg-gradient-to-br {{ $gradient['from'] }} {{ $gradient['to'] }} overflow-hidden">
                        @if($certificate->image && file_exists(public_path($certificate->image)))
                            <img src="{{ asset($certificate->image) }}" alt="{{ $certificate->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
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
                                Certificate
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-5">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2 line-clamp-1 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r {{ $gradient['from'] }} {{ $gradient['to'] }} transition-all">
                                {{ $certificate->title }}
                            </h3>
                            @if($certificate->organization)
                                <p class="text-slate-600 text-sm font-medium">{{ $certificate->organization }}</p>
                            @endif
                        </div>
                        
                        <div class="space-y-3 pb-5 border-b border-slate-200">
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center gap-2 text-slate-700">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br {{ $gradient['from'] }} {{ $gradient['to'] }} flex items-center justify-center shadow-sm">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium">Date</span>
                                </div>
                                <span class="font-bold {{ $gradient['icon'] }}">{{ $certificate->date->format('M d, Y') }}</span>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('certificates.edit', $certificate->id) }}" 
                               class="flex-1 group/btn bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-md hover:shadow-xl hover:scale-105 flex items-center justify-center gap-2"
                            >
                                <svg class="w-4 h-4 group-hover/btn:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this certificate? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full group/btn bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-md hover:shadow-xl hover:scale-105 flex items-center justify-center gap-2"
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
                
                @if($loop->last)
                    </div>
                @endif
            @empty
                <div class="flex items-center justify-center py-20">
                    <div class="text-center space-y-6">
                        <div class="space-y-2">
                            <p class="text-slate-900 text-2xl font-black">No certificates yet</p>
                            <p class="text-slate-500 text-base">Start by adding your first certificate</p>
                        </div>
                        <button 
                            onclick="openAddCertificateModal()"
                            class="group inline-flex items-center gap-3 bg-gradient-to-br from-blue-600 to-blue-800 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 overflow-hidden relative"
                        >
                            <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                            <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="relative z-10">Add Your First Certificate</span>
                        </button>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Add Certificate Modal -->
    <div id="addCertificateModal" 
         class="hidden fixed inset-0 z-50 overflow-hidden"
         onclick="if(event.target === this) closeAddCertificateModal()"
    >
        <!-- Backdrop with blur and dark overlay -->
        <div class="fixed inset-0 bg-black/70 backdrop-blur-sm transition-opacity modal-backdrop"></div>
        
        <!-- Modal Container -->
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-2xl transform transition-all modal-content" style="max-height: 90vh; height: auto;">
                
                <!-- Modal Header - Fixed -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-5 rounded-t-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div>
                                <h2 class="text-xl font-bold">Add New Certificate</h2>
                                <p class="text-blue-800 text-xs">Fill in the details to add a new certificate</p>
                            </div>
                        </div>
                        <button 
                            onclick="closeAddCertificateModal()" 
                            class="hover:bg-white/10 p-2 rounded-lg transition-colors"
                        >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Scrollable Content -->
                <div class="overflow-y-auto px-6 py-5" style="max-height: calc(90vh - 140px);">
                    <form id="addCertificateForm" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Certificate Title -->
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-slate-700 mb-2" for="title">
                                Certificate Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 focus:bg-white" 
                                   placeholder="Enter certificate title" 
                                   required>
                            <div id="titleError" class="text-red-500 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Certificate Date -->
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-slate-700 mb-2" for="date">
                                Certificate Date <span class="text-red-500">*</span>
                            </label>
                            <input type="date" 
                                   name="date" 
                                   id="date" 
                                   class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 focus:bg-white" 
                                   required>
                            <div id="dateError" class="text-red-500 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Certificate Organization -->
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-slate-700 mb-2" for="organization">
                                Certificate Organization (Optional)
                            </label>
                            <input type="text" 
                                   name="organization" 
                                   id="organization" 
                                   class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 focus:bg-white" 
                                   placeholder="Enter organization name (optional)">
                            <div id="organizationError" class="text-red-500 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Certificate Image -->
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-slate-700 mb-2" for="image">
                                Certificate Image
                            </label>
                            <div class="relative">
                                <input type="file" 
                                       name="image" 
                                       id="image" 
                                       accept="image/*"
                                       class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 focus:bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>
                            <div id="imageError" class="text-red-500 text-sm mt-1 hidden"></div>
                            <p class="text-xs text-slate-500 mt-1">Accepted formats: JPEG, PNG, JPG, GIF. Max size: 2MB</p>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer - Fixed -->
                <div class="bg-slate-50 px-6 py-4 rounded-b-xl border-t border-slate-200">
                    <div class="flex gap-3">
                        <button 
                            onclick="closeAddCertificateModal()" 
                            class="flex-1 px-6 py-3 border border-slate-300 text-slate-700 font-bold rounded-xl hover:bg-slate-100 transition-all duration-200"
                        >
                            Cancel
                        </button>
                        <button 
                            onclick="submitAddCertificateForm()" 
                            id="submitBtn"
                            class="flex-1 bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 shadow-md hover:shadow-xl hover:scale-105 flex items-center justify-center gap-2"
                        >
                            <span id="submitText">Add Certificate</span>
                            <svg id="submitSpinner" class="hidden w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }
        .fadeIn {
            animation: fadeIn 0.3s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .slideUpScale {
            animation: slideUpScale 0.3s ease-out;
        }
        @keyframes slideUpScale {
            from { 
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to { 
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        .line-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script>
        function openAddCertificateModal() {
            const modal = document.getElementById('addCertificateModal');
            const backdrop = modal.querySelector('.modal-backdrop');
            const content = modal.querySelector('.modal-content');
            
            modal.classList.remove('hidden');
            backdrop.classList.add('fadeIn');
            content.classList.add('slideUpScale');
            
            // Add blur effect to main content
            document.getElementById('certificates').style.filter = 'blur(4px)';
            
            // Reset form
            document.getElementById('addCertificateForm').reset();
            clearErrors();
        }

        function closeAddCertificateModal() {
            const modal = document.getElementById('addCertificateModal');
            modal.classList.add('hidden');
            
            // Remove blur effect
            document.getElementById('certificates').style.filter = 'none';
            
            // Reset form
            document.getElementById('addCertificateForm').reset();
            clearErrors();
        }

        function clearErrors() {
            const errorElements = document.querySelectorAll('[id$="Error"]');
            errorElements.forEach(element => {
                element.classList.add('hidden');
                element.textContent = '';
            });
        }

        function showError(fieldId, message) {
            const errorElement = document.getElementById(fieldId + 'Error');
            if (errorElement) {
                errorElement.textContent = message;
                errorElement.classList.remove('hidden');
            }
        }

        function submitAddCertificateForm() {
            const form = document.getElementById('addCertificateForm');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const submitSpinner = document.getElementById('submitSpinner');
            
            // Clear previous errors
            clearErrors();
            
            // Show loading state
            submitBtn.disabled = true;
            submitText.textContent = 'Adding...';
            submitSpinner.classList.remove('hidden');
            
            // Create FormData object
            const formData = new FormData(form);
            
            // Submit form via AJAX
            fetch('{{ route('certificates.store') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Close modal and reload page
                    closeAddCertificateModal();
                    window.location.reload();
                } else {
                    // Show error message
                    alert('Error: ' + (data.message || 'Something went wrong'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding the certificate');
            })
            .finally(() => {
                // Reset button state
                submitBtn.disabled = false;
                submitText.textContent = 'Add Certificate';
                submitSpinner.classList.add('hidden');
            });
        }

        // Close modal on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeAddCertificateModal();
            }
        });
    </script>
</x-app-layout>