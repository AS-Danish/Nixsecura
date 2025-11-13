<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberShield Institute - Learn Cyber Security</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
        
        .gradient-blue {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(37, 99, 235, 0.2);
        }
        
        .hover-scale {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-scale:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(37, 99, 235, 0.25);
        }
        
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            transition: width 0.3s ease;
            border-radius: 2px;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(37, 99, 235, 0.3); }
            50% { box-shadow: 0 0 40px rgba(37, 99, 235, 0.6); }
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-float-delay {
            animation: float 6s ease-in-out infinite;
            animation-delay: 2s;
        }
        
        .glow-card {
            animation: pulse-glow 3s ease-in-out infinite;
        }
        
        .hero-pattern {
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(37, 99, 235, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(37, 99, 235, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(37, 99, 235, 0.05) 0%, transparent 50%);
        }
        
        .card-shine {
            position: relative;
            overflow: hidden;
        }
        
        .card-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(37, 99, 235, 0.1), transparent);
            transition: left 0.5s;
        }
        
        .card-shine:hover::before {
            left: 100%;
        }
        
        .blob {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: blob 8s ease-in-out infinite;
        }
        
        @keyframes blob {
            0%, 100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
            25% { border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%; }
            50% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; }
            75% { border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%; }
        }
    </style>
