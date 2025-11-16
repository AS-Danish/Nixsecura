<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Details - CyberShield Institute</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .gradient-blue { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); }
        .gradient-text { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); }
        .fade-in { animation: fadeIn 0.5s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .stat-card { transition: all 0.3s ease; }
        .stat-card:hover { transform: scale(1.05); }
        .cert-image-container { min-height: 300px; position: relative; overflow: hidden; }
        .cert-image-container img { width: 100%; height: 100%; object-fit: cover; display: block; }
    </style>
</head>
<body class="bg-gray-50">
    <header class="bg-white border-b shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button onclick="window.history.back()" class="flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50 transition-all duration-200 group">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span class="text-sm font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">Back</span>
                    </button>
                    <a href="/" class="text-xl font-black gradient-text">CyberShield Institute</a>
                </div>
                <div class="flex items-center gap-4">
                    <a href="/certificates/all" class="text-sm text-blue-600 font-semibold hover:text-blue-700 transition-colors">View All Certificates</a>
                    <a href="/" class="text-sm text-gray-700 font-semibold hover:text-blue-600 transition-colors">Home</a>
                </div>
            </div>
        </div>
    </header>

    <main class="py-12 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="loading" class="text-center py-20">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
                <p class="mt-4 text-gray-600">Loading certificate...</p>
            </div>

            <div id="error" class="hidden text-center py-20">
                <div class="text-red-600 text-xl font-bold mb-4">Certificate not found</div>
                <a href="/certificates/all" class="text-blue-600 hover:text-blue-700">View All Certificates</a>
            </div>

            <div id="content" class="hidden grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 fade-in">
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-blue-50 card-hover">
                        <div id="cert-image-container" class="cert-image-container gradient-blue flex items-center justify-center">
                            <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="p-8 lg:p-10">
                            <div class="mb-6">
                                <h1 id="cert-title" class="text-4xl md:text-5xl font-black text-gray-900 mb-3 leading-tight"></h1>
                                <p id="cert-organization" class="text-lg text-gray-600 font-medium"></p>
                            </div>

                            <div class="grid sm:grid-cols-3 gap-4 mb-8">
                                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-5 border border-blue-200 stat-card">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <div class="text-sm text-blue-700 font-semibold">Issued On</div>
                                    </div>
                                    <div id="cert-date" class="text-xl font-black text-gray-900"></div>
                                </div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-5 border border-purple-200 stat-card">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                        </svg>
                                        <div class="text-sm text-purple-700 font-semibold">Certificate ID</div>
                                    </div>
                                    <div id="cert-id" class="text-xl font-black text-gray-900"></div>
                                </div>
                                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-5 border border-green-200 stat-card">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                        <div class="text-sm text-green-700 font-semibold">Issuer</div>
                                    </div>
                                    <div id="cert-issuer" class="text-xl font-black text-gray-900"></div>
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center gap-4">
                                <a href="/certificates/all" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold bg-gradient-to-r from-blue-600 to-blue-700 text-white hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    View All Certificates
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="space-y-6 fade-in" style="animation-delay: 0.1s;">
                    <div class="bg-white rounded-3xl shadow-xl border border-blue-50 p-8 card-hover">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-black text-gray-900">Quick Info</h3>
                        </div>
                        <ul class="space-y-4 text-gray-700">
                            <li class="flex justify-between items-start py-3 border-b border-gray-100">
                                <span class="font-bold text-gray-600">Title:</span>
                                <span id="sidebar-title" class="text-right text-sm font-medium text-gray-900 ml-2"></span>
                            </li>
                            <li class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="font-bold text-gray-600">Date:</span>
                                <span id="sidebar-date" class="text-sm font-medium text-gray-900"></span>
                            </li>
                            <li class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="font-bold text-gray-600">Organization:</span>
                                <span id="sidebar-org" class="text-sm font-medium text-gray-900"></span>
                            </li>
                            <li class="flex justify-between items-center py-3">
                                <span class="font-bold text-gray-600">ID:</span>
                                <span id="sidebar-id" class="text-sm font-medium text-gray-900"></span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-3xl shadow-xl border border-blue-100 p-8 card-hover">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-gray-900">Share</h3>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Share this certificate with others</p>
                        <button onclick="copyToClipboard()" class="w-full px-6 py-3 rounded-xl font-bold bg-white text-blue-600 border-2 border-blue-200 hover:bg-blue-50 transition-all duration-300 flex items-center justify-center gap-2 shadow-sm hover:shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            Copy Link
                        </button>
                        <p id="copy-message" class="hidden text-center text-green-600 font-semibold mt-3 text-sm">✓ Link copied to clipboard!</p>
                    </div>
                </aside>
            </div>
        </div>
    </main>

    <script>
        const pathParts = window.location.pathname.split('/');
        const certificateId = pathParts[2];

        console.log('Certificate ID:', certificateId);
        console.log('Fetching from:', `/certificates/${certificateId}/json`);

        fetch(`/certificates/${certificateId}/json`)
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    throw new Error('Certificate not found');
                }
                return response.json();
            })
            .then(certificate => {
                console.log('Certificate data:', certificate);
                
                document.getElementById('loading').classList.add('hidden');
                document.getElementById('content').classList.remove('hidden');

                document.title = `${certificate.title} - Certificate Details`;
                document.getElementById('cert-title').textContent = certificate.title;
                document.getElementById('cert-organization').textContent = certificate.organization || 'Certified Program';

                const dateObj = new Date(certificate.date);
                const formattedDate = dateObj.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                });
                document.getElementById('cert-date').textContent = formattedDate;
                document.getElementById('cert-id').textContent = `#${certificate.id}`;
                document.getElementById('cert-issuer').textContent = certificate.organization || 'N/A';

                document.getElementById('sidebar-title').textContent = certificate.title;
                document.getElementById('sidebar-date').textContent = formattedDate;
                document.getElementById('sidebar-org').textContent = certificate.organization || 'N/A';
                document.getElementById('sidebar-id').textContent = `#${certificate.id}`;

                const imageContainer = document.getElementById('cert-image-container');
                
                if (certificate.image) {
                    console.log('Loading image:', certificate.image);
                    
                    const img = document.createElement('img');
                    img.alt = certificate.title;
                    img.className = 'w-full h-full object-cover';
                    
                    img.onload = function() {
                        console.log('Image loaded successfully');
                        imageContainer.innerHTML = '';
                        imageContainer.appendChild(img);
                    };
                    
                    img.onerror = function() {
                        console.error('Image failed to load:', certificate.image);
                        imageContainer.innerHTML = `
                            <div class="text-center">
                                <svg class="w-24 h-24 text-white mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-white text-sm">Image not available</p>
                            </div>
                        `;
                    };
                    
                    img.src = certificate.image;
                } else {
                    console.log('No image provided in certificate data');
                    imageContainer.innerHTML = `
                        <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('loading').classList.add('hidden');
                document.getElementById('error').classList.remove('hidden');
            });

        function copyToClipboard() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                const message = document.getElementById('copy-message');
                message.classList.remove('hidden');
                setTimeout(() => {
                    message.classList.add('hidden');
                }, 3000);
            }).catch(err => {
                console.error('Failed to copy:', err);
            });
        }
    </script>
</body>
</html>