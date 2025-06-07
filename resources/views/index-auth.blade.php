<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EconoDocs - Repositori Dokumen Ekonomi Terlengkap</title>
    <link rel="stylesheet" href="css/app.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>tailwind.config={theme:{extend:{colors:{primary:'#4F46E5',secondary:'#10B981'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Inter', sans-serif;
        }
        .notification-badge::after {
            content: attr(data-count);
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ef4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .custom-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        .checkmark {
            height: 18px;
            width: 18px;
            background-color: #fff;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        .custom-checkbox input:checked ~ .checkmark {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }
        .checkmark:after {
            content: "";
            display: none;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }
        .custom-range {
            -webkit-appearance: none;
            width: 100%;
            height: 4px;
            background: #e5e7eb;
            border-radius: 5px;
            outline: none;
        }
        .custom-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            background: #3b82f6;
            border-radius: 50%;
            cursor: pointer;
        }
        .custom-range::-moz-range-thumb {
            width: 18px;
            height: 18px;
            background: #3b82f6;
            border-radius: 50%;
            cursor: pointer;
        }
        .custom-select {
            position: relative;
        }
        .custom-select select {
            display: none;
        }
        .select-selected {
            background-color: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 8px 16px;
            cursor: pointer;
        }
        .select-selected:after {
            position: absolute;
            content: "";
            top: 14px;
            right: 10px;
            width: 8px;
            height: 8px;
            border: solid #6b7280;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        .select-selected.select-arrow-active:after {
            transform: rotate(-135deg);
            top: 18px;
        }
        .select-items {
            position: absolute;
            background-color: white;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 99;
            border: 1px solid #e5e7eb;
            border-radius: 0 0 8px 8px;
            max-height: 200px;
            overflow-y: auto;
            display: none;
        }
        .select-items div {
            padding: 8px 16px;
            cursor: pointer;
        }
        .select-items div:hover {
            background-color: #f3f4f6;
        }
        .select-hide {
            display: none;
        }
        .same-as-selected {
            background-color: #f3f4f6;
        }
        .category-card {
            transition: all 0.3s ease;
        }
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .notification-panel {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            width: 320px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            z-index: 50;
        }
        .notification-item.unread {
            background-color: #f0f7ff;
        }
        .notification-item.unread::before {
            content: "";
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 8px;
            height: 8px;
            background-color: #3b82f6;
            border-radius: 50%;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header & Navigation -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-3xl font-['Pacifico'] text-primary">EconoDocs</a>
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
                <a href="{{ route('dashboard') }}" class="text-gray-900 hover:text-primary font-medium text-sm">Beranda</a>
                <a href="{{ route('dokumen.index') }}" class="text-gray-600 hover:text-primary font-medium text-sm">Dokumen</a>
                <a href="{{ route('dokumen.upload') }}" class="text-gray-600 hover:text-primary font-medium text-sm">Upload</a>
                
                <div class="relative">
                    <button id="popupBtn" class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                        <i class="ri-user-line text-xl text-gray-600"></i>
                    </button>
                </div>
            </nav>
        </div>
    </header>
    <div id="popupProfil" class="bg-white p-4 rounded-lg shadow-md fixed top-[72px] right-16 z-100 w-xl content-start">
        <div id="profil" class="mb-4">
            <i class="ri-user-3-fill text-lg text-gray-600 hover:text-primary"></i>
            <a href="#" class="text-sm text-gray-600 hover:text-primary px-4">Profil</a>
        </div>
        <hr class="border-gray-200 my-2">
        <div id="logout" class="mt-4">
            <i class="ri-logout-box-r-line text-lg text-gray-600 hover:text-primary"></i>
            <a href="#" class="text-sm text-gray-600 hover:text-primary px-4">Logout</a>
        </div>
    </div>
    
    <!-- Main Content -->
    <main class="pt-16">
        <!-- Hero Section -->
        <section class="relative w-full h-[600px] flex items-center overflow-hidden z-0 bg-white" style="background-image: url('/img/financial-items.jpg'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-50 via-gray-50/90 to-transparent z-10"></div>
            <div class="container mx-auto px-4  relative z-20 w-full">
                <div class="max-w-2xl">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Repository Dokumen Ekonomi Terlengkap</h1>
                    <p class="text-xl text-gray-700 mb-8">Akses ribuan dokumen riset, laporan keuangan, dan e-book ekonomi digital untuk kebutuhan akademis dan profesional Anda.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#" class="bg-primary text-white px-6 py-3 font-medium hover:bg-blue-600 transition-all duration-300 rounded-md whitespace-nowrap">Mulai Eksplorasi</a>
                        <a href="#" class="bg-gray-50 border border-secondary text-secondary px-6 py-3 font-medium hover:bg-secondary hover:text-gray-300 transition-all duration-300 rounded-md whitespace-nowrap">Upload Dokumen</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row gap-8">
            <!-- Sidebar Filter -->
            <aside class="w-full md:w-72 shrink-0">
                <div class="bg-white rounded-lg shadow-sm p-5 sticky top-24">
                    <h3 class="font-semibold text-lg text-gray-900 mb-4">Filter Pencarian</h3>
                    
                    <div class="mb-6">
                        <h4 class="font-medium text-gray-700 mb-3">Tahun Publikasi</h4>
                        <div class="mb-2 flex justify-between">
                            <span class="text-sm text-gray-500">2015</span>
                            <span class="text-sm text-gray-500">2025</span>
                        </div>
                        <input type="range" min="2015" max="2025" value="2023" class="custom-range" id="yearRange">
                        <div class="text-center mt-2">
                            <span class="text-sm font-medium text-gray-700" id="selectedYear">2023</span>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="font-medium text-gray-700 mb-3">Topik/Kategori</h4>
                        <div class="space-y-2">
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Makroekonomi</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Mikroekonomi</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Pasar Saham</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Ekonomi Digital</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Laporan Keuangan</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Riset Ekonomi</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="font-medium text-gray-700 mb-3">Institusi Pengunggah</h4>
                        <div class="space-y-2">
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Bank Indonesia</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Kementerian Keuangan</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Universitas Indonesia</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Bappenas</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">Lainnya</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="font-medium text-gray-700 mb-3">Format File</h4>
                        <div class="space-y-2">
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">PDF</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">DOCX</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">XLSX</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox">
                                <span class="checkmark mr-2"></span>
                                <span class="text-sm text-gray-700">PPT</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="flex gap-3">
                        <button class="bg-primary text-white px-4 py-2 rounded-md text-sm font-medium flex-1 !rounded-button whitespace-nowrap">Terapkan Filter</button>
                        <button class="border border-gray-300 text-gray-600 px-4 py-2 rounded-md text-sm font-medium !rounded-button whitespace-nowrap">Reset</button>
                    </div>
                </div>
            </aside>

            <div class="flex-1">
                <!-- Kategori Dokumen -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Kategori Dokumen</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                        <div class="category-card bg-white p-6 rounded-lg shadow-sm flex flex-col items-center">
                            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-4">
                                <i class="ri-line-chart-line text-3xl text-primary"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Makroekonomi</h3>
                            <span class="text-sm text-gray-500">1,245 dokumen</span>
                        </div>
                        
                        <div class="category-card bg-white p-6 rounded-lg shadow-sm flex flex-col items-center">
                            <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mb-4">
                                <i class="ri-store-2-line text-3xl text-green-500"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Mikroekonomi</h3>
                            <span class="text-sm text-gray-500">876 dokumen</span>
                        </div>
                        
                        <div class="category-card bg-white p-6 rounded-lg shadow-sm flex flex-col items-center">
                            <div class="w-16 h-16 bg-orange-50 rounded-full flex items-center justify-center mb-4">
                                <i class="ri-stock-line text-3xl text-orange-500"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Pasar Saham</h3>
                            <span class="text-sm text-gray-500">1,532 dokumen</span>
                        </div>
                        
                        <div class="category-card bg-white p-6 rounded-lg shadow-sm flex flex-col items-center">
                            <div class="w-16 h-16 bg-purple-50 rounded-full flex items-center justify-center mb-4">
                                <i class="ri-global-line text-3xl text-purple-500"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Ekonomi Digital</h3>
                            <span class="text-sm text-gray-500">943 dokumen</span>
                        </div>
                        
                        <div class="category-card bg-white p-6 rounded-lg shadow-sm flex flex-col items-center">
                            <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mb-4">
                                <i class="ri-file-chart-line text-3xl text-red-500"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Laporan Keuangan</h3>
                            <span class="text-sm text-gray-500">2,187 dokumen</span>
                        </div>
                        
                        <div class="category-card bg-white p-6 rounded-lg shadow-sm flex flex-col items-center">
                            <div class="w-16 h-16 bg-indigo-50 rounded-full flex items-center justify-center mb-4">
                                <i class="ri-book-read-line text-3xl text-indigo-500"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Riset Ekonomi</h3>
                            <span class="text-sm text-gray-500">1,078 dokumen</span>
                        </div>
                    </div>
                </section>

                <!-- Daftar Dokumen Terbaru -->
                <section>
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Dokumen Terbaru</h2>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Document Item 1 -->
                        <div class="bg-white rounded-lg shadow-sm p-4 flex">
                            <div class="w-24 h-32 bg-gray-100 rounded overflow-hidden shrink-0 mr-4">
                                <img src="https://readdy.ai/api/search-image?query=A%20professional%20cover%20of%20an%20economic%20report%20with%20blue%20and%20white%20color%20scheme%2C%20showing%20charts%20and%20graphs%20related%20to%20Indonesian%20economy.%20The%20image%20has%20a%20clean%2C%20corporate%20design%20with%20subtle%20financial%20elements%20and%20data%20visualization.&width=240&height=320&seq=doc1&orientation=portrait" alt="Dokumen" class="w-full h-full object-cover object-top">
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-semibold text-lg text-gray-900 mb-1">Laporan Ekonomi Digital Indonesia 2025</h3>
                                    <span class="text-xs bg-blue-100 text-primary px-2 py-1 rounded-full">PDF</span>
                                </div>
                                <p class="text-sm text-gray-500 mb-2">Bank Indonesia</p>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-2">Laporan komprehensif tentang perkembangan ekonomi digital di Indonesia, termasuk e-commerce, fintech, dan startup digital.</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded-full">Ekonomi Digital</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-xs text-gray-500">Diunggah: 22 Mei 2025</div>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <span class="flex items-center mr-3"><i class="ri-download-line mr-1"></i> 1,245</span>
                                        <span class="flex items-center"><i class="ri-eye-line mr-1"></i> 3,782</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Document Item 2 -->
                        <div class="bg-white rounded-lg shadow-sm p-4 flex">
                            <div class="w-24 h-32 bg-gray-100 rounded overflow-hidden shrink-0 mr-4">
                                <img src="https://readdy.ai/api/search-image?query=A%20professional%20cover%20of%20a%20financial%20report%20with%20green%20and%20white%20color%20scheme%2C%20showing%20stock%20market%20charts%20and%20financial%20data%20visualization.%20The%20image%20has%20a%20clean%2C%20corporate%20design%20focused%20on%20investment%20and%20stock%20market%20analysis.&width=240&height=320&seq=doc2&orientation=portrait" alt="Dokumen" class="w-full h-full object-cover object-top">
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-semibold text-lg text-gray-900 mb-1">Analisis Pasar Saham Indonesia Q2 2025</h3>
                                    <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">XLSX</span>
                                </div>
                                <p class="text-sm text-gray-500 mb-2">Otoritas Jasa Keuangan</p>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-2">Analisis mendalam tentang performa pasar saham Indonesia pada kuartal kedua 2025, termasuk tren, proyeksi, dan rekomendasi investasi.</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded-full">Pasar Saham</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-xs text-gray-500">Diunggah: 20 Mei 2025</div>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <span class="flex items-center mr-3"><i class="ri-download-line mr-1"></i> 876</span>
                                        <span class="flex items-center"><i class="ri-eye-line mr-1"></i> 2,143</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Document Item 3 -->
                        <div class="bg-white rounded-lg shadow-sm p-4 flex">
                            <div class="w-24 h-32 bg-gray-100 rounded overflow-hidden shrink-0 mr-4">
                                <img src="https://readdy.ai/api/search-image?query=A%20professional%20cover%20of%20a%20macroeconomic%20research%20report%20with%20red%20and%20white%20color%20scheme%2C%20showing%20economic%20indicators%20and%20GDP%20growth%20charts%20for%20Indonesia.%20The%20image%20has%20a%20clean%2C%20academic%20design%20suitable%20for%20government%20publications.&width=240&height=320&seq=doc3&orientation=portrait" alt="Dokumen" class="w-full h-full object-cover object-top">
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-semibold text-lg text-gray-900 mb-1">Proyeksi Pertumbuhan Ekonomi Indonesia 2025-2030</h3>
                                    <span class="text-xs bg-blue-100 text-primary px-2 py-1 rounded-full">PDF</span>
                                </div>
                                <p class="text-sm text-gray-500 mb-2">Kementerian Keuangan RI</p>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-2">Laporan proyeksi pertumbuhan ekonomi Indonesia untuk periode 2025-2030, termasuk faktor-faktor pendorong dan tantangan yang dihadapi.</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded-full">Makroekonomi</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-xs text-gray-500">Diunggah: 18 Mei 2025</div>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <span class="flex items-center mr-3"><i class="ri-download-line mr-1"></i> 1,532</span>
                                        <span class="flex items-center"><i class="ri-eye-line mr-1"></i> 4,267</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Document Item 4 -->
                        <div class="bg-white rounded-lg shadow-sm p-4 flex">
                            <div class="w-24 h-32 bg-gray-100 rounded overflow-hidden shrink-0 mr-4">
                                <img src="https://readdy.ai/api/search-image?query=A%20professional%20cover%20of%20a%20fintech%20research%20report%20with%20purple%20and%20white%20color%20scheme%2C%20showing%20mobile%20payment%20and%20digital%20banking%20illustrations.%20The%20image%20has%20a%20modern%20tech-focused%20design%20with%20financial%20technology%20elements.&width=240&height=320&seq=doc4&orientation=portrait" alt="Dokumen" class="w-full h-full object-cover object-top">
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-semibold text-lg text-gray-900 mb-1">Perkembangan Fintech di Indonesia: Tren dan Regulasi</h3>
                                    <span class="text-xs bg-blue-100 text-primary px-2 py-1 rounded-full">PDF</span>
                                </div>
                                <p class="text-sm text-gray-500 mb-2">Universitas Indonesia</p>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-2">Studi komprehensif tentang perkembangan fintech di Indonesia, termasuk tren terkini, tantangan regulasi, dan dampaknya terhadap inklusi keuangan.</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded-full">Riset Ekonomi</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-xs text-gray-500">Diunggah: 15 Mei 2025</div>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <span class="flex items-center mr-3"><i class="ri-download-line mr-1"></i> 943</span>
                                        <span class="flex items-center"><i class="ri-eye-line mr-1"></i> 2,876</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Document Item 5 -->
                        <div class="bg-white rounded-lg shadow-sm p-4 flex">
                            <div class="w-24 h-32 bg-gray-100 rounded overflow-hidden shrink-0 mr-4">
                                <img src="https://readdy.ai/api/search-image?query=A%20professional%20cover%20of%20a%20microeconomic%20research%20report%20with%20orange%20and%20white%20color%20scheme%2C%20showing%20supply%20and%20demand%20curves%20and%20market%20analysis%20charts.%20The%20image%20has%20a%20clean%20academic%20design%20suitable%20for%20university%20publications.&width=240&height=320&seq=doc5&orientation=portrait" alt="Dokumen" class="w-full h-full object-cover object-top">
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-semibold text-lg text-gray-900 mb-1">Dampak Ekonomi dari Transisi Energi di Indonesia</h3>
                                    <span class="text-xs bg-orange-100 text-orange-700 px-2 py-1 rounded-full">PPT</span>
                                </div>
                                <p class="text-sm text-gray-500 mb-2">Bappenas</p>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-2">Analisis tentang dampak ekonomi dari transisi energi di Indonesia, termasuk peluang investasi, dampak lapangan kerja, dan tantangan implementasi.</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded-full">Ekonomi Digital</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-xs text-gray-500">Diunggah: 12 Mei 2025</div>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <span class="flex items-center mr-3"><i class="ri-download-line mr-1"></i> 765</span>
                                        <span class="flex items-center"><i class="ri-eye-line mr-1"></i> 1,987</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                     <div class="flex justify-center mt-8">
                        <nav class="flex items-center space-x-1">
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-100">
                                <i class="ri-arrow-left-s-line"></i>
                            </a>
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium bg-primary text-white">1</a>
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">2</a>
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">3</a>
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">4</a>
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">5</a>
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-100">
                                <i class="ri-arrow-right-s-line"></i>
                            </a>
                        </nav>
                    </div>
                </section>
            </div>
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
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave-2" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave-animation-2">
                <use xlink:href="#gentle-wave-2" x="48" y="3" fill="currentColor"/>
            </g>
        </svg>

        <svg class="waves-svg absolute bottom-0 left-0 w-[200%] h-24 md:h-32 text-primary opacity-40"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave-3" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave-animation-3">
                <use xlink:href="#gentle-wave-3" x="48" y="5" fill="currentColor"/>
            </g>
        </svg>

         <svg class="waves-svg absolute bottom-0 left-0 w-[200%] h-28 md:h-40 text-blue-800 opacity-90"
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave-4" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave-animation-4">
                <use xlink:href="#gentle-wave-4" x="48" y="7" fill="currentColor"/>
            </g>
        </svg>
    </div>
</footer>

    <script id="custom-select">
        document.addEventListener('DOMContentLoaded', function() {
            const selectElements = document.querySelectorAll('.custom-select');
            
            selectElements.forEach(function(selectElement) {
                const selectSelected = selectElement.querySelector('.select-selected');
                const selectItems = selectElement.querySelector('.select-items');
                const selectOptions = selectElement.querySelectorAll('.select-items div');
                
                selectSelected.addEventListener('click', function(e) {
                    e.stopPropagation();
                    closeAllSelect(this);
                    selectItems.classList.toggle('select-hide');
                    this.classList.toggle('select-arrow-active');
                });
                
                selectOptions.forEach(function(option) {
                    option.addEventListener('click', function() {
                        const selectElement = this.parentNode.parentNode;
                        const selectSelected = selectElement.querySelector('.select-selected');
                        const selectOptions = selectElement.querySelectorAll('.select-items div');
                        
                        selectSelected.textContent = this.textContent;
                        selectSelected.classList.remove('select-arrow-active');
                        selectItems.classList.add('select-hide');
                        
                        selectOptions.forEach(function(opt) {
                            opt.classList.remove('same-as-selected');
                        });
                        
                        this.classList.add('same-as-selected');
                    });
                });
                
                function closeAllSelect(elmnt) {
                    const selectItems = document.querySelectorAll('.select-items');
                    const selectSelected = document.querySelectorAll('.select-selected');
                    
                    selectItems.forEach(function(item, idx) {
                        if (elmnt !== selectSelected[idx]) {
                            selectSelected[idx].classList.remove('select-arrow-active');
                            item.classList.add('select-hide');
                        }
                    });
                }
                
                document.addEventListener('click', closeAllSelect);
            });
        });
    </script>

    <script id="year-range">
        document.addEventListener('DOMContentLoaded', function() {
            const yearRange = document.getElementById('yearRange');
            const selectedYear = document.getElementById('selectedYear');
            
            yearRange.addEventListener('input', function() {
                selectedYear.textContent = this.value;
            });
        });
    </script>
    <script id="profil">
        document.addEventListener('DOMContentLoaded', function() {
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
        });
        
    </script>
</body>
</html>