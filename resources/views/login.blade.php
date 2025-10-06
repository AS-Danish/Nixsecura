<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - CyberShield Institute</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        html, body {
            overflow-x: hidden;
            width: 100%;
        }
        
        body {
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 50%, #1e40af 100%);
            min-height: 100vh;
            position: relative;
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
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .blob {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: blob 8s ease-in-out infinite;
            position: absolute;
        }
        
        @keyframes blob {
            0%, 100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
            25% { border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%; }
            50% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; }
            75% { border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-float-delay {
            animation: float 6s ease-in-out infinite;
            animation-delay: 3s;
        }
        
        .input-focus {
            transition: all 0.3s ease;
        }
        
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.15);
        }
        
        .login-btn {
            transition: all 0.3s ease;
        }
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.4);
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 30px rgba(37, 99, 235, 0.3); }
            50% { box-shadow: 0 0 50px rgba(37, 99, 235, 0.6); }
        }
        
        .glow-card {
            animation: pulse-glow 3s ease-in-out infinite;
        }
        
        .shield-icon {
            filter: drop-shadow(0 10px 20px rgba(37, 99, 235, 0.3));
        }
    </style>
</head>
<body>
    <!-- Animated background blobs -->
    <div class="blob w-96 h-96 bg-blue-400 opacity-20 top-0 left-0 animate-float"></div>
    <div class="blob w-80 h-80 bg-blue-300 opacity-20 bottom-0 right-0 animate-float-delay"></div>
    <div class="blob w-64 h-64 bg-blue-500 opacity-15 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" style="animation-delay: 1.5s;"></div>

    <!-- Login Container -->
    <div class="min-h-screen flex items-center justify-center px-4 py-12 relative z-10">
        <div class="max-w-md w-full">
            <!-- Logo and Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 gradient-blue rounded-2xl flex items-center justify-center shadow-2xl glow-card shield-icon">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl font-black text-white mb-2">Admin Portal</h1>
                <p class="text-blue-100 text-lg">CyberShield Institute</p>
            </div>

            <!-- Login Card -->
            <div class="glass-effect rounded-3xl shadow-2xl p-8 glow-card">
                <div class="mb-8">
                    <h2 class="text-3xl font-black text-gray-800 mb-2">Welcome Back</h2>
                    <p class="text-gray-600">Sign in to access the admin dashboard</p>
                </div>

                <form id="loginForm" class="space-y-6">
                    <!-- Email Input -->
                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="email">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input 
                                type="email" 
                                id="email" 
                                class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition input-focus outline-none"
                                placeholder="admin@cybershield.edu"
                                required
                            >
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="password">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                class="w-full pl-12 pr-12 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition input-focus outline-none"
                                placeholder="••••••••"
                                required
                            >
                            <button 
                                type="button" 
                                id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center"
                            >
                                <svg id="eyeIcon" class="w-5 h-5 text-gray-400 hover:text-gray-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer">
                            <span class="ml-2 text-gray-700 font-semibold">Remember me</span>
                        </label>
                        <a href="#" class="text-blue-600 font-bold hover:text-blue-700 transition">
                            Forgot Password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full gradient-blue text-white py-4 rounded-xl font-black text-lg shadow-xl login-btn"
                    >
                        Sign In
                    </button>

                    <!-- Back to Website Button -->
                    <div class="mt-6">
                        <a href="/" class="flex items-center justify-center space-x-2 w-full p-4 bg-gray-100 hover:bg-gray-200 rounded-xl border-2 border-gray-200 transition font-bold text-gray-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span>Back to Website</span>
                        </a>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8">
                <p class="text-blue-100 text-sm">
                    © 2025 CyberShield Institute. All rights reserved.
                </p>
                <div class="flex justify-center space-x-4 mt-4 text-xs">
                    <a href="#" class="text-blue-100 hover:text-white transition">Privacy Policy</a>
                    <span class="text-blue-200">•</span>
                    <a href="#" class="text-blue-100 hover:text-white transition">Terms of Service</a>
                    <span class="text-blue-200">•</span>
                    <a href="#" class="text-blue-100 hover:text-white transition">Support</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            if (type === 'text') {
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                `;
            } else {
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                `;
            }
        });

        // Form submission
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Show loading state
            const submitBtn = loginForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Signing In...';
            submitBtn.disabled = true;
            
            // Simulate authentication (replace with actual authentication)
            setTimeout(() => {
                alert(`Login successful!\n\nEmail: ${email}\n\nRedirecting to dashboard...`);
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                loginForm.reset();
            }, 1500);
        });

        // Add floating animation to blobs with random delays
        document.querySelectorAll('.blob').forEach((blob, index) => {
            blob.style.animationDelay = `${index * 0.5}s`;
        });
    </script>
</body>
</html>