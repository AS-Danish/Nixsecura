<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses - CyberShield Institute</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .gradient-blue { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); }
        .gradient-text { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .hover-scale { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .hover-scale:hover { transform: translateY(-10px) scale(1.02); box-shadow: 0 25px 50px -12px rgba(37,99,235,0.25); }
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
                <span class="bg-blue-100 text-blue-600 px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wide">Our Programs</span>
                <h1 class="text-5xl md:text-6xl font-black text-gray-800 mt-6 mb-4">All Courses</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Explore our complete catalog and find the program that matches your goals</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($courses as $course)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-xl hover-scale border-2 border-gray-100">
                        <div class="h-56 gradient-blue flex items-center justify-center relative overflow-hidden">
                            @if($course->image && file_exists(public_path($course->image)))
                                <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                            @else
                                <div class="absolute inset-0 opacity-20">
                                    <div class="absolute top-0 left-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                                    <div class="absolute bottom-0 right-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                                </div>
                                <svg class="w-24 h-24 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="flex items-center justify-between mb-6">
                                <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-xs font-bold">{{ $course->modules ? 'Modules: '.$course->modules : 'Program' }}</span>
                                <span class="text-gray-600 font-semibold flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $course->duration }} Weeks
                                </span>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-3">{{ $course->name }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">{{ \Illuminate\Support\Str::limit($course->description, 160) }}</p>
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <div class="text-3xl font-black gradient-text">₹{{ number_format($course->fees) }}</div>
                                    <div class="text-sm text-gray-500">One-time payment</div>
                                </div>
                            </div>
                            <a href="{{ route('courses.view', $course) }}" class="w-full block text-center gradient-blue text-white py-4 rounded-xl font-bold hover:opacity-90 transform hover:scale-105 transition-all shadow-lg">View Details</a>
                        </div>
                    </div>
                @empty
                    <div class="lg:col-span-3 text-center py-10 text-gray-600 font-semibold">No courses available yet.</div>
                @endforelse
            </div>
        </div>
    </section>
</body>
</html>