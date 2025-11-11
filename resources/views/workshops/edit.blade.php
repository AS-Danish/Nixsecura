<x-app-layout>
    <x-slot name="page-title">Edit Workshop</x-slot>

    <div class="relative mb-8 flex items-center justify-between gap-6">
        <a href="{{ route('workshops.index') }}" class="inline-flex items-center gap-3 bg-white hover:bg-gray-100 text-gray-700 font-semibold py-3 px-5 rounded-xl border border-gray-300 transition-all shadow-sm hover:shadow-md">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7 7-7m8 14l-7-7 7-7"/></svg>
            <span>Back to Workshops</span>
        </a>
        <div class="space-y-2">
            <h1 class="text-3xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600">Edit Workshop</h1>
            <p class="text-slate-600 text-base md:text-lg font-medium">Update workshop details and information</p>
        </div>
    </div>

    <div class="relative max-w-4xl mx-auto">
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/60 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    Workshop Information
                </h2>
            </div>

            <form action="{{ route('workshops.update', $workshop->id) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Workshop Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $workshop->name) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" required />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Location <span class="text-red-500">*</span></label>
                            <input type="text" name="location" value="{{ old('location', $workshop->location) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" required />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Start Date <span class="text-red-500">*</span></label>
                            <input type="date" name="start_date" value="{{ old('start_date', optional($workshop->start_date)->format('Y-m-d')) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" required />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">End Date</label>
                            <input type="date" name="end_date" value="{{ old('end_date', optional($workshop->end_date)->format('Y-m-d')) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Topics Covered</label>
                        <textarea name="topics" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-gray-900 resize-none font-mono text-sm">{{ old('topics', $workshop->topics) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Workshop Image</label>
                        <div class="flex items-center gap-5">
                            <div class="w-32 h-32 bg-gray-100 rounded-xl overflow-hidden border border-gray-200">
                                @if($workshop->image)
                                    <img src="/{{ $workshop->image }}" alt="Current image" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">No Image</div>
                                @endif
                            </div>
                            <input type="file" name="image" accept="image/*" class="flex-1 px-4 py-3 border border-gray-300 rounded-lg" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('workshops.index') }}" class="flex-1 bg-white hover:bg-gray-100 text-gray-700 font-semibold py-4 px-6 rounded-xl border border-gray-300 text-center transition-all shadow-sm hover:shadow-md">Cancel</a>
                    <button type="submit" class="flex-1 bg-gradient-to-br from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-3 shadow-lg hover:shadow-xl transition-all hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Update Workshop</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>