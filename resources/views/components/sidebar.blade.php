<!-- resources/views/components/sidebar.blade.php -->
<aside id="sidebar" class="fixed left-0 top-0 h-screen bg-gradient-to-br from-blue-600 to-blue-800 text-white transition-all duration-300 z-50 shadow-2xl sidebar-expanded">
    <div class="flex flex-col h-full">
        <!-- Logo Section -->
        <div class="flex items-center justify-between px-6 py-6 border-b border-blue-700">
            <div class="flex items-center space-x-3 sidebar-content overflow-hidden">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <span class="text-xl font-black whitespace-nowrap sidebar-text">CyberShield</span>
            </div>
            <button id="sidebarToggle" class="text-white hover:bg-blue-700 p-2 rounded-lg transition flex-shrink-0" title="Toggle Sidebar">
                <svg class="w-5 h-5 toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/>
                </svg>
            </button>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-2 custom-scrollbar">
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" data-section="dashboard" title="Dashboard">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="sidebar-text whitespace-nowrap">Dashboard</span>
            </a>

            <a href="{{ route('courses.index') }}" class="sidebar-link {{ request()->routeIs('courses.*') ? 'active' : '' }}" data-section="courses" title="Courses">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <span class="sidebar-text whitespace-nowrap">Courses</span>
            </a>

            <a href="{{ route('blogs.index') }}" class="sidebar-link {{ request()->routeIs('blogs.*') ? 'active' : '' }}" data-section="blogs" title="Blogs">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <span class="sidebar-text whitespace-nowrap">Blogs</span>
            </a>

            <a href="{{ route('certificates.index') }}" class="sidebar-link {{ request()->routeIs('certificates.*') ? 'active' : '' }}" data-section="certificates" title="Certificates">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <span class="sidebar-text whitespace-nowrap">Certificates</span>
            </a>

            <a href="{{ route('galleries.index') }}" class="sidebar-link {{ request()->routeIs('galleries.*') ? 'active' : '' }}" title="Gallery">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="sidebar-text whitespace-nowrap">Gallery</span>
            </a>

            <a href="{{ route('workshops.index') }}" class="sidebar-link {{ request()->routeIs('workshops.*') ? 'active' : '' }}" title="Workshops">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="sidebar-text whitespace-nowrap">Workshops</span>
            </a>

            <a href="#" class="sidebar-link" title="Reviews">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
                <span class="sidebar-text whitespace-nowrap">Reviews</span>
            </a>

            <a href="#" class="sidebar-link" title="Contact Messages">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span class="sidebar-text whitespace-nowrap">Contact Messages</span>
            </a>

            <div class="pt-4 mt-4 border-t border-blue-700">
                <a href="{{ route('profile.edit') }}" class="sidebar-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}" title="Settings">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="sidebar-text whitespace-nowrap">Settings</span>
                </a>

                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" id="logoutForm" class="mt-2">
                    @csrf
                    <button type="submit" class="sidebar-link w-full text-left" title="Logout" onclick="return confirmLogout(event)">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span class="sidebar-text whitespace-nowrap">Logout</span>
                    </button>
                </form>
            </div>
        </nav>

        <!-- User Profile Section -->
        <div class="px-4 py-4 border-t border-blue-700">
            <div class="flex items-center space-x-3 p-3 bg-blue-700 bg-opacity-50 rounded-xl hover:bg-opacity-70 transition sidebar-profile">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-blue-600 font-bold text-sm">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</span>
                </div>
                <div class="flex-1 min-w-0 sidebar-text overflow-hidden">
                    <p class="text-sm font-bold truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                    <p class="text-xs text-blue-200 truncate">{{ Auth::user()->email ?? 'admin@cybershield.edu' }}</p>
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- Overlay for mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

