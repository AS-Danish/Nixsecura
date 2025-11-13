<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->name }} - Course Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .gradient-blue { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); }
        .gradient-text {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gray-50">
    <header class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
            <a href="/" class="text-lg font-black gradient-text">CyberShield Institute</a>
            <a href="{{ url()->previous() }}" class="text-sm text-blue-600 font-semibold hover:text-blue-700">Back</a>
        </div>
    </header>

    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-2 border-gray-100">
                        <div class="h-64 relative gradient-blue flex items-center justify-center">
                            @if($course->image && file_exists(public_path($course->image)))
                                <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                            @else
                                <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            @endif
                        </div>
                        <div class="p-8">
                            <h1 class="text-3xl md:text-4xl font-black text-gray-800 mb-4">{{ $course->name }}</h1>
                            <p class="text-gray-700 leading-relaxed mb-6">{{ $course->description }}</p>

                            <div class="grid sm:grid-cols-3 gap-6 mb-8">
                                <div class="bg-gray-50 rounded-xl p-4 border">
                                    <div class="text-sm text-gray-500 mb-1">Duration</div>
                                    <div class="text-lg font-bold text-gray-800">{{ $course->duration }} Weeks</div>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4 border">
                                    <div class="text-sm text-gray-500 mb-1">Fees</div>
                                    <div class="text-lg font-bold text-emerald-600">₹{{ number_format($course->fees) }}</div>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4 border">
                                    <div class="text-sm text-gray-500 mb-1">Modules</div>
                                    <div class="text-lg font-bold text-gray-800">{{ $course->modules ?? 'N/A' }}</div>
                                </div>
                            </div>

                            @if($course->contents)
                                <div class="mb-8">
                                    <h2 class="text-2xl font-black text-gray-800 mb-3">Curriculum</h2>
                                    <pre class="whitespace-pre-wrap text-gray-700 bg-gray-50 p-4 rounded-xl border">{{ $course->contents }}</pre>
                                </div>
                            @endif

                            <div class="flex items-center gap-4">
                                <a href="#" class="gradient-blue text-white px-6 py-3 rounded-xl font-bold shadow hover:opacity-90">Enroll Now</a>
                                <a href="{{ route('courses.index') }}" class="px-6 py-3 rounded-xl font-bold border-2 border-blue-600 text-blue-600 hover:bg-blue-50">View All Courses</a>
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="space-y-6">
                    <div class="bg-white rounded-3xl shadow-xl border-2 border-blue-100 p-6">
                        <h3 class="text-xl font-black text-gray-800 mb-2">Quick Info</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li><span class="font-semibold">Course ID:</span> {{ $course->id }}</li>
                            <li><span class="font-semibold">Duration:</span> {{ $course->duration }} Weeks</li>
                            <li><span class="font-semibold">Fees:</span> ₹{{ number_format($course->fees) }}</li>
                            <li><span class="font-semibold">Modules:</span> {{ $course->modules ?? 'N/A' }}</li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </main>
</body>
</html>