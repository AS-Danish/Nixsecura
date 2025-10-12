<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberShield Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-blue {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        }
        
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            transition: all 0.3s;
            gap: 0.75rem;
            cursor: pointer;
        }

        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
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

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stat-card {
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.2);
        }

        @media (max-width: 1024px) {
            #sidebar {
                transform: translateX(-100%);
            }

            #sidebar.open {
                transform: translateX(0);
            }
        }

        .table-row:hover {
            background-color: #f9fafb;
        }

        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge-success {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-warning {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .badge-info {
            background-color: #dbeafe;
            color: #1e40af;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed left-0 top-0 h-screen w-64 gradient-blue shadow-2xl transition-transform duration-300 z-50 overflow-y-auto">
        <div class="p-6">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-black text-white">CyberShield</h2>
                </div>
                <button id="sidebarClose" class="lg:hidden text-white hover:bg-white hover:bg-opacity-20 p-2 rounded-lg transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <nav class="space-y-2">
                <a href="#" class="sidebar-link active" data-section="dashboard">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
                
                <a href="#" class="sidebar-link" data-section="courses">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <span>Courses</span>
                </a>
                
                <a href="#" class="sidebar-link" data-section="blogs">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <span>Blogs</span>
                </a>
                
                <a href="#" class="sidebar-link" data-section="certificates">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                    <span>Certificates</span>
                </a>
                
                <a href="#" class="sidebar-link" data-section="gallery">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Gallery</span>
                </a>
                
                <a href="#" class="sidebar-link" data-section="workshops">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Workshops</span>
                </a>
                
                <a href="#" class="sidebar-link" data-section="reviews">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                    <span>Reviews</span>
                </a>
                
                <a href="#" class="sidebar-link" data-section="contacts">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Contacts</span>
                </a>
                
                <a href="#" class="sidebar-link" data-section="settings">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Settings</span>
                </a>
            </nav>
            
            <div class="mt-8 pt-6 border-t border-white border-opacity-20">
                <button class="sidebar-link w-full text-left hover:bg-red-500 hover:bg-opacity-20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span>Logout</span>
                </button>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Navigation Bar -->
        <header class="bg-white shadow-sm sticky top-0 z-40">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center space-x-4">
                    <button id="mobileMenuBtn" class="lg:hidden text-gray-600 hover:text-blue-600 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <h1 class="text-2xl font-black text-gray-800" id="pageTitle">Dashboard</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button class="relative p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    
                    <div class="hidden md:flex items-center space-x-3 pl-4 border-l border-gray-200">
                        <div class="w-10 h-10 gradient-blue rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">AD</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Admin User</p>
                            <p class="text-xs text-gray-500">admin@cybershield.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- Dashboard Section -->
            <div id="dashboard" class="content-section active">
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-2xl p-6 shadow-lg stat-card border-2 border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 gradient-blue rounded-xl flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <span class="text-green-500 text-sm font-bold">+12%</span>
                        </div>
                        <h3 class="text-gray-500 text-sm font-semibold mb-1">Total Courses</h3>
                        <p class="text-3xl font-black text-gray-800">50</p>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-lg stat-card border-2 border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 gradient-blue rounded-xl flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <span class="text-green-500 text-sm font-bold">+23%</span>
                        </div>
                        <h3 class="text-gray-500 text-sm font-semibold mb-1">Total Students</h3>
                        <p class="text-3xl font-black text-gray-800">10,234</p>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-lg stat-card border-2 border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 gradient-blue rounded-xl flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                            </div>
                            <span class="text-green-500 text-sm font-bold">+18%</span>
                        </div>
                        <h3 class="text-gray-500 text-sm font-semibold mb-1">Certificates Issued</h3>
                        <p class="text-3xl font-black text-gray-800">8,921</p>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-lg stat-card border-2 border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 gradient-blue rounded-xl flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="text-yellow-500 text-sm font-bold">24 New</span>
                        </div>
                        <h3 class="text-gray-500 text-sm font-semibold mb-1">Contact Messages</h3>
                        <p class="text-3xl font-black text-gray-800">156</p>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="grid lg:grid-cols-2 gap-6">
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                        <h3 class="text-xl font-black text-gray-800 mb-6">Recent Enrollments</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 gradient-blue rounded-full flex items-center justify-center text-white font-bold">RK</div>
                                    <div>
                                        <p class="font-bold text-gray-800">Raj Kumar</p>
                                        <p class="text-sm text-gray-500">Ethical Hacking Fundamentals</p>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-500">2 hours ago</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 gradient-blue rounded-full flex items-center justify-center text-white font-bold">PS</div>
                                    <div>
                                        <p class="font-bold text-gray-800">Priya Sharma</p>
                                        <p class="text-sm text-gray-500">Network Security Expert</p>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-500">5 hours ago</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 gradient-blue rounded-full flex items-center justify-center text-white font-bold">AV</div>
                                    <div>
                                        <p class="font-bold text-gray-800">Amit Verma</p>
                                        <p class="text-sm text-gray-500">Application Security Pro</p>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-500">1 day ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                        <h3 class="text-xl font-black text-gray-800 mb-6">Upcoming Workshops</h3>
                        <div class="space-y-4">
                            <div class="p-4 bg-blue-50 border-l-4 border-blue-600 rounded-lg">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-bold text-gray-800">Advanced Penetration Testing</h4>
                                    <span class="badge badge-info">Tomorrow</span>
                                </div>
                                <p class="text-sm text-gray-600">10:00 AM - 4:00 PM</p>
                            </div>
                            <div class="p-4 bg-green-50 border-l-4 border-green-600 rounded-lg">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-bold text-gray-800">Cloud Security Fundamentals</h4>
                                    <span class="badge badge-success">In 3 days</span>
                                </div>
                                <p class="text-sm text-gray-600">2:00 PM - 6:00 PM</p>
                            </div>
                            <div class="p-4 bg-yellow-50 border-l-4 border-yellow-600 rounded-lg">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-bold text-gray-800">Web Application Security</h4>
                                    <span class="badge badge-warning">Next Week</span>
                                </div>
                                <p class="text-sm text-gray-600">9:00 AM - 1:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Courses Section -->
            <div id="courses" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-800">Manage Courses</h2>
                    <button class="gradient-blue text-white px-6 py-3 rounded-xl font-bold hover:opacity-90 transition flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span>Add New Course</span>
                    </button>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-gray-100">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Course Name</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Level</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Duration</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Students</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="table-row">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-800">Ethical Hacking Fundamentals</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-info">Beginner</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">12 Weeks</td>
                                    <td class="px-6 py-4 font-bold text-gray-800">₹12,999</td>
                                    <td class="px-6 py-4 text-gray-600">3,245</td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-success">Active</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800 p-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 p-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="table-row">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-800">Network Security Expert</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-warning">Intermediate</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">16 Weeks</td>
                                    <td class="px-6 py-4 font-bold text-gray-800">₹18,999</td>
                                    <td class="px-6 py-4 text-gray-600">2,156</td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-success">Active</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800 p-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 p-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="table-row">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-800">Application Security Pro</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-danger">Advanced</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">20 Weeks</td>
                                    <td class="px-6 py-4 font-bold text-gray-800">₹24,999</td>
                                    <td class="px-6 py-4 text-gray-600">1,876</td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-success">Active</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800 p-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 p-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Blogs Section -->
            <div id="blogs" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-800">Manage Blogs</h2>
                    <button class="gradient-blue text-white px-6 py-3 rounded-xl font-bold hover:opacity-90 transition flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span>Create New Blog</span>
                    </button>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-gray-100 hover:shadow-xl transition">
                        <div class="h-48 gradient-blue"></div>
                        <div class="p-6">
                            <div class="flex items-center space-x-2 mb-3">
                                <span class="badge badge-info">Security Tips</span>
                                <span class="text-sm text-gray-500">Published</span>
                            </div>
                            <h3 class="text-lg font-black text-gray-800 mb-2">Top 10 Cyber Security Best Practices for 2025</h3>
                            <p class="text-gray-600 text-sm mb-4">Essential security practices every organization should implement...</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Oct 5, 2025</span>
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800 p-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800 p-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-gray-100 hover:shadow-xl transition">
                        <div class="h-48 gradient-blue"></div>
                        <div class="p-6">
                            <div class="flex items-center space-x-2 mb-3">
                                <span class="badge badge-warning">Industry News</span>
                                <span class="text-sm text-gray-500">Draft</span>
                            </div>
                            <h3 class="text-lg font-black text-gray-800 mb-2">The Rise of AI in Cyber Security Defense</h3>
                            <p class="text-gray-600 text-sm mb-4">How artificial intelligence is transforming threat detection...</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Oct 4, 2025</span>
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800 p-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800 p-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-gray-100 hover:shadow-xl transition">
                        <div class="h-48 gradient-blue"></div>
                        <div class="p-6">
                            <div class="flex items-center space-x-2 mb-3">
                                <span class="badge badge-success">Career Guide</span>
                                <span class="text-sm text-gray-500">Published</span>
                            </div>
                            <h3 class="text-lg font-black text-gray-800 mb-2">Starting Your Career in Ethical Hacking</h3>
                            <p class="text-gray-600 text-sm mb-4">A comprehensive guide to launching a successful career...</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Oct 3, 2025</span>
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800 p-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800 p-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificates Section -->
            <div id="certificates" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-800">Manage Certificates</h2>
                    <button class="gradient-blue text-white px-6 py-3 rounded-xl font-bold hover:opacity-90 transition flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span>Issue Certificate</span>
                    </button>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                        <p class="text-gray-600 text-lg">No certificates issued yet</p>
                        <p class="text-gray-400 text-sm mt-2">Click "Issue Certificate" to create new certificates for students</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Section -->
            <div id="gallery" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-800">Manage Gallery</h2>
                    <button class="gradient-blue text-white px-6 py-3 rounded-xl font-bold hover:opacity-90 transition flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span>Upload Image</span>
                    </button>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-gray-600 text-lg">No images in gallery</p>
                        <p class="text-gray-400 text-sm mt-2">Click "Upload Image" to add photos to the gallery</p>
                    </div>
                </div>
            </div>

            <!-- Workshops Section -->
            <div id="workshops" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-800">Manage Workshops</h2>
                    <button class="gradient-blue text-white px-6 py-3 rounded-xl font-bold hover:opacity-90 transition flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span>Create Workshop</span>
                    </button>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h3 class="text-lg font-black text-gray-800">Advanced Penetration Testing</h3>
                                <p class="text-sm text-gray-500 mt-1">Workshop scheduled for tomorrow</p>
                            </div>
                            <span class="badge badge-info">Tomorrow</span>
                        </div>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p><strong>Time:</strong> 10:00 AM - 4:00 PM</p>
                            <p><strong>Capacity:</strong> 30 / 30 students</p>
                            <p><strong>Instructor:</strong> John Smith</p>
                        </div>
                        <button class="mt-4 w-full bg-blue-50 text-blue-600 py-2 rounded-lg font-bold hover:bg-blue-100 transition">View Details</button>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h3 class="text-lg font-black text-gray-800">Cloud Security Fundamentals</h3>
                                <p class="text-sm text-gray-500 mt-1">Workshop scheduled in 3 days</p>
                            </div>
                            <span class="badge badge-success">In 3 days</span>
                        </div>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p><strong>Time:</strong> 2:00 PM - 6:00 PM</p>
                            <p><strong>Capacity:</strong> 25 / 40 students</p>
                            <p><strong>Instructor:</strong> Sarah Johnson</p>
                        </div>
                        <button class="mt-4 w-full bg-green-50 text-green-600 py-2 rounded-lg font-bold hover:bg-green-100 transition">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div id="reviews" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-800">Manage Reviews</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 gradient-blue rounded-full flex items-center justify-center text-white font-bold">MJ</div>
                                <div>
                                    <p class="font-bold text-gray-800">Monica Johnson</p>
                                    <div class="flex space-x-1 mt-1">
                                        <span class="text-yellow-400">★</span>
                                        <span class="text-yellow-400">★</span>
                                        <span class="text-yellow-400">★</span>
                                        <span class="text-yellow-400">★</span>
                                        <span class="text-yellow-400">★</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Excellent course! The instructors are very knowledgeable and the materials are well-structured.</p>
                        <p class="text-sm text-gray-500">For: Ethical Hacking Fundamentals</p>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 gradient-blue rounded-full flex items-center justify-center text-white font-bold">DK</div>
                                <div>
                                    <p class="font-bold text-gray-800">David Kumar</p>
                                    <div class="flex space-x-1 mt-1">
                                        <span class="text-yellow-400">★</span>
                                        <span class="text-yellow-400">★</span>
                                        <span class="text-yellow-400">★</span>
                                        <span class="text-yellow-400">★</span>
                                        <span class="text-gray-300">★</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Great content and practical exercises. Could use more hands-on labs for better practice.</p>
                        <p class="text-sm text-gray-500">For: Network Security Expert</p>
                    </div>
                </div>
            </div>

            <!-- Contacts Section -->
            <div id="contacts" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-800">Contact Messages</h2>
                </div>
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-gray-100">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Subject</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="table-row">
                                    <td class="px-6 py-4 font-bold text-gray-800">Raj Patel</td>
                                    <td class="px-6 py-4 text-gray-600">raj@email.com</td>
                                    <td class="px-6 py-4 text-gray-600">Course Inquiry</td>
                                    <td class="px-6 py-4 text-gray-600">Oct 12, 2025</td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-warning">Pending</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="text-blue-600 hover:text-blue-800 p-2">View</button>
                                    </td>
                                </tr>
                                <tr class="table-row">
                                    <td class="px-6 py-4 font-bold text-gray-800">Priya Singh</td>
                                    <td class="px-6 py-4 text-gray-600">priya@email.com</td>
                                    <td class="px-6 py-4 text-gray-600">Certificate Request</td>
                                    <td class="px-6 py-4 text-gray-600">Oct 11, 2025</td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-success">Resolved</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="text-blue-600 hover:text-blue-800 p-2">View</button>
                                    </td>
                                </tr>
                                <tr class="table-row">
                                    <td class="px-6 py-4 font-bold text-gray-800">Amit Verma</td>
                                    <td class="px-6 py-4 text-gray-600">amit@email.com</td>
                                    <td class="px-6 py-4 text-gray-600">Technical Issue</td>
                                    <td class="px-6 py-4 text-gray-600">Oct 10, 2025</td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-info">In Progress</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="text-blue-600 hover:text-blue-800 p-2">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Settings Section -->
            <div id="settings" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-800">Settings</h2>
                </div>

                <div class="grid lg:grid-cols-2 gap-6">
                    <!-- General Settings -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                        <h3 class="text-xl font-black text-gray-800 mb-6">General Settings</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Platform Name</label>
                                <input type="text" value="CyberShield Academy" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Support Email</label>
                                <input type="email" value="support@cybershield.com" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" value="+1 (555) 123-4567" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600">
                            </div>
                            <button class="w-full gradient-blue text-white py-2 rounded-lg font-bold hover:opacity-90 transition">Save Changes</button>
                        </div>
                    </div>

                    <!-- Security Settings -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                        <h3 class="text-xl font-black text-gray-800 mb-6">Security Settings</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-bold text-gray-800">Two-Factor Authentication</p>
                                    <p class="text-sm text-gray-500">Add extra security to your account</p>
                                </div>
                                <input type="checkbox" class="w-5 h-5 rounded">
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-bold text-gray-800">Session Timeout</p>
                                    <p class="text-sm text-gray-500">Auto-logout after 30 minutes</p>
                                </div>
                                <input type="checkbox" class="w-5 h-5 rounded" checked>
                            </div>
                            <button class="w-full bg-red-50 text-red-600 py-2 rounded-lg font-bold hover:bg-red-100 transition">Change Password</button>
                        </div>
                    </div>

                    <!-- Email Notifications -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                        <h3 class="text-xl font-black text-gray-800 mb-6">Email Notifications</h3>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" id="new_enrollment" class="w-4 h-4 rounded" checked>
                                <label for="new_enrollment" class="text-gray-700">New Course Enrollments</label>
                            </div>
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" id="new_review" class="w-4 h-4 rounded" checked>
                                <label for="new_review" class="text-gray-700">New Reviews & Feedback</label>
                            </div>
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" id="contact_msg" class="w-4 h-4 rounded" checked>
                                <label for="contact_msg" class="text-gray-700">New Contact Messages</label>
                            </div>
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" id="system_alerts" class="w-4 h-4 rounded">
                                <label for="system_alerts" class="text-gray-700">System Alerts</label>
                            </div>
                        </div>
                    </div>

                    <!-- System Information -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-100">
                        <h3 class="text-xl font-black text-gray-800 mb-6">System Information</h3>
                        <div class="space-y-4 text-sm">
                            <div class="flex justify-between pb-2 border-b border-gray-200">
                                <span class="text-gray-600">Platform Version:</span>
                                <span class="font-bold text-gray-800">2.1.0</span>
                            </div>
                            <div class="flex justify-between pb-2 border-b border-gray-200">
                                <span class="text-gray-600">Last Updated:</span>
                                <span class="font-bold text-gray-800">Oct 5, 2025</span>
                            </div>
                            <div class="flex justify-between pb-2 border-b border-gray-200">
                                <span class="text-gray-600">Database Status:</span>
                                <span class="font-bold text-green-600">Connected</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Server Status:</span>
                                <span class="font-bold text-green-600">Online</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Sidebar Navigation
        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        const contentSections = document.querySelectorAll('.content-section');
        const pageTitle = document.getElementById('pageTitle');
        const sidebar = document.getElementById('sidebar');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebarClose = document.getElementById('sidebarClose');

        const sectionTitles = {
            'dashboard': 'Dashboard',
            'courses': 'Manage Courses',
            'blogs': 'Manage Blogs',
            'certificates': 'Manage Certificates',
            'gallery': 'Manage Gallery',
            'workshops': 'Manage Workshops',
            'reviews': 'Manage Reviews',
            'contacts': 'Contact Messages',
            'settings': 'Settings'
        };

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const sectionName = this.getAttribute('data-section');
                
                // Update active state on sidebar links
                sidebarLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                
                // Show corresponding content section
                contentSections.forEach(section => section.classList.remove('active'));
                const targetSection = document.getElementById(sectionName);
                if (targetSection) {
                    targetSection.classList.add('active');
                }
                
                // Update page title
                pageTitle.textContent = sectionTitles[sectionName] || 'Dashboard';
                
                // Close mobile sidebar if open
                if (window.innerWidth < 1024) {
                    sidebar.classList.remove('open');
                }
            });
        });

        // Mobile menu toggle
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function() {
                sidebar.classList.toggle('open');
            });
        }

        // Close sidebar button
        if (sidebarClose) {
            sidebarClose.addEventListener('click', function() {
                sidebar.classList.remove('open');
            });
        }

        // Close sidebar when clicking outside
        document.addEventListener('click', function(event) {
            if (window.innerWidth < 1024) {
                if (!sidebar.contains(event.target) && !mobileMenuBtn?.contains(event.target)) {
                    sidebar.classList.remove('open');
                }
            }
        });

        // Prevent sidebar from closing when clicking inside it
        sidebar.addEventListener('click', function(event) {
            event.stopPropagation();
        });

        // Close sidebar on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('open');
            }
        });
    </script>
</body>
</html>