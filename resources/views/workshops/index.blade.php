<x-app-layout>
    <x-slot name="page-title">Workshops</x-slot>

    <div id="workshops" class="p-4 md:p-8 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 min-h-screen">
        <div class="fixed inset-0 overflow-hidden pointer-events-none opacity-30">
            <div class="absolute top-0 left-0 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative mb-10 flex items-center justify-between flex-wrap gap-6">
            <div class="space-y-2">
                <h1 class="text-3xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600">
                    Workshop Management
                </h1>
                <p class="text-slate-600 text-base md:text-lg font-medium">Manage workshops: image, name, dates, location, topics</p>
            </div>
            @if(auth()->check() && auth()->user()->is_admin == 1)
            <button onclick="openAddWorkshopModal()" class="group inline-flex items-center gap-3 bg-gradient-to-br from-blue-600 to-blue-800 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 overflow-hidden relative">
                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                <span class="relative z-10">Add Workshop</span>
            </button>
            @endif
        </div>

        <div class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($workshops as $workshop)
                <div class="group bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all">
                    <div class="relative h-48 bg-gray-100">
                        @if($workshop->image)
                            <img src="/{{ $workshop->image }}" alt="{{ $workshop->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                        <div class="absolute top-3 left-3 bg-white/90 text-xs font-bold px-2 py-1 rounded">{{ \Carbon\Carbon::parse($workshop->start_date)->format('M d, Y') }}@if($workshop->end_date) - {{ \Carbon\Carbon::parse($workshop->end_date)->format('M d, Y') }}@endif</div>
                    </div>

                    <div class="p-5 space-y-3">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-gray-900">{{ $workshop->name }}</h3>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-700 rounded">{{ $workshop->location }}</span>
                        </div>
                        <p class="text-sm text-gray-700 line-clamp-2">{{ Str::limit($workshop->topics, 120) }}</p>
                        <div class="flex gap-3">
                            <a href="{{ route('workshops.edit', $workshop->id) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl text-center transition">Edit</a>
                            <form action="{{ route('workshops.destroy', $workshop->id) }}" method="POST" onsubmit="return confirm('Delete this workshop?')" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-xl transition">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center bg-white rounded-3xl p-10 border-2 border-dashed border-gray-200">
                    <p class="text-gray-600">No workshops found.</p>
                    @if(auth()->check() && auth()->user()->is_admin == 1)
                    <button onclick="openAddWorkshopModal()" class="mt-4 inline-flex items-center gap-3 bg-gradient-to-br from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-2xl transition shadow-lg hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        <span>Create Your First Workshop</span>
                    </button>
                    @endif
                </div>
            @endforelse
        </div>
    </div>

    @if(auth()->check() && auth()->user()->is_admin == 1)
    <!-- Add Workshop Modal -->
    <div id="addWorkshopModal" 
         class="hidden fixed inset-0 z-50 overflow-hidden"
         onclick="if(event.target === this) closeAddWorkshopModal()"
    >
        <!-- Backdrop with blur and dark overlay -->
        <div class="fixed inset-0 bg-black/70 backdrop-blur-sm transition-opacity modal-backdrop"></div>

        <!-- Modal Container -->
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-2xl transform transition-all modal-content" style="max-height: 90vh; height: auto;">
                <!-- Modal Header - Fixed -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-5 rounded-t-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-white">Create New Workshop</h2>
                            <p class="text-blue-200 text-xs">Fill in the details to add a new workshop</p>
                        </div>
                        <button 
                            onclick="closeAddWorkshopModal()" 
                            class="hover:bg-white/10 p-2 rounded-lg transition-colors"
                        >
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Scrollable Content -->
                <div class="overflow-y-auto px-6 py-5" style="max-height: calc(90vh - 140px);">
                    <form id="workshopForm" action="{{ route('workshops.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

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

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Workshop Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200" required />
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Location <span class="text-red-500">*</span></label>
                                    <input type="text" name="location" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Start Date <span class="text-red-500">*</span></label>
                                    <input type="date" name="start_date" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">End Date</label>
                                    <input type="date" name="end_date" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Topics Covered</label>
                                <textarea name="topics" rows="5" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 resize-none font-mono"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Workshop Image</label>
                                <input id="workshopImage" type="file" name="image" accept="image/*" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg" />
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Footer - Fixed -->
                <div class="border-t border-gray-200 bg-gray-50 px-6 py-4 flex gap-3 rounded-b-xl">
                    <button 
                        type="button" 
                        onclick="closeAddWorkshopModal()" 
                        class="flex-1 bg-white hover:bg-gray-100 text-gray-700 font-semibold py-3.5 px-6 rounded-lg border border-gray-300 text-base transition-all"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        form="workshopForm" 
                        class="flex-1 bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-semibold py-3.5 px-6 rounded-lg flex items-center justify-center gap-2 text-base shadow-lg hover:shadow-xl transition-all" 
                        id="submitWorkshopBtn"
                    >
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Create Workshop</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <style>
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
        @keyframes blob { 0% { transform: translate(0, 0) scale(1); } 33% { transform: translate(30px, -20px) scale(1.1); } 66% { transform: translate(-20px, 20px) scale(0.9); } 100% { transform: translate(0, 0) scale(1); } }
    </style>

    <script>
        function openAddWorkshopModal() {
            const modal = document.getElementById('addWorkshopModal');
            const mainContent = document.getElementById('workshops');
            modal.classList.remove('hidden');
            setTimeout(() => modal.classList.add('show'), 10);
            document.body.style.overflow = 'hidden';
            mainContent.style.filter = 'blur(4px)';
            mainContent.style.transition = 'filter 0.3s ease-out';
            document.getElementById('workshopForm').reset();
            document.getElementById('errorAlert').classList.add('hidden');
        }
        function closeAddWorkshopModal() {
            const modal = document.getElementById('addWorkshopModal');
            const mainContent = document.getElementById('workshops');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
                mainContent.style.filter = 'none';
            }, 300);
            document.getElementById('errorAlert').classList.add('hidden');
        }
        document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeAddWorkshopModal(); });
        document.getElementById('workshopForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = document.getElementById('submitWorkshopBtn');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>`;

            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
            })
            .then(response => { if (!response.ok) return response.json().then(err => { throw err; }); return response.json(); })
            .then(data => {
                if (data.success) { closeAddWorkshopModal(); setTimeout(() => location.reload(), 300); }
                else { showError(data.message || 'Error creating workshop'); submitBtn.disabled = false; submitBtn.innerHTML = originalText; }
            })
            .catch(error => {
                console.error('Error:', error);
                if (error.errors) {
                    const errorMessages = Object.values(error.errors).flat();
                    showErrors(errorMessages);
                } else {
                    showError(error.message || 'An error occurred. Please try again.');
                }
                submitBtn.disabled = false; submitBtn.innerHTML = originalText;
            });
        });
        function showError(message) { const alert = document.getElementById('errorAlert'); const list = document.getElementById('errorList'); list.innerHTML = `<li>${message}</li>`; alert.classList.remove('hidden'); alert.scrollIntoView({ behavior: 'smooth', block: 'nearest' }); }
        function showErrors(messages) { const alert = document.getElementById('errorAlert'); const list = document.getElementById('errorList'); list.innerHTML = messages.map(msg => `<li>${msg}</li>`).join(''); alert.classList.remove('hidden'); alert.scrollIntoView({ behavior: 'smooth', block: 'nearest' }); }
    </script>
</x-app-layout>