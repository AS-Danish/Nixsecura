<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Certificates - CyberShield Institute</title>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex items-center justify-between">
            <a href="/" class="text-2xl font-black gradient-text">CyberShield Institute</a>
            <a href="/" class="text-sm text-blue-600 font-semibold hover:text-blue-700">Back to Home</a>
        </div>
    </header>

    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="bg-blue-100 text-blue-600 px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wide">Certifications</span>
                <h1 class="text-5xl md:text-6xl font-black text-gray-800 mt-6 mb-4">All Certificates</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Explore all certifications offered and their issuing organizations</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($certificates as $certificate)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-xl border-2 border-blue-100">
                        <div class="h-48 gradient-blue flex items-center justify-center relative overflow-hidden">
                            @if($certificate->image && file_exists(public_path($certificate->image)))
                                <img src="{{ asset($certificate->image) }}" alt="{{ $certificate->title }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                            @else
                                <svg class="w-16 h-16 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
                                </svg>
                            @endif
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-black text-gray-800 mb-2">{{ $certificate->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $certificate->organization ?? 'Certified Program' }}</p>
                            <div class="flex items-center justify-between mb-6">
                                <div class="text-sm text-gray-500 font-semibold">Issued on</div>
                                <div class="text-base font-bold text-gray-800">{{ $certificate->date->format('M d, Y') }}</div>
                            </div>
                            <a href="{{ route('certificates.view', $certificate) }}" class="w-full block text-center gradient-blue text-white py-3 rounded-xl font-bold hover:opacity-90 transition-all shadow-lg">View Details</a>
                        </div>
                    </div>
                @empty
                    <div class="lg:col-span-3 text-center py-10 text-gray-600 font-semibold">No certificates available yet.</div>
                @endforelse
            </div>
        </div>
    </section>
</body>
</html>