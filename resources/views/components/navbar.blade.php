<!-- Navigation -->
    <nav class="fixed w-full bg-white shadow-md z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 gradient-blue rounded-xl flex items-center justify-center transform hover:rotate-12 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-black gradient-text">Nixsecura Institue</span>
                </div>
                
                <div class="hidden md:flex items-center space-x-10">
                    <a href="{{ url('/#home') }}" class="nav-link text-gray-700 hover:text-blue-600 font-semibold">Home</a>
                    <a href="{{ url('/#courses') }}" class="nav-link text-gray-700 hover:text-blue-600 font-semibold">Courses</a>
                    <a href="{{ url('/#certificates') }}" class="nav-link text-gray-700 hover:text-blue-600 font-semibold">Certificates</a>
                    <a href="{{ url('/#blogs') }}" class="nav-link text-gray-700 hover:text-blue-600 font-semibold">Blog</a>
                    <a href="{{ url('/#gallery') }}" class="nav-link text-gray-700 hover:text-blue-600 font-semibold">Gallery</a>
                </div>
                
                <div class="hidden md:block">
                    <a href="{{ url('/#contact') }}" class="gradient-blue text-white px-8 py-3 rounded-xl font-bold hover:opacity-90 transform hover:scale-105 transition-all shadow-lg inline-block">
                        Contact
                    </a>
                </div>
                
                <button id="mobile-menu-btn" class="md:hidden text-gray-700 hover:text-blue-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
        
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-4 py-4 space-y-4">
                <a href="{{ url('/#home') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">Home</a>
                <a href="{{ url('/#courses') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">Courses</a>
                <a href="{{ url('/#certificates') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">Certificates</a>
                <a href="{{ url('/#blogs') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">Blog</a>
                <a href="{{ url('/#gallery') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">Gallery</a>
                <a href="{{ url('/#contact') }}" class="w-full gradient-blue text-white px-6 py-3 rounded-xl font-bold text-center block">Contact</a>
            </div>
        </div>
    </nav>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Handle smooth scrolling with redirect
        document.querySelectorAll('a[href*="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const href = this.getAttribute('href');
                const [path, hash] = href.split('#');
                
                // If we're not on the home page, redirect first
                if (window.location.pathname !== '/' && path === '{{ url("/") }}') {
                    window.location.href = href;
                } else if (hash) {
                    // If we're already on the right page, smooth scroll to section
                    const target = document.getElementById(hash);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            });
        });
    </script>