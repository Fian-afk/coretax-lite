<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EconoDocs - Repository Dokumen Ekonomi Terlengkap</title>
    <link rel="stylesheet" href="css/app.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#3b82f6',secondary:'#10b981'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
        }
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.5rem center;
            background-size: 1.5em 1.5em;
        }
        .document-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .document-card {
            transition: all 0.2s ease;
        }
        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .badge-research {
            background-color: rgba(87, 181, 231, 0.1);
            color: rgba(87, 181, 231, 1);
        }
        .badge-financial {
            background-color: rgba(141, 211, 199, 0.1);
            color: rgba(141, 211, 199, 1);
        }
        .badge-market {
            background-color: rgba(251, 191, 114, 0.1);
            color: rgba(251, 191, 114, 1);
        }
        .badge-ebook {
            background-color: rgba(252, 141, 98, 0.1);
            color: rgba(252, 141, 98, 1);
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <a href="<?php echo e(route('dashboard')); ?>" class="text-3xl font-['Pacifico'] text-primary">EconoDocs</a>
            </div>
            
            <div class="relative mx-4 flex-grow max-w-xl">
                <div class="relative">
                    <input type="text" placeholder="Cari dokumen ekonomi..." class="w-full pl-10 pr-10 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center text-gray-400">
                        <i class="ri-search-line"></i>
                    </div>
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center text-gray-400 cursor-pointer">
                        <i class="ri-filter-3-line"></i>
                    </div>
                </div>
            </div>
            
            <nav class="hidden md:flex items-center space-x-6">
                <a href="<?php echo e(route('dashboard')); ?>" class="text-gray-900 hover:text-primary font-medium text-sm">Beranda</a>
                <a href="<?php echo e(route('dokumen.index')); ?>" class="text-gray-600 hover:text-primary font-medium text-sm">Dokumen</a>
                <a href="<?php echo e(route('dokumen.upload')); ?>" class="text-gray-600 hover:text-primary font-medium text-sm">Upload</a>
                
                <div class="relative">
                    <button id="popupBtn" class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                        <i class="ri-user-line text-xl text-gray-600"></i>
                    </button>
                </div>
            </nav>
        </div>
    </header>
    <div id="popupProfil" class="bg-white p-4 rounded-lg shadow-md fixed hidden top-[72px] right-16 z-50 w-xl content-start">
        <div id="profil" class="mb-4">
            <i class="ri-user-3-fill text-lg text-gray-600 hover:text-primary"></i>
            <a href="<?php echo e(route('profil')); ?>" class="text-sm text-gray-600 hover:text-primary px-4">Profil</a>
        </div>
        <hr class="border-gray-200 my-2">
        <div id="logout" class="mt-4">
            <i class="ri-logout-box-r-line text-lg text-gray-600 hover:text-primary"></i>
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                <?php echo csrf_field(); ?>
                <button type="submit" class="text-sm text-gray-600 hover:text-primary px-4 bg-transparent border-none cursor-pointer">Logout</button>
            </form>
        </div>
    </div>

        <main class="container mx-auto px-4 py-8">
            <!-- Page Title -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Repository Dokumen Ekonomi</h1>
                <p class="mt-2 text-gray-600">Temukan dan unduh dokumen riset, laporan keuangan, analisis pasar, dan e-book ekonomi digital.</p>
            </div>

            <!-- Search Bar -->
            <div class="mb-6">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <i class="ri-search-line text-gray-400"></i>
                    </div>
                    <input type="text" class="search-input w-full bg-white border border-gray-200 rounded-md py-3 pl-12 pr-4 text-gray-700 focus:border-primary transition duration-150 ease-in-out" placeholder="Cari dokumen berdasarkan judul, kategori, atau kata kunci...">
                </div>
            </div>

            <!-- Filters -->
            <div class="bg-white p-4 rounded-md shadow-sm mb-8">
                <div class="flex flex-col md:flex-row md:items-center gap-4">
                    <div class="w-full md:w-1/3">
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <div class="relative">
                            <select id="category" class="custom-select w-full bg-white border border-gray-200 rounded-md py-2.5 px-4 pr-8 text-gray-700 focus:border-primary focus:outline-none">
                                <option value="">Semua Kategori</option>
                                <option value="research">Riset</option>
                                <option value="financial">Laporan Keuangan</option>
                                <option value="market">Analisis Pasar</option>
                                <option value="ebook">E-Book</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3">
                        <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                        <div class="relative">
                            <select id="year" class="custom-select w-full bg-white border border-gray-200 rounded-md py-2.5 px-4 pr-8 text-gray-700 focus:border-primary focus:outline-none">
                                <option value="">Semua Tahun</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 md:self-end">
                        <button id="applyFilter" class="w-full bg-primary text-white px-4 py-2.5 !rounded-button whitespace-nowrap hover:bg-blue-600 transition duration-150 ease-in-out mt-6 md:mt-0">
                            Terapkan Filter
                        </button>
                    </div>
                </div>
            </div>
            <!-- Results Count -->
            <div class="flex justify-between items-center mb-6">
                <p class="text-gray-600">Menampilkan <span class="font-medium">24</span> dari <span class="font-medium">128</span> dokumen</p>
                <div class="flex items-center">
                    <label for="sort" class="text-sm text-gray-600 mr-2">Urutkan:</label>
                    <select id="sort" class="custom-select bg-white border border-gray-200 rounded-md py-1.5 px-3 pr-8 text-sm text-gray-700 focus:border-primary focus:outline-none">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="a-z">A-Z</option>
                        <option value="z-a">Z-A</option>
                    </select>
                </div>
            </div>
            <!-- Document List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__empty_1 = true; $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="document-card bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="p-5">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-12 h-12 flex items-center justify-center bg-blue-50 rounded-md">
                                    <i class="ri-file-text-line ri-xl text-primary"></i>
                                </div>
                                <span class="badge badge-<?php echo e(strtolower($document->category)); ?>"><?php echo e($document->category); ?></span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2"><?php echo e($document->title); ?></h3>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <i class="ri-calendar-line mr-2"></i>
                                <span><?php echo e($document->created_at->translatedFormat('F Y')); ?></span>
                                <span class="mx-2">•</span>
                                <i class="ri-file-pdf-line mr-2"></i>
                                <span><?php echo e(strtoupper(pathinfo($document->file_path, PATHINFO_EXTENSION))); ?></span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4"><?php echo e($document->description); ?></p>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-500"><?php echo e($document->instansi ?? '-'); ?></span>
                                <a href="<?php echo e(asset('storage/' . $document->file_path)); ?>" class="flex items-center bg-primary text-white px-3 py-1.5 rounded-sm whitespace-nowrap hover:bg-blue-600 transition duration-150 ease-in-out" download>
                                    <i class="ri-download-line mr-1"></i>
                                    Unduh
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-3 text-center text-gray-500 py-10">
                        Tidak ada dokumen yang disetujui.
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-10 flex justify-center">
                <nav class="flex items-center space-x-1">
                    <a href="#" class="px-3 py-2 rounded-md text-sm text-gray-500 hover:bg-gray-100">
                        <i class="ri-arrow-left-s-line"></i>
                    </a>
                    <a href="#" class="px-3 py-2 rounded-md text-sm bg-primary text-white">1</a>
                    <a href="#" class="px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">2</a>
                    <a href="#" class="px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">3</a>
                    <span class="px-3 py-2 text-gray-500">...</span>
                    <a href="#" class="px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">14</a>
                    <a href="#" class="px-3 py-2 rounded-md text-sm text-gray-500 hover:bg-gray-100">
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                </nav>
            </div>
        </main>

        <!-- Footer -->
    <footer class="relative bg-white pt-16 pb-6 text-gray-700">
    <div class="container mx-auto px-4 relative z-10 w-full">
        <div class="flex flex-wrap flex-col text-center pb-4 lg:text-center w-1/2 items-center mx-auto">
            <div class="w-full px-4">
                <h4 class="text-3xl mb-2 font-['Pacifico'] text-primary text-center">EconoDocs</h4>
                <h5 class="text-lg mt-0 mb-2 text-gray-600">
                    Platform repository dokumen ekonomi terlengkap di Indonesia. Akses ribuan dokumen untuk kebutuhan akademis dan profesional.
                </h5>
                <div class="mt-6 mb-6 flex justify-center space-x-3">
                    <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 transform hover:scale-110 p-2 rounded-full hover:bg-blue-100">
                        <i class="ri-facebook-circle-fill text-3xl"></i>                    
                    </a>
                    <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 transform hover:scale-110 p-2 rounded-full hover:bg-blue-100">
                        <i class="ri-twitter-fill text-3xl"></i>
                    </a>
                    <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 transform hover:scale-110 p-2 rounded-full hover:bg-blue-100">
                        <i class="ri-instagram-line text-3xl"></i>            
                    </a>        
                    <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 transform hover:scale-110 p-2 rounded-full hover:bg-blue-100">
                        <i class="ri-linkedin-box-fill text-3xl"></i>
                    </a>
                    <a href="#" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors duration-300 transform hover:scale-110 p-2 rounded-full hover:bg-blue-100">
                        <i class="ri-github-fill text-3xl"></i>
                    </a>
                </div>
            </div>
            
        </div>
        <div class="flex flex-wrap items-center md:justify-between justify-center mt-4">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-white font-semibold py-1">
                    © <span id="get-current-year">2025</span> All Rights Reserved.
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-20 md:h-32 lg:h-40 overflow-hidden z-0">
        <svg class="waves-svg absolute bottom-0 left-0 w-[200%] h-16 md:h-24 text-blue-500 opacity-80"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave-animation-1">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="currentColor"/>
            </g>
        </svg>

        <svg class="waves-svg absolute bottom-0 left-0 w-[200%] h-20 md:h-28 text-blue-600 opacity-60"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="24 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave-2" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave-animation-2">
                <use xlink:href="#gentle-wave-2" x="48" y="3" fill="currentColor"/>
            </g>
        </svg>

        <svg class="waves-svg absolute bottom-0 left-0 w-[200%] h-24 md:h-32 text-primary opacity-40"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="24 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave-3" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave-animation-3">
                <use xlink:href="#gentle-wave-3" x="48" y="5" fill="currentColor"/>
            </g>
        </svg>

         <svg class="waves-svg absolute bottom-0 left-0 w-[200%] h-28 md:h-40 text-blue-800 opacity-90"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="24 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave-4" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave-animation-4">
                <use xlink:href="#gentle-wave-4" x="48" y="7" fill="currentColor"/>
            </g>
        </svg>
    </div>
</footer>

    </div>

    <script id="filterScript">
        document.addEventListener('DOMContentLoaded', function() {
            const applyFilterBtn = document.getElementById('applyFilter');
            const categorySelect = document.getElementById('category');
            const yearSelect = document.getElementById('year');
            
            applyFilterBtn.addEventListener('click', function() {
                const selectedCategory = categorySelect.value;
                const selectedYear = yearSelect.value;
                
                // Here you would typically make an API call or filter the documents
                console.log('Filtering by:', {
                    category: selectedCategory || 'All',
                    year: selectedYear || 'All'
                });
                
                // For demo purposes, show a notification
                const notification = document.createElement('div');
                notification.className = 'fixed top-4 right-4 bg-primary text-white px-4 py-2 rounded-md shadow-lg z-50';
                notification.textContent = `Filter diterapkan: ${selectedCategory ? categorySelect.options[categorySelect.selectedIndex].text : 'Semua Kategori'}, ${selectedYear ? selectedYear : 'Semua Tahun'}`;
                
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.style.opacity = '0';
                    notification.style.transition = 'opacity 0.5s ease';
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 500);
                }, 3000);
            });
        });
    </script>
    
    <script id="searchScript">
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.search-input');
            
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    const searchTerm = searchInput.value.trim();
                    if (searchTerm) {
                        // Here you would typically make an API call to search
                        console.log('Searching for:', searchTerm);
                        
                        // For demo purposes, show a notification
                        const notification = document.createElement('div');
                        notification.className = 'fixed top-4 right-4 bg-primary text-white px-4 py-2 rounded-md shadow-lg z-50';
                        notification.textContent = `Mencari: "${searchTerm}"`;
                        
                        document.body.appendChild(notification);
                        
                        setTimeout(() => {
                            notification.style.opacity = '0';
                            notification.style.transition = 'opacity 0.5s ease';
                            setTimeout(() => {
                                document.body.removeChild(notification);
                            }, 500);
                        }, 3000);
                    }
                }
            });
        });
    </script>
    
    <script id="downloadScript">
        document.addEventListener('DOMContentLoaded', function() {
            const downloadButtons = document.querySelectorAll('button:has(i.ri-download-line)');
            
            downloadButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    // Get the document title from the closest parent card
                    const card = button.closest('.document-card');
                    const title = card.querySelector('h3').textContent;
                    
                    // Here you would typically trigger a download
                    console.log('Downloading:', title);
                    
                    // For demo purposes, show a notification
                    const notification = document.createElement('div');
                    notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg z-50';
                    notification.innerHTML = `<div class="flex items-center"><i class="ri-check-line mr-2"></i> Mengunduh: ${title}</div>`;
                    
                    document.body.appendChild(notification);
                    
                    setTimeout(() => {
                        notification.style.opacity = '0';
                        notification.style.transition = 'opacity 0.5s ease';
                        setTimeout(() => {
                            document.body.removeChild(notification);
                        }, 500);
                    }, 3000);
                });
            });
        });
    </script>
    <script id="profil">
        const popupBtn = document.getElementById('popupBtn');
        const popupProfil = document.getElementById('popupProfil');

        popupBtn.addEventListener('click', function(e) {
            popupProfil.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!popupProfil.contains(e.target) && !popupBtn.contains(e.target)) {
                popupProfil.classList.add('hidden');
            }
        });
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Pemrograman Web\coretax-lite-restore-laravel10\coretax-lite-restore-laravel10\resources\views/document-auth.blade.php ENDPATH**/ ?>