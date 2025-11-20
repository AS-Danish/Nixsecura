<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Certificates - CyberShield Institute</title>
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
        
        .hover-scale {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-scale:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(37, 99, 235, 0.25);
        }
        
        .navbar-scroll {
            transition: all 0.3s ease;
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
        
        /* Mobile menu animation */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }
        
        .mobile-menu.active {
            transform: translateX(0);
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-black gradient-text">CyberShield Institute</span>
                </a>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-semibold transition">Home</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-semibold transition">Courses</a>
                    <a href="#" class="text-blue-600 font-semibold">Certificates</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-semibold transition">Workshops</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-semibold transition">Gallery</a>
                    <a href="#contact" class="gradient-bg text-white px-6 py-3 rounded-full font-bold hover:opacity-90 transition transform hover:scale-105 shadow-lg">
                        Contact Us
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
                    <a href="#" class="block py-3 px-4 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-semibold transition">Courses</a>
                    <a href="#" class="block py-3 px-4 rounded-lg bg-blue-50 text-blue-600 font-semibold">Certificates</a>
                    <a href="#" class="block py-3 px-4 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-semibold transition">Workshops</a>
                    <a href="#" class="block py-3 px-4 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-semibold transition">Gallery</a>
                    <a href="#contact" class="block py-3 px-4 rounded-lg gradient-bg text-white font-bold text-center shadow-lg">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ==================== HERO SECTION ==================== -->
    <section class="relative pt-32 pb-16 overflow-hidden bg-gradient-to-br from-blue-50 via-blue-50 to-pink-50">
        <!-- Animated Background Blobs -->
        <div class="hero-blob absolute top-10 -left-20 w-96 h-96 bg-blue-200 opacity-30 blur-3xl"></div>
        <div class="hero-blob absolute bottom-10 -right-20 w-96 h-96 bg-blue-200 opacity-30 blur-3xl" style="animation-delay: 2s;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <span class="section-badge animate-bounce">🏆 Achievements</span>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-gray-800 mt-6 mb-6 leading-tight">
                    Industry-Recognized
                    <span class="gradient-text block">Professional Certificates</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed mb-8">
                    Validate your expertise with globally recognized certifications from leading cyber security organizations and institutions
                </p>
                
                <!-- Quick Stats -->
                <div class="flex flex-wrap justify-center gap-6 mb-8">
                    <div class="bg-white rounded-2xl px-6 py-4 shadow-lg">
                        <div class="text-3xl font-black gradient-text">25+</div>
                        <div class="text-gray-600 font-semibold">Certifications</div>
                    </div>
                    <div class="bg-white rounded-2xl px-6 py-4 shadow-lg">
                        <div class="text-3xl font-black gradient-text">5K+</div>
                        <div class="text-gray-600 font-semibold">Certified Pros</div>
                    </div>
                    <div class="bg-white rounded-2xl px-6 py-4 shadow-lg">
                        <div class="text-3xl font-black gradient-text">100%</div>
                        <div class="text-gray-600 font-semibold">Recognized</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CERTIFICATES GRID SECTION ==================== -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Certificates Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($certificates as $certificate)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-xl hover-scale border-2 border-gray-100">
                        <div class="h-56 gradient-blue flex items-center justify-center relative overflow-hidden">
                            @if($certificate->image && file_exists(public_path($certificate->image)))
                                <img src="{{ asset($certificate->image) }}" alt="{{ $certificate->title }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
                            @else
                                <div class="absolute inset-0 opacity-20">
                                    <div class="absolute top-0 left-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                                    <div class="absolute bottom-0 right-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                                </div>
                                <svg class="w-24 h-24 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="mb-6">
                                <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-xs font-bold">Professional Certificate</span>
                            </div>
                            <h3 class="text-2xl font-black text-gray-800 mb-3 leading-tight">{{ $certificate->title }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed font-semibold">{{ $certificate->organization ?? 'Certified Program' }}</p>
                            <div class="flex items-center justify-between mb-6 bg-gray-50 rounded-xl p-4">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-sm font-semibold">Issued on</span>
                                </div>
                                <div class="text-base font-black text-gray-800">{{ $certificate->date->format('M d, Y') }}</div>
                            </div>
                            <a href="{{ route('certificates.view', $certificate) }}" class="w-full block text-center gradient-blue text-white py-4 rounded-xl font-bold hover:opacity-90 transform hover:scale-105 transition-all shadow-lg">
                                View Certificate →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="lg:col-span-3 text-center py-16">
                        <div class="text-gray-400 text-6xl mb-4">🏆</div>
                        <p class="text-gray-600 font-semibold text-lg">No certificates available yet.</p>
                        <p class="text-gray-500 mt-2">Check back soon for new certifications!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ==================== CTA SECTION ==================== -->
    <section class="py-20 bg-gradient-to-br from-blue-600 to-blue-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center text-white">
                <h2 class="text-4xl md:text-5xl font-black mb-6">Ready to Get Certified?</h2>
                <p class="text-xl mb-10 opacity-90 max-w-2xl mx-auto">Earn globally recognized certifications and boost your career in cyber security with our comprehensive training programs</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#contact" class="bg-white text-blue-600 px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-2xl">
                        Enroll Now →
                    </a>
                    <a href="/" class="border-2 border-white text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-blue-600 transition transform hover:scale-105">
                        Back to Home
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-black">CyberShield Institute</span>
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
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition font-medium">Courses</a></li>
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
                            <span class="text-gray-400 text-sm">123 Cyber Street, Tech District, Security City, SC 12345</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-gray-400 text-sm">+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-400 text-sm">info@cybershield.edu</span>
                        </li>
                    </ul>
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
</html