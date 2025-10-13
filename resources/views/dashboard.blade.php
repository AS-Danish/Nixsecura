<x-app-layout>
    <x-slot name="page-title">Dashboard</x-slot>

    <!-- Dashboard Section -->
    <div id="dashboard">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition border-2 border-gray-100" style="transition: all 0.3s;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="text-green-500 text-sm font-bold">+12%</span>
                </div>
                <h3 class="text-gray-500 text-sm font-semibold mb-1">Total Courses</h3>
                <p class="text-3xl font-black text-gray-800">50</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition border-2 border-gray-100" style="transition: all 0.3s;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <span class="text-green-500 text-sm font-bold">+23%</span>
                </div>
                <h3 class="text-gray-500 text-sm font-semibold mb-1">Total Students</h3>
                <p class="text-3xl font-black text-gray-800">10,234</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition border-2 border-gray-100" style="transition: all 0.3s;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <span class="text-green-500 text-sm font-bold">+18%</span>
                </div>
                <h3 class="text-gray-500 text-sm font-semibold mb-1">Certificates Issued</h3>
                <p class="text-3xl font-black text-gray-800">8,921</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition border-2 border-gray-100" style="transition: all 0.3s;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl flex items-center justify-center">
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
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center text-white font-bold">RK</div>
                            <div>
                                <p class="font-bold text-gray-800">Raj Kumar</p>
                                <p class="text-sm text-gray-500">Ethical Hacking Fundamentals</p>
                            </div>
                        </div>
                        <span class="text-xs text-gray-500">2 hours ago</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center text-white font-bold">PS</div>
                            <div>
                                <p class="font-bold text-gray-800">Priya Sharma</p>
                                <p class="text-sm text-gray-500">Network Security Expert</p>
                            </div>
                        </div>
                        <span class="text-xs text-gray-500">5 hours ago</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center text-white font-bold">AV</div>
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
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">Tomorrow</span>
                        </div>
                        <p class="text-sm text-gray-600">10:00 AM - 4:00 PM</p>
                    </div>
                    <div class="p-4 bg-green-50 border-l-4 border-green-600 rounded-lg">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-bold text-gray-800">Cloud Security Fundamentals</h4>
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">In 3 days</span>
                        </div>
                        <p class="text-sm text-gray-600">2:00 PM - 6:00 PM</p>
                    </div>
                    <div class="p-4 bg-yellow-50 border-l-4 border-yellow-600 rounded-lg">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-bold text-gray-800">Web Application Security</h4>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold">Next Week</span>
                        </div>
                        <p class="text-sm text-gray-600">9:00 AM - 1:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>