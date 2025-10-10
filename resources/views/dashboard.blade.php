<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CyberShield Institute</title>
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
    <x-sidebar/>

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
                            <span class="text-white font-bold text-sm">A</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Admin User</p>
                            <p class="text-xs text-gray-500">Administrator</p>
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
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 gradient-blue rounded-full flex items-center justify-center text-white font-bold">RK</div>
                                    <div>
                                        <p class="font-bold text-gray-800">Raj Kumar</p>
                                        <p class="text-sm text-gray-500">Ethical Hacking Fundamentals</p>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-500">2 hours ago</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 gradient-blue rounded-full flex items-center justify-center text-white font-bold">PS</div>
                                    <div>
                                        <p class="font-bold text-gray-800">Priya Sharma</p>
                                        <p class="text-sm text-gray-500">Network Security Expert</p>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-500">5 hours ago</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
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

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-gray-100">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Student Name</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Course</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Certificate Type</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Issue Date</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Certificate ID</th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="table-row">
                                    <td class="px-6 py-4 font-bold text-gray-800">Rahul Mehta</td>
                                    <td class="px-6 py-4 text-gray-600">Ethical Hacking Fundamentals</td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-info">Professional</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">Oct 1, 2025</td>
                                    <td class="px-6 py-4 text-gray-600 font-mono text-sm">CS-2025-001234</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800 p-2" title="View">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </button>
                                            <button class="text-green-600 hover:text-green-800 p-2" title="Download">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="table-row">
                                    <td class="px-6 py-4 font-bold text-gray-800">Sneha Patel</td>
                                    <td class="px-6 py-4 text-gray-600">Network Security Expert</td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-warning">Specialized</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">Sep 28, 2025</td>
                                    <td class="px-6 py-4 text-gray-600 font-mono text-sm">CS-2025-001233</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800 p-2" title="View">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </button>
                                            <button class="text-green-600 hover:text-green-800 p-2" title="Download">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
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

            <!-- Gallery Section -->
            <div id="gallery" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-800">Manage Gallery</h2>
                    <button class="gradient-blue text-white px-6 py-3 rounded-xl font-bold hover:opacity-90 transition flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span>Upload Images</span>
                    </button>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <div class="relative group rounded-2xl overflow-hidden shadow-lg border-2 border-gray-100">
                        <div class="h-64 gradient-blue flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition flex items-center justify-center">
                            <div class="opacity-0 group-hover:opacity-100 transition flex space-x-2">
                                <button class="bg-white text-blue-600 p-3 rounded-lg hover:bg-blue-50 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="bg-white text-red-600 p-3 rounded-lg hover:bg-red-50 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4 bg-white">
                            <p class="font-bold text-gray-800 text-sm">Lab Environment</p>
                            <p class="text-xs text-gray-500">Uploaded: Oct 5, 2025</p>
                        </div>
                    </div>

                    <div class="relative group rounded-2xl overflow-hidden shadow-lg border-2 border-gray-100">
                        <div class="h-64 gradient-blue flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition flex items-center justify-center">
                            <div class="opacity-0 group-hover:opacity-100 transition flex space-x-2">
                                <button class="bg-white text-blue-600 p-3 rounded-lg hover:bg-blue-50 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="bg-white text-red-600 p-3 rounded-lg hover:bg-red-50 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4 bg-white">
                            <p class="font-bold text-gray-800 text-sm">Training Session</p>
                            <p class="text-xs text-gray-500">Uploaded: Oct 4, 2025</p>
                        </div>
                    </div>

                    <div class="relative group rounded-2xl overflow-hidden shadow-lg border-2 border-gray-100">
                        <div class="h-64 gradient-blue flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition flex items-center justify-center">
                            <div class="opacity-0 group-hover:opacity-100 transition flex space-x-2">
                                <button class="bg-white text-blue-600 p-3 rounded-lg hover:bg-blue-50 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="bg-white text-red-600 p-3 rounded-lg hover:bg-red-50 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4 bg-white">
                            <p class="font-bold text-gray-800 text-sm">Campus Building</p>
                            <p class="text-xs text-gray-500">Uploaded: Oct 3, 2025</p>
                        </div>
                    </div>

                    <div class="relative group rounded-2xl overflow-hidden shadow-lg border-2 border-gray-100">
                        <div class="h-64 gradient-blue flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition flex items-center justify-center">
                            <div class="opacity-0 group-hover:opacity-100 transition flex space-x-2">
                                <button class="bg-white text-blue-600 p-3 rounded-lg hover:bg-blue-50 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="bg-white text-red-600 p-3 rounded-lg hover:bg-red-50 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4 bg-white">
                            <p class="font-bold text-gray-800 text-sm">Certification Ceremony</p>
                            <p class="text-xs text-gray-500">Uploaded: Oct 2, 2025</p>
                        </div>
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
                        <span>Schedule Workshop</span>
                    </button>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-2 border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 gradient-blue rounded-xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-black text-gray-800">Advanced Penetration Testing</h3>
                                    <p class="text-sm text-gray-500">Tomorrow, Oct 7, 2025</p>
                                </div>
                            </div>
                            <span class="badge badge-info">Upcoming</span>
                        </div>
                        <p class="text-gray-600 mb-4">Learn advanced techniques for penetration testing and vulnerability assessment.</p>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                10:00 AM - 4:00 PM
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                45 Registered / 50 Max
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 gradient-blue text-white py-2 rounded-lg font-bold hover:opacity-90 transition">View Details</button>
                            <button class="px-4 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </button>
                            <button class="px-4 text-red-600 hover:bg-red-50 rounded-lg transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-6 border-2 border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 gradient-blue rounded-xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-black text-gray-800">Cloud Security Fundamentals</h3>
                                    <p class="text-sm text-gray-500">Oct 9, 2025</p>
                                </div>
                            </div>
                            <span class="badge badge-success">Open</span>
                        </div>
                        <p class="text-gray-600 mb-4">Master cloud security principles for AWS, Azure, and Google Cloud.</p>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                2:00 PM - 6:00 PM
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                32 Registered / 60 Max
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="flex-1 gradient-blue text-white py-2 rounded-lg font-bold hover:opacity-90 transition">View Details</button>
                            <button class="px-4 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </button>
                            <button class="px-4 text-red-600 hover:bg-red-50 rounded-lg transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div id="reviews" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-800">Manage Reviews</h2>
                    <div class="flex space-x-2">
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">All</button>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">Approved</button>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">Pending</button>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-2 border-gray-100">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 gradient-blue rounded-full flex items-center justify-center text-white font-bold">SK</div>
                                <div>
                                    <h4 class="font-black text-gray-800">Sanjay Kumar</h4>
                                    <p class="text-sm text-gray-500">Ethical Hacking Fundamentals</p>
                                    <div class="flex items-center mt-1">
                                        <div class="flex text-yellow-400">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-gray-500 ml-2">5.0</span>
                                    </div>
                                </div>
                            </div>
                            <span class="badge badge-success">Approved</span>
                        </div>
                        <p class="text-gray-700 mb-3">Excellent course! The instructors are knowledgeable and the hands-on labs are very practical. I learned so much about penetration testing and network security.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Oct 5, 2025</span>
                            <div class="flex space-x-2">
                                <button class="text-red-600 hover:text-red-800 p-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-6 border-2 border-yellow-200">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 gradient-blue rounded-full flex items-center justify-center text-white font-bold">NR</div>
                                <div>
                                    <h4 class="font-black text-gray-800">Neha Reddy</h4>
                                    <p class="text-sm text-gray-500">Network Security Expert</p>
                                    <div class="flex items-center mt-1">
                                        <div class="flex text-yellow-400">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-gray-500 ml-2">4.0</span>
                                    </div>
                                </div>
                            </div>
                            <span class="badge badge-warning">Pending</span>
                        </div>
                        <p class="text-gray-700 mb-3">Great content overall. The course covers all essential topics in network security. Would love to see more real-world case studies included.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Oct 4, 2025</span>
                            <div class="flex space-x-2">
                                <button class="gradient-blue text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90 transition">Approve</button>
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

            <!-- Contacts Section -->
            <div id="contacts" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-800">Contact Messages</h2>
                    <div class="flex space-x-2">
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">All</button>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">Unread</button>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">Read</button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-gray-100">
                    <div class="divide-y divide-gray-200">
                        <div class="p-6 hover:bg-gray-50 transition cursor-pointer border-l-4 border-blue-600">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h4 class="font-black text-gray-800">Vikram Singh</h4>
                                    <p class="text-sm text-gray-500">vikram.singh@email.com • +91 98765 12345</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="badge badge-info">Unread</span>
                                    <span class="text-sm text-gray-500">2 hours ago</span>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-3">I'm interested in enrolling in the Ethical Hacking Fundamentals course. Could you please provide more details about the course schedule and payment options?</p>
                            <div class="flex space-x-2">
                                <button class="gradient-blue text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90 transition text-sm">Reply</button>
                                <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition text-sm">Mark as Read</button>
                                <button class="text-red-600 hover:text-red-800 p-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="p-6 hover:bg-gray-50 transition cursor-pointer">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h4 class="font-black text-gray-800 text-gray-500">Priya Desai</h4>
                                    <p class="text-sm text-gray-500">priya.desai@email.com • +91 87654 32109</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="badge badge-success">Read</span>
                                    <span class="text-sm text-gray-500">1 day ago</span>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-3">Thank you for the information about the workshops. I've successfully registered for the Cloud Security Fundamentals workshop.</p>
                            <div class="flex space-x-2">
                                <button class="gradient-blue text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90 transition text-sm">Reply</button>
                                <button class="text-red-600 hover:text-red-800 p-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="p-6 hover:bg-gray-50 transition cursor-pointer border-l-4 border-blue-600">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h4 class="font-black text-gray-800">Aditya Sharma</h4>
                                    <p class="text-sm text-gray-500">aditya.sharma@email.com • +91 90123 45678</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="badge badge-info">Unread</span>
                                    <span class="text-sm text-gray-500">3 hours ago</span>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-3">Can you provide information about job placement assistance after course completion? I'm particularly interested in the Application Security Pro course.</p>
                            <div class="flex space-x-2">
                                <button class="gradient-blue text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90 transition text-sm">Reply</button>
                                <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition text-sm">Mark as Read</button>
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

            <!-- Settings Section -->
            <div id="settings" class="content-section">
                <h2 class="text-2xl font-black text-gray-800 mb-6">Settings</h2>
                
                <div class="grid lg:grid-cols-2 gap-6">
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-2 border-gray-100">
                        <h3 class="text-xl font-black text-gray-800 mb-6">General Settings</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Institute Name</label>
                                <input type="text" value="CyberShield Institute" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Email Address</label>
                                <input type="email" value="info@cybershield.edu" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Phone Number</label>
                                <input type="tel" value="+91 98765 43210" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Address</label>
                                <textarea rows="3" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">123 Cyber Street, Tech Park, Aurangabad, Maharashtra 431001, India</textarea>
                            </div>
                            <button class="gradient-blue text-white px-6 py-3 rounded-xl font-bold hover:opacity-90 transition w-full">Save Changes</button>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-6 border-2 border-gray-100">
                        <h3 class="text-xl font-black text-gray-800 mb-6">Social Media Links</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Facebook</label>
                                <input type="url" placeholder="https://facebook.com/cybershield" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Twitter</label>
                                <input type="url" placeholder="https://twitter.com/cybershield" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">LinkedIn</label>
                                <input type="url" placeholder="https://linkedin.com/company/cybershield" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Instagram</label>
                                <input type="url" placeholder="https://instagram.com/cybershield" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                            </div>
                            <button class="gradient-blue text-white px-6 py-3 rounded-xl font-bold hover:opacity-90 transition w-full">Update Links</button>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-6 border-2 border-gray-100">
                        <h3 class="text-xl font-black text-gray-800 mb-6">Security Settings</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Current Password</label>
                                <input type="password" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">New Password</label>
                                <input type="password" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Confirm New Password</label>
                                <input type="password" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                            </div>
                            <button class="gradient-blue text-white px-6 py-3 rounded-xl font-bold hover:opacity-90 transition w-full">Change Password</button>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-6 border-2 border-gray-100">
                        <h3 class="text-xl font-black text-gray-800 mb-6">Notification Preferences</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div>
                                    <p class="font-bold text-gray-800">Email Notifications</p>
                                    <p class="text-sm text-gray-600">Receive email updates</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div>
                                    <p class="font-bold text-gray-800">New Enrollments</p>
                                    <p class="text-sm text-gray-600">Notify on new student enrollments</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div>
                                    <p class="font-bold text-gray-800">Contact Messages</p>
                                    <p class="text-sm text-gray-600">Notify on new contact submissions</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div>
                                    <p class="font-bold text-gray-800">New Reviews</p>
                                    <p class="text-sm text-gray-600">Notify on new course reviews</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
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

        // Section titles mapping
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

        // Handle sidebar link clicks
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Get section name
                const sectionName = this.getAttribute('data-section');
                
                // Remove active class from all links
                sidebarLinks.forEach(l => l.classList.remove('active'));
                
                // Add active class to clicked link
                this.classList.add('active');
                
                // Hide all content sections
                contentSections.forEach(section => {
                    section.classList.remove('active');
                });
                
                // Show selected content section
                const targetSection = document.getElementById(sectionName);
                if (targetSection) {
                    targetSection.classList.add('active');
                }
                
                // Update page title
                pageTitle.textContent = sectionTitles[sectionName] || 'Dashboard';
                
                // Close sidebar on mobile
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

        if (sidebarClose) {
            sidebarClose.addEventListener('click', function() {
                sidebar.classList.remove('open');
            });
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth < 1024) {
                if (!sidebar.contains(event.target) && !mobileMenuBtn?.contains(event.target)) {
                    sidebar.classList.remove('open');
                }
            }
        });

        // Prevent closing when clicking inside sidebar
        sidebar.addEventListener('click', function(event) {
            event.stopPropagation();
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('open');
            }
        });

        // Sample alert for button clicks
        document.querySelectorAll('button').forEach(button => {
            if (!button.hasAttribute('data-section') && 
                button.id !== 'mobileMenuBtn' && 
                button.id !== 'sidebarClose' &&
                !button.closest('.sidebar-link')) {
                button.addEventListener('click', function(e) {
                    const buttonText = this.textContent.trim() || this.title || 'Action';
                    if (buttonText && !['', 'Logout'].includes(buttonText)) {
                        console.log(`Button clicked: ${buttonText}`);
                    }
                });
            }
        });

        // Initialize tooltips for action buttons
        document.querySelectorAll('[title]').forEach(element => {
            element.style.position = 'relative';
        });

        // Smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading state for forms
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    const originalText = submitBtn.textContent;
                    submitBtn.textContent = 'Saving...';
                    submitBtn.disabled = true;
                    
                    setTimeout(() => {
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                        alert('Changes saved successfully!');
                    }, 1500);
                }
            });
        });

        // Auto-hide alerts/notifications
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>