<style>
    /* Sidebar States */
    #sidebar {
        width: 256px;
    }

    #sidebar.sidebar-collapsed {
        width: 80px;
    }

    /* Hide scrollbar */
    .custom-scrollbar {
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE and Edge */
    }

    .custom-scrollbar::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera */
    }

    /* Hide text when collapsed */
    #sidebar.sidebar-collapsed .sidebar-text {
        opacity: 0;
        width: 0;
        overflow: hidden;
        display: none;
    }

    /* Center icons when collapsed */
    #sidebar.sidebar-collapsed .sidebar-link {
        justify-content: center;
        padding: 0.75rem;
    }

    #sidebar.sidebar-collapsed .sidebar-profile {
        justify-content: center;
        padding: 0.75rem;
    }

    #sidebar.sidebar-collapsed .sidebar-content {
        justify-content: center;
    }

    /* Sidebar Link Styles */
    .sidebar-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        border-radius: 0.75rem;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 600;
        transition: all 0.3s;
        gap: 0.75rem;
        position: relative;
        text-decoration: none;
        border: none;
        background: none;
        cursor: pointer;
    }

    .sidebar-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
    }

    #sidebar:not(.sidebar-collapsed) .sidebar-link:hover {
        transform: translateX(4px);
    }

    .sidebar-link.active {
        background-color: white;
        color: #2563eb;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .sidebar-link.active svg {
        color: #2563eb;
    }

    /* Tooltip for collapsed state */
    #sidebar.sidebar-collapsed .sidebar-link::after {
        content: attr(title);
        position: absolute;
        left: 100%;
        margin-left: 0.5rem;
        padding: 0.5rem 1rem;
        background-color: #1e293b;
        color: white;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.2s;
        z-index: 100;
    }

    #sidebar.sidebar-collapsed .sidebar-link:hover::after {
        opacity: 1;
    }

    /* Toggle button icon rotation */
    #sidebar.sidebar-collapsed .toggle-icon {
        transform: rotate(180deg);
    }

    .toggle-icon {
        transition: transform 0.3s;
    }

    /* Mobile Styles */
    @media (max-width: 1024px) {
        #sidebar {
            transform: translateX(-100%);
            width: 256px !important;
        }

        #sidebar.sidebar-open {
            transform: translateX(0);
        }

        #sidebar.sidebar-collapsed .sidebar-text {
            opacity: 1;
            width: auto;
            display: block;
        }

        #sidebar.sidebar-collapsed .sidebar-link {
            justify-content: flex-start;
            padding: 0.75rem 1rem;
        }

        #sidebar.sidebar-collapsed .sidebar-profile {
            justify-content: flex-start;
            padding: 0.75rem;
        }

        #sidebar.sidebar-open ~ #sidebarOverlay {
            display: block;
        }

        #sidebar.sidebar-collapsed .toggle-icon {
            transform: none;
        }

        /* Hide tooltips on mobile */
        #sidebar.sidebar-collapsed .sidebar-link::after {
            display: none;
        }
    }
</style>

<script>
    // Confirm logout function
    function confirmLogout(event) {
        // You can add a confirmation dialog if needed
        // return confirm('Are you sure you want to logout?');
        return true; // Allow form submission
    }

    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        // Check saved state
        const sidebarState = localStorage.getItem('sidebarState');
        if (sidebarState === 'collapsed' && window.innerWidth >= 1024) {
            sidebar.classList.remove('sidebar-expanded');
            sidebar.classList.add('sidebar-collapsed');
        }

        // Toggle sidebar
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                
                if (window.innerWidth < 1024) {
                    // Mobile: Open/Close sidebar
                    sidebar.classList.toggle('sidebar-open');
                } else {
                    // Desktop: Expand/Collapse sidebar
                    sidebar.classList.toggle('sidebar-collapsed');
                    sidebar.classList.toggle('sidebar-expanded');
                    
                    // Save state
                    if (sidebar.classList.contains('sidebar-collapsed')) {
                        localStorage.setItem('sidebarState', 'collapsed');
                    } else {
                        localStorage.setItem('sidebarState', 'expanded');
                    }
                }
            });
        }

        // Mobile menu button
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                sidebar.classList.toggle('sidebar-open');
            });
        }

        // Close sidebar when clicking overlay
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.remove('sidebar-open');
            });
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth < 1024) {
                if (!sidebar.contains(event.target) && 
                    !mobileMenuBtn?.contains(event.target) &&
                    sidebar.classList.contains('sidebar-open')) {
                    sidebar.classList.remove('sidebar-open');
                }
            }
        });

        // Prevent sidebar clicks from closing it
        sidebar.addEventListener('click', function(event) {
            event.stopPropagation();
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('sidebar-open');
                const savedState = localStorage.getItem('sidebarState');
                if (savedState === 'collapsed') {
                    sidebar.classList.add('sidebar-collapsed');
                    sidebar.classList.remove('sidebar-expanded');
                } else {
                    sidebar.classList.remove('sidebar-collapsed');
                    sidebar.classList.add('sidebar-expanded');
                }
            }
        });
    });
</script>