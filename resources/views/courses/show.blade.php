<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->name }} - Nixsecura Institute</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
        }
        
        .gradient-blue {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .navbar-scroll {
            transition: all 0.3s ease;
        }
        
        .hero-blob {
            position: absolute;
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            animation: blob-animation 8s ease-in-out infinite;
        }
        
        @keyframes blob-animation {
            0%, 100% { border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; }
            25% { border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%; }
            50% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; }
            75% { border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%; }
        }
        
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }
        
        .mobile-menu.active {
            transform: translateX(0);
        }
        
        .stat-card {
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -5px rgba(79, 70, 229, 0.15);
        }
        
        .sticky-sidebar {
            position: sticky;
            top: 100px;
        }
        
        @media (max-width: 1024px) {
            .sticky-sidebar {
                position: relative;
                top: 0;
            }
        }
        
        .feature-icon {
            transition: all 0.3s ease;
        }
        
        .feature-item:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- ==================== NAVBAR SECTION ==================== -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white border-b navbar-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-3">
                    <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-black gradient-text">Nixsecura Institute</span>
                </a>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-semibold transition">Home</a>
                    <a href="{{ route('courses.public.index') }}" class="text-blue-600 font-semibold">Courses</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-semibold transition">Certificates</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-semibold transition">Workshops</a>
                    <a href="{{ url()->previous() }}" class="gradient-bg text-white px-6 py-3 rounded-full font-bold hover:opacity-90 transition transform hover:scale-105 shadow-lg">
                        ← Back
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu fixed top-0 right-0 h-full w-80 bg-white shadow-2xl lg:hidden z-50">
            <div class="p-6">
                <div class="flex items-center justify-between mb-8">
                    <span class="text-xl font-black gradient-text">Menu</span>
                    <button id="close-menu" class="p-2 rounded-lg hover:bg-gray-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="space-y-4">
                    <a href="/" class="block py-3 px-4 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-semibold transition">Home</a>
                    <a href="{{ route('courses.public.index') }}" class="block py-3 px-4 rounded-lg bg-blue-50 text-blue-600 font-semibold">Courses</a>
                    <a href="#" class="block py-3 px-4 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-semibold transition">Certificates</a>
                    <a href="#" class="block py-3 px-4 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-semibold transition">Workshops</a>
                    <a href="{{ url()->previous() }}" class="block py-3 px-4 rounded-lg gradient-bg text-white font-bold text-center shadow-lg">← Back</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ==================== HERO SECTION ==================== -->
    <section class="relative pt-32 pb-12 overflow-hidden bg-gradient-to-br from-blue-50 via-blue-50 to-pink-50">
        <!-- Animated Background Blobs -->
        <div class="hero-blob absolute top-10 -left-20 w-96 h-96 bg-blue-200 opacity-30 blur-3xl"></div>
        <div class="hero-blob absolute bottom-10 -right-20 w-96 h-96 bg-blue-200 opacity-30 blur-3xl" style="animation-delay: 2s;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumb -->
            <div class="flex items-center space-x-2 text-sm text-gray-600 mb-6">
                <a href="/" class="hover:text-blue-600 transition">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('courses.public.index') }}" class="hover:text-blue-600 transition">Courses</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-800 font-semibold">{{ $course->name }}</span>
            </div>

            <!-- Course Header -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-bold mb-4">
                        🎓 Professional Course
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-gray-800 mb-6 leading-tight">
                        {{ $course->name }}
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit($course->description, 200) }}
                    </p>
                    
                    <!-- Quick Stats -->
                    <div class="flex flex-wrap gap-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-2xl font-black gradient-text">{{ $course->duration }}</div>
                                <div class="text-sm text-gray-600">Weeks</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-2xl font-black text-green-600">₹{{ number_format($course->fees) }}</div>
                                <div class="text-sm text-gray-600">Course Fee</div>
                            </div>
                        </div>
                        @if($course->modules)
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-2xl font-black text-purple-600">{{ $course->modules }}</div>
                                <div class="text-sm text-gray-600">Modules</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Course Image -->
                <div class="relative">
                    <div class="bg-white rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                        <div class="h-80 relative gradient-blue flex items-center justify-center">
                            @if($course->image && file_exists(public_path($course->image)))
                                <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="absolute inset-0 opacity-20">
                                    <div class="absolute top-0 left-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                                    <div class="absolute bottom-0 right-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                                </div>
                                <svg class="w-32 h-32 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 bg-white rounded-2xl shadow-2xl px-8 py-4 border-4 border-blue-50 z-20">
                        <div class="text-center">
                            <div class="text-sm text-gray-600 font-semibold mb-1">⭐ Rating</div>
                            <div class="text-2xl font-black gradient-text">4.8/5.0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== MAIN CONTENT ==================== -->
    <main class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Course Overview -->
                    <div class="bg-white rounded-3xl shadow-xl p-8 border-2 border-gray-100">
                        <h2 class="text-3xl font-black text-gray-800 mb-6 flex items-center">
                            <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Course Overview
                        </h2>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            {{ $course->description }}
                        </p>
                    </div>

                    <!-- What You'll Learn -->
                    <div class="bg-white rounded-3xl shadow-xl p-8 border-2 border-gray-100">
                        <h2 class="text-3xl font-black text-gray-800 mb-6 flex items-center">
                            <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            What You'll Learn
                        </h2>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="feature-item flex items-start space-x-3">
                                <div class="feature-icon w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-1">Hands-on Experience</h3>
                                    <p class="text-gray-600 text-sm">Real-world projects and labs</p>
                                </div>
                            </div>
                            <div class="feature-item flex items-start space-x-3">
                                <div class="feature-icon w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-1">Industry Tools</h3>
                                    <p class="text-gray-600 text-sm">Latest security frameworks</p>
                                </div>
                            </div>
                            <div class="feature-item flex items-start space-x-3">
                                <div class="feature-icon w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-1">Expert Mentorship</h3>
                                    <p class="text-gray-600 text-sm">Learn from industry leaders</p>
                                </div>
                            </div>
                            <div class="feature-item flex items-start space-x-3">
                                <div class="feature-icon w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-1">Certification</h3>
                                    <p class="text-gray-600 text-sm">Industry-recognized certificate</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Course Curriculum -->
                    @if($course->contents)
                    <div class="bg-white rounded-3xl shadow-xl p-8 border-2 border-gray-100">
                        <h2 class="text-3xl font-black text-gray-800 mb-6 flex items-center">
                            <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Course Curriculum
                        </h2>
                        <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-6 border-2 border-blue-100">
                            <pre class="whitespace-pre-wrap text-gray-700 leading-relaxed font-medium">{{ $course->contents }}</pre>
                        </div>
                    </div>
                    @endif

                    <!-- Course Features -->
                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl shadow-xl p-8 text-white">
                        <h2 class="text-3xl font-black mb-6">Course Features</h2>
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0 backdrop-blur-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Flexible Schedule</h3>
                                    <p class="text-blue-100">Learn at your own pace</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0 backdrop-blur-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">24/7 Support</h3>
                                    <p class="text-blue-100">Get help when you need it</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0 backdrop-blur-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Lifetime Access</h3>
                                    <p class="text-blue-100">Access course materials forever</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center flex-shrink-0 backdrop-blur-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Job Assistance</h3>
                                    <p class="text-blue-100">Career support after completion</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    <div class="sticky-sidebar space-y-6">
                        <!-- Enrollment Card -->
                        <div class="bg-white rounded-3xl shadow-xl border-2 border-blue-100 p-8">
                            <div class="text-center mb-6">
                                <div class="text-4xl font-black gradient-text mb-2">₹{{ number_format($course->fees) }}</div>
                                <div class="text-gray-600 font-semibold">One-time payment</div>
                            </div>
                            
                            <a href="#" class="block w-full gradient-bg text-white text-center py-4 rounded-xl font-bold text-lg hover:opacity-90 transition transform hover:scale-105 shadow-lg mb-4">
                                Enroll Now →
                            </a>
                            
                            <a href="{{ route('courses.public.index') }}" class="block w-full border-2 border-blue-600 text-blue-600 text-center py-4 rounded-xl font-bold hover:bg-blue-50 transition">
                                View All Courses
                            </a>
                            
                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <h3 class="font-black text-gray-800 mb-4">This course includes:</h3>
                                <ul class="space-y-3">
                                    <li class="flex items-center text-gray-700">
                                        <svg class="w-5 h-5 mr-3 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>{{ $course->duration }} weeks of training</span>
                                    </li>
                                    @if($course->modules)
                                    <li class="flex items-center text-gray-700">
                                        <svg class="w-5 h-5 mr-3 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>{{ $course->modules }} comprehensive modules</span>
                                    </li>
                                    @endif
                                    <li class="flex items-center text-gray-700">
                                        <svg class="w-5 h-5 mr-3 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Hands-on practical labs</span>
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <svg class="w-5 h-5 mr-3 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Industry certification</span>
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <svg class="w-5 h-5 mr-3 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Lifetime course access</span>
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <svg class="w-5 h-5 mr-3 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>24/7 expert support</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Quick Info Card -->
                        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-3xl shadow-lg border-2 border-blue-100 p-8">
                            <h3 class="text-xl font-black text-gray-800 mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Course Details
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="text-gray-600 font-semibold">Course ID</span>
                                    <span class="text-gray-800 font-bold">#{{ $course->id }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="text-gray-600 font-semibold">Duration</span>
                                    <span class="text-gray-800 font-bold">{{ $course->duration }} Weeks</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="text-gray-600 font-semibold">Level</span>
                                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-bold">All Levels</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="text-gray-600 font-semibold">Language</span>
                                    <span class="text-gray-800 font-bold">English</span>
                                </div>
                                @if($course->modules)
                                <div class="flex items-center justify-between py-3">
                                    <span class="text-gray-600 font-semibold">Modules</span>
                                    <span class="text-gray-800 font-bold">{{ $course->modules }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Share Card -->
                        <div class="bg-white rounded-3xl shadow-lg border-2 border-gray-100 p-8">
                            <h3 class="text-xl font-black text-gray-800 mb-4">Share this course</h3>
                            <div class="flex space-x-3">
                                <a href="#" class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center hover:bg-blue-600 hover:text-white transition group">
                                    <svg class="w-5 h-5 text-blue-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center hover:bg-blue-400 hover:text-white transition group">
                                    <svg class="w-5 h-5 text-blue-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center hover:bg-blue-700 hover:text-white transition group">
                                    <svg class="w-5 h-5 text-blue-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center hover:bg-green-600 hover:text-white transition group">
                                    <svg class="w-5 h-5 text-green-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Contact Card -->
                        <div class="bg-gradient-to-br from-blue-600 to-purple-600 rounded-3xl shadow-lg p-8 text-white">
                            <h3 class="text-2xl font-black mb-4">Need Help?</h3>
                            <p class="text-blue-100 mb-6">Our team is here to answer your questions</p>
                            <a href="#contact" class="block w-full bg-white text-blue-600 text-center py-4 rounded-xl font-bold hover:bg-gray-100 transition">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>

    <!-- ==================== CTA SECTION ==================== -->
    <section class="py-20 bg-gradient-to-br from-blue-600 to-blue-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center text-white">
                <h2 class="text-4xl md:text-5xl font-black mb-6">Ready to Get Started?</h2>
                <p class="text-xl mb-10 opacity-90 max-w-2xl mx-auto">Join thousands of students who have transformed their careers with this course</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#" class="bg-white text-blue-600 px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-2xl">
                        Enroll Now →
                    </a>
                    <a href="{{ route('courses.public.index') }}" class="border-2 border-white text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-blue-600 transition transform hover:scale-105">
                        Browse More Courses
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FOOTER SECTION ==================== -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <!-- Brand Column -->
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-black">Nixsecura Institute</span>
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        Empowering the next generation of cyber security professionals with world-class training and certifications.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-11 h-11 bg-gray-800 rounded-xl flex items-center justify-center hover:bg-blue-600 transition-all transform hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-11 h-11 bg-gray-800 rounded-xl flex items-center justify-center hover:bg-blue-600 transition-all transform hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-11 h-11 bg-gray-800 rounded-xl flex items-center justify-center hover:bg-blue-600 transition-all transform hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-11 h-11 bg-gray-800 rounded-xl flex items-center justify-center hover:bg-blue-600 transition-all transform hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links Column -->
                <div>
                    <h4 class="text-xl font-black mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-gray-400 hover:text-blue-400 transition font-medium">Home</a></li>
                        <li><a href="{{ route('courses.public.index') }}" class="text-gray-400 hover:text-blue-400 transition font-medium">Courses</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition font-medium">Certificates</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition font-medium">Workshops</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition font-medium">Gallery</a></li>
                    </ul>
                </div>
                
                <!-- Resources Column -->
                <div>
                    <h4 class="text-xl font-black mb-6">Resources</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition font-medium">Student Portal</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition font-medium">Career Support</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition font-medium">Study Materials</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition font-medium">Placement Cell</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition font-medium">Alumni Network</a></li>
                    </ul>
                </div>
                
                <!-- Contact Column -->
                <div>
                    <h4 class="text-xl font-black mb-6">Contact Info</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-3 text-blue-400 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-gray-400 text-sm">1st Floor, Above Sodhi ENT Hospital, Opp Dwarka Grand Hotel, Usmanpura</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-gray-400 text-sm">+91 7558302153</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-400 text-sm">nixsecura@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Footer Bottom -->
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-gray-400 text-sm">
                        © 2025 Nixsecura Institute. All rights reserved.
                    </p>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ==================== SCROLL TO TOP BUTTON ==================== -->
    <button id="scrollTop" class="fixed bottom-8 right-8 w-14 h-14 gradient-bg rounded-full shadow-2xl flex items-center justify-center opacity-0 pointer-events-none transition-all hover:scale-110 z-50">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <!-- ==================== JAVASCRIPT ==================== -->
    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenu = document.getElementById('close-menu');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.add('active');
            });
            
            closeMenu.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
            });

            // Close mobile menu when clicking on a link
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.remove('active');
                });
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    mobileMenu.classList.remove('active');
                }
            });
        }

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });

        // Scroll to top button functionality
        const scrollTopBtn = document.getElementById('scrollTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.remove('opacity-0', 'pointer-events-none');
                scrollTopBtn.classList.add('opacity-100', 'pointer-events-auto');
            } else {
                scrollTopBtn.classList.add('opacity-0', 'pointer-events-none');
                scrollTopBtn.classList.remove('opacity-100', 'pointer-events-auto');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>