</head>
<body class="bg-white overflow-x-hidden">
    <!---Navbar Imported-->
    <x-navbar />

    <!-- Hero Section -->
    <section id="home" class="pt-32 pb-24 bg-white relative overflow-hidden hero-pattern">
        <div class="absolute top-20 left-10 w-96 h-96 bg-blue-100 opacity-30 rounded-full blur-3xl blob animate-float"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-blue-100 opacity-30 rounded-full blur-3xl blob animate-float-delay"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div class="space-y-6">
                        <div class="inline-block">
                            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                                🚀 #1 Cyber Security Institute
                            </span>
                        </div>
                        <h1 class="text-5xl md:text-7xl font-black leading-tight text-gray-900">
                            Secure Your Future in <span class="gradient-text">Cyber Security</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-gray-600 leading-relaxed font-light">
                            Master the art of protecting digital assets with industry-leading training, hands-on labs, and globally recognized certifications.
                        </p>
                    </div>
                    
                    <div class="flex flex-wrap gap-4">
                        <button class="gradient-blue text-white px-10 py-4 rounded-xl font-bold hover:opacity-90 transform hover:scale-105 transition-all shadow-2xl">
                            Start Learning →
                        </button>
                        <button class="bg-gray-100 text-gray-800 px-10 py-4 rounded-xl font-bold hover:bg-gray-200 transition-all border-2 border-gray-200">
                            Watch Demo
                        </button>
                    </div>
                    
                    <div class="flex items-center space-x-8 pt-6">
                        <div>
                            <div class="text-4xl font-black gradient-text">10K+</div>
                            <div class="text-gray-600">Students</div>
                        </div>
                        <div class="w-px h-12 bg-gray-300"></div>
                        <div>
                            <div class="text-4xl font-black gradient-text">98%</div>
                            <div class="text-gray-600">Success Rate</div>
                        </div>
                        <div class="w-px h-12 bg-gray-300"></div>
                        <div>
                            <div class="text-4xl font-black gradient-text">50+</div>
                            <div class="text-gray-600">Courses</div>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="glass-effect rounded-3xl p-8 glow-card transform hover:scale-105 transition-all shadow-2xl">
                        <div class="bg-white rounded-2xl p-6 mb-6 card-shine border border-gray-200">
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-gray-800 text-lg">100% Secure Learning</h3>
                                    <p class="text-gray-600 text-sm">Certified & Trusted Platform</p>
                                </div>
                            </div>
                            <div class="relative w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                <div class="gradient-blue h-3 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white rounded-2xl p-6 text-center card-shine border border-gray-200">
                                <div class="text-4xl font-black gradient-text mb-2">500+</div>
                                <div class="text-gray-600 font-semibold">Companies</div>
                            </div>
                            <div class="bg-white rounded-2xl p-6 text-center card-shine border border-gray-200">
                                <div class="text-4xl font-black gradient-text mb-2">24/7</div>
                                <div class="text-gray-600 font-semibold">Support</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center transform hover:scale-110 transition-transform">
                    <div class="text-6xl font-black gradient-text mb-3">10K+</div>
                    <div class="text-gray-600 font-semibold text-lg">Students Enrolled</div>
                </div>
                <div class="text-center transform hover:scale-110 transition-transform">
                    <div class="text-6xl font-black gradient-text mb-3">500+</div>
                    <div class="text-gray-600 font-semibold text-lg">Companies Hiring</div>
                </div>
                <div class="text-center transform hover:scale-110 transition-transform">
                    <div class="text-6xl font-black gradient-text mb-3">98%</div>
                    <div class="text-gray-600 font-semibold text-lg">Success Rate</div>
                </div>
                <div class="text-center transform hover:scale-110 transition-transform">
                    <div class="text-6xl font-black gradient-text mb-3">50+</div>
                    <div class="text-gray-600 font-semibold text-lg">Expert Trainers</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section id="courses" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <span class="bg-blue-100 text-blue-600 px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wide">Our Programs</span>
                <h2 class="text-5xl md:text-6xl font-black text-gray-800 mt-6 mb-4">Popular Courses</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Choose from our industry-leading programs designed to make you job-ready</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-10">
                @forelse($popularCourses as $course)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-xl hover-scale card-shine border-2 border-gray-100">
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="flex items-center justify-between mb-6">
                                <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-bold">{{ $course->modules ? 'Modules: '.$course->modules : 'Program' }}</span>
                                <span class="text-gray-600 font-semibold flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $course->duration }} Weeks
                                </span>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-4">{{ $course->name }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">{{ \Illuminate\Support\Str::limit($course->description, 140) }}</p>
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <div class="text-3xl font-black gradient-text">₹{{ number_format($course->fees) }}</div>
                                    <div class="text-sm text-gray-500">One-time payment</div>
                                </div>
                            </div>
                            <a href="{{ route('courses.view', $course) }}" class="w-full block text-center gradient-blue text-white py-4 rounded-xl font-bold hover:opacity-90 transform hover:scale-105 transition-all shadow-lg">
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-3 text-center py-10 text-gray-600 font-semibold">No courses available yet.</div>
                @endforelse
            </div>

            @if(($totalCourses ?? 0) > 3)
                <div class="mt-10 flex justify-center">
                    <a href="{{ route('courses.public.index') }}" class="bg-blue-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-700 transition-all shadow-lg">
                        View More Courses
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Certificates Section -->
    <section id="certificates" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <span class="bg-blue-100 text-blue-600 px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wide">Certifications</span>
                <h2 class="text-5xl md:text-6xl font-black text-gray-800 mt-6 mb-4">Industry-Recognized Certificates</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Get certified and unlock new career opportunities worldwide</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-10">
                <div class="bg-white rounded-3xl p-10 border-2 border-blue-100 hover-scale shadow-lg">
                    <div class="flex items-start space-x-6">
                        <div class="w-20 h-20 gradient-blue rounded-2xl flex items-center justify-center flex-shrink-0 shadow-xl">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-black text-gray-800 mb-4">CyberShield Certified Professional</h3>
                            <p class="text-gray-600 mb-6 text-lg leading-relaxed">Comprehensive certification covering all aspects of cyber security, recognized by Fortune 500 companies.</p>
                            <ul class="space-y-4">
                                <li class="flex items-center text-gray-700 font-semibold">
                                    <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Valid for 3 years
                                </li>
                                <li class="flex items-center text-gray-700 font-semibold">
                                    <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Globally recognized credential
                                </li>
                                <li class="flex items-center text-gray-700 font-semibold">
                                    <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Digital & Physical certificate
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-3xl p-10 border-2 border-blue-100 hover-scale shadow-lg">
                    <div class="flex items-start space-x-6">
                        <div class="w-20 h-20 gradient-blue rounded-2xl flex items-center justify-center flex-shrink-0 shadow-xl">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-black text-gray-800 mb-4">Specialized Track Certificates</h3>
                            <p class="text-gray-600 mb-6 text-lg leading-relaxed">Domain-specific certifications in penetration testing, network security, and application security.</p>
                            <ul class="space-y-4">
                                <li class="flex items-center text-gray-700 font-semibold">
                                    <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Multiple specialization tracks
                                </li>
                                <li class="flex items-center text-gray-700 font-semibold">
                                    <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Hands-on project completion
                                </li>
                                <li class="flex items-center text-gray-700 font-semibold">
                                    <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    LinkedIn verification badge
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blogs" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <span class="bg-blue-100 text-blue-600 px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wide">Latest Updates</span>
                <h2 class="text-5xl md:text-6xl font-black text-gray-800 mt-6 mb-4">Latest Insights</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Stay updated with the latest trends and best practices in cyber security</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-10">
                <article class="bg-white rounded-3xl overflow-hidden shadow-xl hover-scale border-2 border-gray-100">
                    <div class="h-56 gradient-blue relative overflow-hidden">
                        <div class="absolute inset-0 opacity-30">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center space-x-3 mb-4">
                            <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-xs font-bold">Security Tips</span>
                            <span class="text-gray-500 text-sm font-semibold">5 min read</span>
                        </div>
                        <h3 class="text-2xl font-black text-gray-800 mb-4">Top 10 Cyber Security Best Practices for 2025</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Essential security practices every organization should implement to protect against modern threats and vulnerabilities.</p>
                        <button class="text-blue-600 font-bold hover:text-blue-700 transition flex items-center">
                            Read More 
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </button>
                    </div>
                </article>
                
                <article class="bg-white rounded-3xl overflow-hidden shadow-xl hover-scale border-2 border-gray-100">
                    <div class="h-56 gradient-blue relative overflow-hidden">
                        <div class="absolute inset-0 opacity-30">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center space-x-3 mb-4">
                            <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-xs font-bold">Industry News</span>
                            <span class="text-gray-500 text-sm font-semibold">8 min read</span>
                        </div>
                        <h3 class="text-2xl font-black text-gray-800 mb-4">The Rise of AI in Cyber Security Defense</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">How artificial intelligence is transforming threat detection and response in enterprise security operations.</p>
                        <button class="text-blue-600 font-bold hover:text-blue-700 transition flex items-center">
                            Read More 
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </button>
                    </div>
                </article>
                
                <article class="bg-white rounded-3xl overflow-hidden shadow-xl hover-scale border-2 border-gray-100">
                    <div class="h-56 gradient-blue relative overflow-hidden">
                        <div class="absolute inset-0 opacity-30">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center space-x-3 mb-4">
                            <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-xs font-bold">Career Guide</span>
                            <span class="text-gray-500 text-sm font-semibold">6 min read</span>
                        </div>
                        <h3 class="text-2xl font-black text-gray-800 mb-4">Starting Your Career in Ethical Hacking</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">A comprehensive guide to launching a successful career in ethical hacking and penetration testing today.</p>
                        <button class="text-blue-600 font-bold hover:text-blue-700 transition flex items-center">
                            Read More 
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </button>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <span class="bg-blue-100 text-blue-600 px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wide">Campus Life</span>
                <h2 class="text-5xl md:text-6xl font-black text-gray-800 mt-6 mb-4">Our Learning Environment</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">State-of-the-art facilities designed for hands-on cyber security training</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="relative h-80 rounded-3xl overflow-hidden group cursor-pointer transform hover:scale-105 transition-all shadow-lg">
                    <div class="absolute inset-0 gradient-blue flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition flex items-center justify-center">
                        <span class="text-white text-xl font-bold opacity-0 group-hover:opacity-100 transition">Lab Environment</span>
                    </div>
                </div>
                
                <div class="relative h-80 rounded-3xl overflow-hidden group cursor-pointer transform hover:scale-105 transition-all shadow-lg">
                    <div class="absolute inset-0 gradient-blue flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition flex items-center justify-center">
                        <span class="text-white text-xl font-bold opacity-0 group-hover:opacity-100 transition">Training Sessions</span>
                    </div>
                </div>
                
                <div class="relative h-80 rounded-3xl overflow-hidden group cursor-pointer transform hover:scale-105 transition-all shadow-lg">
                    <div class="absolute inset-0 gradient-blue flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition flex items-center justify-center">
                        <span class="text-white text-xl font-bold opacity-0 group-hover:opacity-100 transition">Modern Campus</span>
                    </div>
                </div>
                
                <div class="relative h-80 rounded-3xl overflow-hidden group cursor-pointer transform hover:scale-105 transition-all shadow-lg">
                    <div class="absolute inset-0 gradient-blue flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition flex items-center justify-center">
                        <span class="text-white text-xl font-bold opacity-0 group-hover:opacity-100 transition">Certifications</span>
                    </div>
                </div>
                
                <div class="relative h-80 rounded-3xl overflow-hidden group cursor-pointer transform hover:scale-105 transition-all md:col-span-2 shadow-lg">
                    <div class="absolute inset-0 gradient-blue flex items-center justify-center">
                        <svg class="w-24 h-24 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition flex items-center justify-center">
                        <span class="text-white text-xl font-bold opacity-0 group-hover:opacity-100 transition">Library & Resources</span>
                    </div>
                </div>
                
                <div class="relative h-80 rounded-3xl overflow-hidden group cursor-pointer transform hover:scale-105 transition-all md:col-span-2 shadow-lg">
                    <div class="absolute inset-0 gradient-blue flex items-center justify-center">
                        <svg class="w-24 h-24 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition flex items-center justify-center">
                        <span class="text-white text-xl font-bold opacity-0 group-hover:opacity-100 transition">Student Community</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <span class="bg-blue-100 text-blue-600 px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wide">Contact Us</span>
                <h2 class="text-5xl md:text-6xl font-black text-gray-800 mt-6 mb-4">Get In Touch</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Have questions? We're here to help you start your cyber security journey</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <div class="bg-white rounded-3xl p-10 shadow-2xl border-2 border-gray-100">
                        <h3 class="text-3xl font-black text-gray-800 mb-8">Send us a message</h3>
                        <form class="space-y-6">
                            <div>
                                <label class="block text-gray-700 font-bold mb-3">Full Name</label>
                                <input type="text" class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition" placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-3">Email Address</label>
                                <input type="email" class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition" placeholder="john@example.com">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-3">Phone Number</label>
                                <input type="tel" class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition" placeholder="+91 98765 43210">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-3">Message</label>
                                <textarea rows="4" class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition" placeholder="Tell us how we can help..."></textarea>
                            </div>
                            <button type="submit" class="w-full gradient-blue text-white py-5 rounded-xl font-black text-lg hover:opacity-90 transform hover:scale-105 transition-all shadow-xl">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <div class="bg-white rounded-3xl p-8 shadow-xl flex items-start space-x-6 hover-scale border-2 border-gray-100">
                        <div class="w-16 h-16 gradient-blue rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-gray-800 mb-3">Visit Us</h4>
                            <p class="text-gray-600 text-lg leading-relaxed">123 Cyber Street, Tech Park<br>Aurangabad, Maharashtra 431001<br>India</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-3xl p-8 shadow-xl flex items-start space-x-6 hover-scale border-2 border-gray-100">
                        <div class="w-16 h-16 gradient-blue rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-gray-800 mb-3">Call Us</h4>
                            <p class="text-gray-600 text-lg leading-relaxed">+91 98765 43210<br>+91 87654 32109<br>Mon-Sat: 9:00 AM - 6:00 PM</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-3xl p-8 shadow-xl flex items-start space-x-6 hover-scale border-2 border-gray-100">
                        <div class="w-16 h-16 gradient-blue rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-gray-800 mb-3">Email Us</h4>
                            <p class="text-gray-600 text-lg leading-relaxed">info@cybershield.edu<br>admissions@cybershield.edu<br>support@cybershield.edu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 gradient-blue rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-black">CyberShield</span>
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        Empowering the next generation of cyber security professionals with world-class training and certifications.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-xl font-black mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#home" class="text-gray-400 hover:text-blue-400 transition">Dashboard</a></li>
                        <li><a href="#courses" class="text-gray-400 hover:text-blue-400 transition">Courses</a></li>
                        <li><a href="#certificates" class="text-gray-400 hover:text-blue-400 transition">Certificates</a></li>
                        <li><a href="#blogs" class="text-gray-400 hover:text-blue-400 transition">Blog</a></li>
                        <li><a href="#gallery" class="text-gray-400 hover:text-blue-400 transition">Gallery</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-xl font-black mb-6">Resources</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition">Student Portal</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition">Career Support</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition">Study Materials</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition">Placement Cell</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition">Alumni Network</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-xl font-black mb-6">Newsletter</h4>
                    <p class="text-gray-400 mb-4">Subscribe to get updates on courses and cyber security news.</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email" class="flex-1 px-4 py-3 rounded-l-xl bg-gray-800 text-white border-2 border-gray-700 focus:border-blue-500 focus:outline-none">
                        <button class="gradient-blue px-6 py-3 rounded-r-xl font-bold hover:opacity-90 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-gray-400 text-sm">
                        © 2025 CyberShield Institute. All rights reserved.
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

    <!-- Scroll to Top Button -->
    <button id="scrollTop" class="fixed bottom-8 right-8 w-14 h-14 gradient-blue rounded-full shadow-2xl flex items-center justify-center opacity-0 pointer-events-none transition-all hover:scale-110 z-40">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking on a link
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 100) {
                navbar.classList.add('shadow-xl');
            } else {
                navbar.classList.remove('shadow-xl');
            }
            
            lastScroll = currentScroll;
        });

        // Scroll to top button
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

        // Form submission handler
        const contactForm = document.querySelector('form');
        if (contactForm) {
            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();
                alert('Thank you for your message! We will get back to you soon.');
                contactForm.reset();
            });
        }

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe sections for animation
        document.querySelectorAll('section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';
            section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(section);
        });
    </script>
</body>
</html>