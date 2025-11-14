<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $workshop->name }} - Workshop Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .gradient-blue { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); }
        .gradient-text { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    </style>
</head>
<body class="bg-gray-50">
    <header class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
            <a href="/" class="text-lg font-black gradient-text">CyberShield Institute</a>
            <a href="{{ route('workshops.public.index') }}" class="text-sm text-blue-600 font-semibold hover:text-blue-700">View All Workshops</a>
        </div>
    </header>

    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-2 border-blue-100">
                        <div class="h-64 relative gradient-blue flex items-center justify-center">
                            @if($workshop->image && file_exists(public_path($workshop->image)))
                                <img src="{{ asset($workshop->image) }}" alt="{{ $workshop->name }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                            @else
                                <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
                                </svg>
                            @endif
                        </div>
                        <div class="p-8">
                            <h1 class="text-3xl md:text-4xl font-black text-gray-800 mb-2">{{ $workshop->name }}</h1>
                            <p class="text-gray-600 mb-6">{{ $workshop->location }}</p>

                            <div class="grid sm:grid-cols-3 gap-6 mb-8">
                                <div class="bg-gray-50 rounded-xl p-4 border">
                                    <div class="text-sm text-gray-500 mb-1">Start Date</div>
                                    <div class="text-lg font-bold text-gray-800">{{ $workshop->start_date->format('M d, Y') }}</div>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4 border">
                                    <div class="text-sm text-gray-500 mb-1">End Date</div>
                                    <div class="text-lg font-bold text-gray-800">{{ $workshop->end_date ? $workshop->end_date->format('M d, Y') : 'N/A' }}</div>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4 border">
                                    <div class="text-sm text-gray-500 mb-1">Workshop ID</div>
                                    <div class="text-lg font-bold text-gray-800">#{{ $workshop->id }}</div>
                                </div>
                            </div>

                            @if(!empty($workshop->topics))
                                <div class="prose max-w-none text-gray-700 leading-relaxed">
                                    <h3 class="text-xl font-black mb-3">Topics Covered</h3>
                                    <p>{{ $workshop->topics }}</p>
                                </div>
                            @endif

                            <div class="mt-6">
                                <a href="{{ route('workshops.public.index') }}" class="px-6 py-3 rounded-xl font-bold border-2 border-blue-600 text-blue-600 hover:bg-blue-50">View All Workshops</a>
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="space-y-6">
                    <div class="bg-white rounded-3xl shadow-xl border-2 border-blue-100 p-6">
                        <h3 class="text-xl font-black text-gray-800 mb-2">Quick Info</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li><span class="font-semibold">Name:</span> {{ $workshop->name }}</li>
                            <li><span class="font-semibold">Location:</span> {{ $workshop->location }}</li>
                            <li><span class="font-semibold">Start:</span> {{ $workshop->start_date->format('M d, Y') }}</li>
                            <li><span class="font-semibold">End:</span> {{ $workshop->end_date ? $workshop->end_date->format('M d, Y') : 'N/A' }}</li>
                            <li><span class="font-semibold">ID:</span> #{{ $workshop->id }}</li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </main>
</body>
</html>