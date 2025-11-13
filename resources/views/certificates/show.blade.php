<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $certificate->title }} - Certificate Details</title>
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
            <div class="flex items-center gap-4">
                <a href="{{ route('certificates.public.index') }}" class="text-sm text-blue-600 font-semibold hover:text-blue-700">View All Certificates</a>
                <a href="/" class="text-sm text-blue-600 font-semibold hover:text-blue-700">Home</a>
            </div>
        </div>
    </header>

    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-2 border-blue-100">
                        <div class="h-64 relative gradient-blue flex items-center justify-center">
                            @if($certificate->image && file_exists(public_path($certificate->image)))
                                <img src="{{ asset($certificate->image) }}" alt="{{ $certificate->title }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                            @else
                                <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
                                </svg>
                            @endif
                        </div>
                        <div class="p-8">
                            <h1 class="text-3xl md:text-4xl font-black text-gray-800 mb-2">{{ $certificate->title }}</h1>
                            <p class="text-gray-600 mb-6">{{ $certificate->organization ?? 'Certified Program' }}</p>

                            <div class="grid sm:grid-cols-3 gap-6 mb-8">
                                <div class="bg-gray-50 rounded-xl p-4 border">
                                    <div class="text-sm text-gray-500 mb-1">Issued On</div>
                                    <div class="text-lg font-bold text-gray-800">{{ $certificate->date->format('M d, Y') }}</div>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4 border">
                                    <div class="text-sm text-gray-500 mb-1">Certificate ID</div>
                                    <div class="text-lg font-bold text-gray-800">#{{ $certificate->id }}</div>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4 border">
                                    <div class="text-sm text-gray-500 mb-1">Issuer</div>
                                    <div class="text-lg font-bold text-gray-800">{{ $certificate->organization ?? 'N/A' }}</div>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <a href="{{ route('certificates.public.index') }}" class="px-6 py-3 rounded-xl font-bold border-2 border-blue-600 text-blue-600 hover:bg-blue-50">View All Certificates</a>
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="space-y-6">
                    <div class="bg-white rounded-3xl shadow-xl border-2 border-blue-100 p-6">
                        <h3 class="text-xl font-black text-gray-800 mb-2">Quick Info</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li><span class="font-semibold">Title:</span> {{ $certificate->title }}</li>
                            <li><span class="font-semibold">Date:</span> {{ $certificate->date->format('M d, Y') }}</li>
                            <li><span class="font-semibold">Organization:</span> {{ $certificate->organization ?? 'N/A' }}</li>
                            <li><span class="font-semibold">ID:</span> #{{ $certificate->id }}</li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </main>
</body>
</html>