<x-app-layout>
    <div id="reviews" class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Reviews Management</h1>
                <p class="text-sm text-gray-600">Manage customer reviews: name, message, stars, and photo</p>
            </div>
            @if(auth()->check())
            <button onclick="openAddReviewModal()" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold px-5 py-2.5 rounded-lg shadow">
                Add Review
            </button>
            @endif
        </div>

        <!-- Reviews Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($reviews as $review)
                <div class="bg-white rounded-xl shadow hover:shadow-md transition p-5">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                            @if($review->image)
                                <img src="/{{ $review->image }}" alt="{{ $review->name }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118 6m-6 11a6 6 0 100-12 6 6 0 000 12z"/></svg>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $review->name }}</h3>
                                <div class="flex items-center gap-1">
                                    @for($i=1; $i<=5; $i++)
                                        @if($i <= $review->stars)
                                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.802 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.802-2.034a1 1 0 00-1.176 0l-2.802 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.88 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @else
                                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.802 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.802-2.034a1 1 0 00-1.176 0l-2.802 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.88 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <p class="text-sm text-gray-700 mt-1">{{ Str::limit($review->message, 120) }}</p>
                        </div>
                    </div>

                    @if(auth()->check() && auth()->user()->is_admin == 1)
                    <div class="mt-4 flex items-center justify-end gap-2">
                        <a href="{{ route('reviews.edit', $review) }}" class="text-blue-700 hover:text-blue-900 text-sm font-semibold">Edit</a>
                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Delete this review?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">Delete</button>
                        </form>
                    </div>
                    @endif
                </div>
            @empty
                <div class="col-span-3">
                    <div class="bg-white rounded-xl shadow p-10 text-center text-gray-600">No reviews yet</div>
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $reviews->links() }}
        </div>
    </div>

    @if(auth()->check())
    <!-- Add Review Modal -->
    <div id="addReviewModal" class="hidden fixed inset-0 z-50 overflow-hidden" onclick="if(event.target === this) closeAddReviewModal()">
        <div class="fixed inset-0 bg-black/70 backdrop-blur-sm modal-backdrop"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-2xl transform transition-all modal-content" style="max-height: 90vh;">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-5 rounded-t-xl">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-white">Create New Review</h2>
                        <button onclick="closeAddReviewModal()" class="hover:bg-white/10 p-2 rounded-lg transition-colors">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>

                <div class="overflow-y-auto px-6 py-5" style="max-height: calc(90vh - 140px);">
                    <form id="reviewForm" action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div id="errorAlert" class="hidden mb-5 bg-red-50 border border-red-200 rounded-lg p-4">
                            <h4 class="font-semibold text-red-900 text-sm mb-1">Please fix the following errors:</h4>
                            <ul id="errorList" class="text-red-700 text-xs space-y-1 list-disc list-inside"></ul>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200" required />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Review Message <span class="text-red-500">*</span></label>
                                <textarea name="message" rows="5" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 resize-none"></textarea>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Stars <span class="text-red-500">*</span></label>
                                    <select name="stars" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200" required>
                                        @for($i=1; $i<=5; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">User Photo (optional)</label>
                                    <input id="reviewImage" type="file" name="image" accept="image/*" class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="border-t border-gray-200 bg-gray-50 px-6 py-4 flex gap-3 rounded-b-xl">
                    <button type="button" onclick="closeAddReviewModal()" class="flex-1 bg-white hover:bg-gray-100 text-gray-700 font-semibold py-3.5 px-6 rounded-lg border border-gray-300 text-base transition-all">Cancel</button>
                    <button type="submit" form="reviewForm" class="flex-1 bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-semibold py-3.5 px-6 rounded-lg flex items-center justify-center gap-2 text-base shadow-lg hover:shadow-xl transition-all" id="submitReviewBtn">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Create Review</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        function openAddReviewModal() {
            const modal = document.getElementById('addReviewModal');
            const mainContent = document.getElementById('reviews');
            modal.classList.remove('hidden');
            setTimeout(() => modal.classList.add('show'), 10);
            document.body.style.overflow = 'hidden';
            mainContent.style.filter = 'blur(4px)';
            mainContent.style.transition = 'filter 0.3s ease-out';
            document.getElementById('reviewForm').reset();
            document.getElementById('errorAlert').classList.add('hidden');
        }
        function closeAddReviewModal() {
            const modal = document.getElementById('addReviewModal');
            const mainContent = document.getElementById('reviews');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
                mainContent.style.filter = 'none';
            }, 300);
            document.getElementById('errorAlert').classList.add('hidden');
        }

        const reviewForm = document.getElementById('reviewForm');
        const submitReviewBtn = document.getElementById('submitReviewBtn');
        if (reviewForm && submitReviewBtn) {
            reviewForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                submitReviewBtn.disabled = true;
                submitReviewBtn.classList.add('opacity-75');
                const formData = new FormData(reviewForm);
                try {
                    const response = await fetch(reviewForm.action, {
                        method: 'POST',
                        headers: { 'X-Requested-With': 'XMLHttpRequest' },
                        body: formData
                    });
                    const data = await response.json();
                    if (!response.ok) {
                        const errors = data.errors || {};
                        const errorList = document.getElementById('errorList');
                        errorList.innerHTML = '';
                        Object.keys(errors).forEach(key => {
                            errors[key].forEach(msg => {
                                const li = document.createElement('li');
                                li.textContent = msg;
                                errorList.appendChild(li);
                            });
                        });
                        document.getElementById('errorAlert').classList.remove('hidden');
                        submitReviewBtn.disabled = false;
                        submitReviewBtn.classList.remove('opacity-75');
                        return;
                    }
                    // On success, redirect to index to refresh list
                    window.location.href = data.redirect || window.location.href;
                } catch (err) {
                    submitReviewBtn.disabled = false;
                    submitReviewBtn.classList.remove('opacity-75');
                    alert('Failed to submit review. Please try again.');
                }
            });
        }

        // Auto-open the Add Review modal when URL has ?add=1
        document.addEventListener('DOMContentLoaded', function() {
            const shouldOpen = {{ request()->has('add') ? 'true' : 'false' }};
            if (shouldOpen) {
                openAddReviewModal();
            }
        });
    </script>

    <style>
        #addReviewModal .modal-backdrop { opacity: 0; transition: opacity 0.3s ease-out; }
        #addReviewModal.show .modal-backdrop { opacity: 1; }
        #addReviewModal.show .modal-content { animation: slideUpScale 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        @keyframes slideUpScale { from { opacity: 0; transform: translateY(40px) scale(0.95); } to { opacity: 1; transform: translateY(0) scale(1); } }
    </style>
</x-app-layout>