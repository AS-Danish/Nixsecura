<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nixsecura Institute - Learn Cyber Security</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1e40af  0%, #2563eb  100%);
        }
        
        .gradient-blue {
            background: linear-gradient(135deg, #1e40af  0%, #3b82f6  100%);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #1e40af  0%, #2563eb  100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #1e40af  0%, #2563eb  100%);
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px -5px rgba(79, 70, 229, 0.5);
        }
        
        .btn-secondary {
            border: 2px solid #2563eb ;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: #2563eb ;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.3);
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px -10px rgba(79, 70, 229, 0.2);
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
        
        .hero-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -5px rgba(79, 70, 229, 0.15);
        }
        
        .section-badge {
            display: inline-block;
            background: linear-gradient(135deg, #EEF2FF 0%, #E0E7FF 100%);
            color: #4F46E5;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            transition: all 0.4s ease;
        }
        
        .gallery-item:hover {
            transform: scale(1.05);
        }
        
        .gallery-item::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(79, 70, 229, 0.8), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-item:hover::after {
            opacity: 1;
        }
        
        .gallery-item .overlay-text {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            color: white;
            z-index: 10;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        
        .gallery-item:hover .overlay-text {
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- ==================== NAVBAR SECTION ==================== -->
    <x-navbar />

    <!-- ==================== HERO SECTION ==================== -->
    <section id="home" class="relative pt-32 pb-20 overflow-hidden bg-gradient-to-br from-blue-50 via-blue-50 to-pink-50">
        <!-- Animated Background Blobs -->
        <div class="hero-blob absolute top-10 -left-20 w-96 h-96 bg-blue-200 opacity-30 blur-3xl"></div>
        <div class="hero-blob absolute bottom-10 -right-20 w-96 h-96 bg-blue-200 opacity-30 blur-3xl" style="animation-delay: 2s;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left">
                    <div class="inline-block mb-6 section-badge animate-bounce text-blue-400">
                        🔐 #1 Cyber Security Institute
                    </div>
                    
                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black leading-tight mb-6">
                        Secure Your
                        <span class="block gradient-text">Future in Cyber</span>
                        <span class="gradient-text">Security</span>
                    </h1>
                    
                    <p class="text-xl text-gray-600 mb-10 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Master the art of protecting digital assets with industry-leading training, hands-on labs, and globally recognized certifications.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-12">
                        <button class="btn-primary text-white px-10 py-4 rounded-full font-bold text-lg">
                            Start Learning Today →
                        </button>
                        <button class="btn-secondary bg-white text-blue-600 px-10 py-4 rounded-full font-bold text-lg">
                            Watch Demo 🎥
                        </button>
                    </div>
                    
                    <!-- Statistics -->
                    <div class="grid grid-cols-3 gap-6 max-w-xl mx-auto lg:mx-0">
                        <div class="text-center lg:text-left">
                            <div class="text-4xl font-black gradient-text mb-1">10K+</div>
                            <div class="text-gray-600 font-medium">Students</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-4xl font-black gradient-text mb-1">98%</div>
                            <div class="text-gray-600 font-medium">Success Rate</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-4xl font-black gradient-text mb-1">50+</div>
                            <div class="text-gray-600 font-medium">Courses</div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Content - Hero Card -->
                <div class="relative hero-float">
                    <div class="bg-white rounded-3xl p-8 shadow-2xl border-4 border-blue-100">
                        <!-- Top Card -->
                        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 mb-6 text-white">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg">100% Secure Learning</h3>
                                        <p class="text-blue-100 text-sm">Certified Platform</p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative w-full bg-white bg-opacity-20 rounded-full h-3 overflow-hidden backdrop-blur-sm">
                                <div class="bg-white h-3 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <!-- Bottom Cards Grid -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gradient-to-br from-blue-50 to-blue-50 rounded-2xl p-6 text-center border-2 border-blue-100">
                                <div class="text-3xl font-black gradient-text mb-2">500+</div>
                                <div class="text-gray-700 font-semibold">Companies</div>
                            </div>
                            <div class="bg-gradient-to-br from-blue-50 to-pink-50 rounded-2xl p-6 text-center border-2 border-blue-100">
                                <div class="text-3xl font-black gradient-text mb-2">24/7</div>
                                <div class="text-gray-700 font-semibold">Support</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== STATISTICS SECTION ==================== -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="stat-card text-center">
                    <div class="text-5xl font-black gradient-text mb-3">10K+</div>
                    <div class="text-gray-600 font-semibold">Students Enrolled</div>
                </div>
                <div class="stat-card text-center">
                    <div class="text-5xl font-black gradient-text mb-3">500+</div>
                    <div class="text-gray-600 font-semibold">Companies Hiring</div>
                </div>
                <div class="stat-card text-center">
                    <div class="text-5xl font-black gradient-text mb-3">98%</div>
                    <div class="text-gray-600 font-semibold">Success Rate</div>
                </div>
                <div class="stat-card text-center">
                    <div class="text-5xl font-black gradient-text mb-3">50+</div>
                    <div class="text-gray-600 font-semibold">Expert Trainers</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== COURSES SECTION ==================== -->
    <section id="courses" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="section-badge">Our Programs</span>
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mt-6 mb-4">Popular Courses</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Choose from our industry-leading programs designed to make you job-ready</p>
            </div>
            
            <!-- Courses Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($popularCourses as $course)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-lg card-hover border-2 border-transparent hover:border-blue-200">
                        <!-- Course Image -->
                        <div class="h-52 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center relative overflow-hidden">
                            @if($course->image && file_exists(public_path($course->image)))
                                <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            @endif
                        </div>
                        
                        <!-- Course Content -->
                        <div class="p-7">
                            <div class="flex items-center justify-between mb-5">
                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-xs font-bold uppercase">
                                    {{ $course->modules ? 'Modules: '.$course->modules : 'Program' }}
                                </span>
                                <span class="text-gray-500 text-sm font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $course->duration }} Weeks
                                </span>
                            </div>
                            
                            <h3 class="text-2xl font-black text-gray-900 mb-3 leading-tight">{{ $course->name }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">{{ \Illuminate\Support\Str::limit($course->description, 120) }}</p>
                            
                            <div class="flex items-end justify-between mb-6">
                                <div>
                                    <div class="text-3xl font-black gradient-text">₹{{ number_format($course->fees) }}</div>
                                    <div class="text-xs text-gray-500 font-medium">One-time payment</div>
                                </div>
                            </div>
                            
                            <a href="{{ route('courses.view', $course) }}" class="block w-full text-center btn-primary text-white py-4 rounded-full font-bold text-base">
                                View Details →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-3 text-center py-16">
                        <div class="text-gray-400 text-6xl mb-4">📚</div>
                        <p class="text-gray-600 font-semibold text-lg">No courses available yet.</p>
                    </div>
                @endforelse
            </div>

            <!-- View More Button -->
            @if(($totalCourses ?? 0) > 3)
                <div class="mt-12 text-center">
                    <a href="{{ route('courses.public.index') }}" class="inline-block btn-secondary bg-white text-blue-600 px-10 py-4 rounded-full font-bold text-lg">
                        View More Courses
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- ==================== CERTIFICATES SECTION ==================== -->
    <section id="certificates" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="section-badge">Certifications</span>
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mt-6 mb-4">Industry-Recognized Certificates</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Get certified and unlock new career opportunities worldwide</p>
            </div>
            
            <!-- Certificates Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($popularCertificates as $certificate)
                    <div class="bg-white rounded-3xl p-8 shadow-lg card-hover border-2 border-gray-100">
                        <div class="flex items-start space-x-5">
                            <!-- Certificate Icon/Image -->
                            <div class="w-20 h-20 gradient-bg rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                @if($certificate->image && file_exists(public_path($certificate->image)))
                                    <img src="{{ asset($certificate->image) }}" alt="{{ $certificate->title }}" class="w-20 h-20 object-cover rounded-2xl">
                                @else
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6-6L7 21l-6-6"/>
                                    </svg>
                                @endif
                            </div>
                            
                            <!-- Certificate Content -->
                            <div class="flex-1">
                                <h3 class="text-2xl font-black text-gray-900 mb-2 leading-tight">{{ $certificate->title }}</h3>
                                <p class="text-gray-600 mb-3 font-medium">{{ $certificate->organization ?? 'Certified Program' }}</p>
                                <div class="text-sm text-gray-500 font-medium mb-5">📅 {{ $certificate->date->format('M d, Y') }}</div>
                                <a href="{{ route('certificates.view', $certificate) }}" class="inline-flex items-center gap-2 btn-primary text-white px-6 py-3 rounded-full font-bold text-sm">
                                    View Details →
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-3 text-center py-16">
                        <div class="text-gray-400 text-6xl mb-4">🎓</div>
                        <p class="text-gray-600 font-semibold text-lg">No certificates available yet.</p>
                    </div>
                @endforelse
            </div>
            
            <!-- View More Button -->
            @if(($totalCertificates ?? 0) > 3)
                <div class="mt-12 text-center">
                    <a href="{{ route('certificates.public.index') }}" class="inline-block btn-secondary bg-white text-blue-600 px-10 py-4 rounded-full font-bold text-lg">
                        View All Certificates
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- ==================== WORKSHOPS SECTION ==================== -->
    <section id="blogs" class="py-20 bg-gradient-to-br from-blue-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="section-badge">Latest Updates</span>
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mt-6 mb-4">Latest Workshops</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Join our hands-on workshops and learn from industry experts</p>
            </div>
            
            <!-- Workshops Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($latestWorkshops as $workshop)
                    <article class="bg-white rounded-3xl overflow-hidden shadow-lg card-hover border-2 border-transparent hover:border-blue-200">
                        <!-- Workshop Image -->
                        <div class="h-52 bg-gradient-to-br from-blue-500 to-pink-600 flex items-center justify-center relative overflow-hidden">
                            @if($workshop->image && file_exists(public_path($workshop->image)))
                                <img src="{{ asset($workshop->image) }}" alt="{{ $workshop->name }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            @endif
                        </div>
                        
                        <!-- Workshop Content -->
                        <div class="p-7">
                            <div class="flex flex-wrap items-center gap-2 mb-4">
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">📍 {{ $workshop->location }}</span>
                                <span class="text-gray-500 text-xs font-medium">
                                    {{ $workshop->start_date->format('M d, Y') }}@if($workshop->end_date) - {{ $workshop->end_date->format('M d, Y') }}@endif
                                </span>
                            </div>
                            
                            <h3 class="text-2xl font-black text-gray-900 mb-3 leading-tight">{{ $workshop->name }}</h3>
                            
                            @if(!empty($workshop->topics))
                                <p class="text-gray-600 mb-6 leading-relaxed">{{ Str::limit($workshop->topics, 100) }}</p>
                            @endif
                            
                            <a href="{{ route('workshops.view', $workshop) }}" class="inline-flex items-center text-blue-600 font-bold hover:text-blue-700 transition group">
                                Learn More
                                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="md:col-span-3 text-center py-16">
                        <div class="text-gray-400 text-6xl mb-4">🎪</div>
                        <p class="text-gray-600 font-semibold text-lg">No workshops available yet.</p>
                    </div>
                @endforelse
            </div>
            
            <!-- View More Button -->
            @if(($totalWorkshops ?? 0) > 3)
                <div class="mt-12 text-center">
                    <a href="{{ route('workshops.public.index') }}" class="inline-block btn-secondary bg-white text-blue-600 px-10 py-4 rounded-full font-bold text-lg">
                        View All Workshops
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- ==================== GALLERY SECTION ==================== -->
    <section id="gallery" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="section-badge">Institue Overview</span>
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mt-6 mb-4">Our Learning Environment</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">State-of-the-art facilities designed for hands-on cyber security training</p>
            </div>
            
            <!-- Gallery Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php $g0 = $latestGalleries->get(0); @endphp
                @if($g0 && $g0->image && file_exists(public_path($g0->image)))
                <div class="gallery-item h-72 cursor-pointer">
                    <img src="{{ asset($g0->image) }}" alt="{{ $g0->title }}" class="w-full h-full object-cover">
                    <div class="overlay-text">
                        <h4 class="font-bold text-lg">{{ $g0->title }}</h4>
                    </div>
                </div>
                @endif
                
                @php $g1 = $latestGalleries->get(1); @endphp
                @if($g1 && $g1->image && file_exists(public_path($g1->image)))
                <div class="gallery-item h-72 cursor-pointer">
                    <img src="{{ asset($g1->image) }}" alt="{{ $g1->title }}" class="w-full h-full object-cover">
                    <div class="overlay-text">
                        <h4 class="font-bold text-lg">{{ $g1->title }}</h4>
                    </div>
                </div>
                @endif
                
                @php $g2 = $latestGalleries->get(2); @endphp
                @if($g2 && $g2->image && file_exists(public_path($g2->image)))
                <div class="gallery-item h-72 cursor-pointer">
                    <img src="{{ asset($g2->image) }}" alt="{{ $g2->title }}" class="w-full h-full object-cover">
                    <div class="overlay-text">
                        <h4 class="font-bold text-lg">{{ $g2->title }}</h4>
                    </div>
                </div>
                @endif
                
                @php $g3 = $latestGalleries->get(3); @endphp
                @if($g3 && $g3->image && file_exists(public_path($g3->image)))
                <div class="gallery-item h-72 cursor-pointer">
                    <img src="{{ asset($g3->image) }}" alt="{{ $g3->title }}" class="w-full h-full object-cover">
                    <div class="overlay-text">
                        <h4 class="font-bold text-lg">{{ $g3->title }}</h4>
                    </div>
                </div>
                @endif
                
                @php $g4 = $latestGalleries->get(4); @endphp
                @if($g4 && $g4->image && file_exists(public_path($g4->image)))
                <div class="gallery-item h-72 md:col-span-2 cursor-pointer">
                    <img src="{{ asset($g4->image) }}" alt="{{ $g4->title }}" class="w-full h-full object-cover">
                    <div class="overlay-text">
                        <h4 class="font-bold text-lg">{{ $g4->title }}</h4>
                    </div>
                </div>
                @endif
                
                @php $g5 = $latestGalleries->get(5); @endphp
                @if($g5 && $g5->image && file_exists(public_path($g5->image)))
                <div class="gallery-item h-72 md:col-span-2 cursor-pointer">
                    <img src="{{ asset($g5->image) }}" alt="{{ $g5->title }}" class="w-full h-full object-cover">
                    <div class="overlay-text">
                        <h4 class="font-bold text-lg">{{ $g5->title }}</h4>
                    </div>
                </div>
                @endif
            </div>
            
            <!-- View More Button -->
            @if(($totalGalleries ?? 0) > 6)
                <div class="mt-12 text-center">
                    <a href="{{ route('galleries.public.index') }}" class="inline-block btn-secondary bg-white text-blue-600 px-10 py-4 rounded-full font-bold text-lg">
                        View All Photos
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- ==================== CONTACT SECTION ==================== -->
    <section id="contact" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="section-badge">Contact Us</span>
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mt-6 mb-4">Get In Touch</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Have questions? We're here to help you start your cyber security journey</p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-3xl p-10 shadow-xl border-2 border-blue-100">
                    <h3 class="text-3xl font-black text-gray-900 mb-8">Send us a message 💬</h3>
                    <form class="space-y-6">
                        <div>
                            <label class="block text-gray-700 font-bold mb-3">Full Name</label>
                            <input type="text" class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none" placeholder="Your Full Name">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-3">Email Address</label>
                            <input type="email" class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none" placeholder="youremail@example.com">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-3">Phone Number</label>
                            <input type="tel" class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none" placeholder="+91 7558302153">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-3">Message</label>
                            <textarea rows="4" class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition outline-none resize-none" placeholder="Tell us how we can help..."></textarea>
                        </div>
                        <button type="submit" class="w-full btn-primary text-white py-5 rounded-full font-black text-lg">
                            Send Message 🚀
                        </button>
                    </form>
                </div>
                
                <!-- Contact Information -->
                <div class="space-y-6">
                    <!-- Address -->
                    <div class="bg-white rounded-3xl p-8 shadow-lg flex items-start space-x-6 card-hover border-2 border-gray-100">
                        <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-gray-900 mb-3">Visit Us 📍</h4>
                            <p class="text-gray-600 text-lg leading-relaxed">1st Floor,Above Sodhi ENT<br>Hospital,Opp Dwarka Grand<br>Hotel,Usmanpura,Chh.Sambhaji Ngr</p>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="bg-white rounded-3xl p-8 shadow-lg flex items-start space-x-6 card-hover border-2 border-gray-100">
                        <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-gray-900 mb-3">Call Us ☎️</h4>
                            <p class="text-gray-600 text-lg leading-relaxed">+91 7558302153<br>Mon-Sat: 10:00 AM - 5:00 PM</p>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="bg-white rounded-3xl p-8 shadow-lg flex items-start space-x-6 card-hover border-2 border-gray-100">
                        <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-gray-900 mb-3">Email Us ✉️</h4>
                            <p class="text-gray-600 text-lg leading-relaxed">nixsecura@gmail.com</p>
                        </div>
                    </div>
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
                        <li><a href="#home" class="text-gray-400 hover:text-blue-400 transition font-medium">Dashboard</a></li>
                        <li><a href="#courses" class="text-gray-400 hover:text-blue-400 transition font-medium">Courses</a></li>
                        <li><a href="#certificates" class="text-gray-400 hover:text-blue-400 transition font-medium">Certificates</a></li>
                        <li><a href="#blogs" class="text-gray-400 hover:text-blue-400 transition font-medium">Blog</a></li>
                        <li><a href="#gallery" class="text-gray-400 hover:text-blue-400 transition font-medium">Gallery</a></li>
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
                
                <!-- Newsletter Column -->
                <div>
                    <h4 class="text-xl font-black mb-6">Newsletter</h4>
                    <p class="text-gray-400 mb-4 leading-relaxed">Subscribe to get updates on courses and cyber security news.</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email" class="flex-1 px-4 py-3 rounded-l-xl bg-gray-800 text-white border-2 border-gray-700 focus:border-blue-500 focus:outline-none">
                        <button class="gradient-bg px-5 py-3 rounded-r-xl hover:opacity-90 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Footer Bottom -->
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

    <!-- ==================== SCROLL TO TOP BUTTON ==================== -->
    <button id="scrollTop" class="fixed bottom-8 right-8 w-14 h-14 gradient-bg rounded-full shadow-2xl flex items-center justify-center opacity-0 pointer-events-none transition-all hover:scale-110 z-50">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <!-- ==================== JAVASCRIPT ==================== -->
    <script>
        // Mobile menu toggle (if navbar has mobile menu)
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuBtn && mobileMenu) {
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
        }

        // Navbar scroll effect (if navbar exists)
        const navbar = document.getElementById('navbar');
        if (navbar) {
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 100) {
                    navbar.classList.add('shadow-lg');
                } else {
                    navbar.classList.remove('shadow-lg');
                }
            });
        }

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

        // Contact form submission handler
        const contactForm = document.querySelector('#contact form');
        if (contactForm) {
            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();
                alert('Thank you for your message! We will get back to you soon.');
                contactForm.reset();
            });
        }
    </script>
</body>
</html>