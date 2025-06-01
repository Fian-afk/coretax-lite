<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EconoDocs - Repository Dokumen Ekonomi Terlengkap</title>
    <link rel="stylesheet" href="css/app.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <h1 class="text-2xl font-['Pacifico'] text-primary">EconoDocs</h1>
                </div>
                <nav class="hidden md:flex items-center space-x-6">
                    <a href="#" class="text-gray-600 hover:text-primary">Beranda</a>
                    <a href="#" class="text-primary font-medium">Repository</a>
                    <a href="#" class="text-gray-600 hover:text-primary">Tentang Kami</a>
                    <a href="#" class="text-gray-600 hover:text-primary">Kontak</a>
                </nav>
                <div class="flex items-center">
                    <button class="w-10 h-10 flex items-center justify-center text-gray-500 hover:text-primary md:hidden">
                        <i class="ri-menu-line ri-lg"></i>
                    </button>
                    <button class="hidden md:flex items-center justify-center bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap">
                        <i class="ri-user-line mr-2"></i>
                        Masuk
                    </button>
                </div>
            </div>
        </header>

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
                <!-- Document 1 -->
                <div class="document-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-blue-50 rounded-md">
                                <i class="ri-file-text-line ri-xl text-primary"></i>
                            </div>
                            <span class="badge badge-research">Riset</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Analisis Dampak Ekonomi Digital pada Sektor UMKM Indonesia</h3>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="ri-calendar-line mr-2"></i>
                            <span>Mei 2025</span>
                            <span class="mx-2">•</span>
                            <i class="ri-file-pdf-line mr-2"></i>
                            <span>PDF (4.2 MB)</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Penelitian komprehensif tentang transformasi digital pada sektor UMKM di Indonesia dan dampaknya terhadap pertumbuhan ekonomi nasional.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">Dilihat 1.245 kali</span>
                            <button class="flex items-center bg-primary text-white px-3 py-1.5 !rounded-button whitespace-nowrap hover:bg-blue-600 transition duration-150 ease-in-out">
                                <i class="ri-download-line mr-1"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Document 2 -->
                <div class="document-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-green-50 rounded-md">
                                <i class="ri-file-chart-line ri-xl text-green-500"></i>
                            </div>
                            <span class="badge badge-financial">Laporan Keuangan</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Laporan Keuangan Bank Indonesia Q1 2025</h3>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="ri-calendar-line mr-2"></i>
                            <span>April 2025</span>
                            <span class="mx-2">•</span>
                            <i class="ri-file-excel-line mr-2"></i>
                            <span>XLSX (2.8 MB)</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Laporan keuangan resmi Bank Indonesia untuk kuartal pertama tahun 2025, termasuk analisis tren moneter dan fiskal.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">Dilihat 978 kali</span>
                            <button class="flex items-center bg-primary text-white px-3 py-1.5 !rounded-button whitespace-nowrap hover:bg-blue-600 transition duration-150 ease-in-out">
                                <i class="ri-download-line mr-1"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Document 3 -->
                <div class="document-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-yellow-50 rounded-md">
                                <i class="ri-line-chart-line ri-xl text-yellow-500"></i>
                            </div>
                            <span class="badge badge-market">Analisis Pasar</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tren Pasar Cryptocurrency di Asia Tenggara 2025</h3>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="ri-calendar-line mr-2"></i>
                            <span>Mei 2025</span>
                            <span class="mx-2">•</span>
                            <i class="ri-file-pdf-line mr-2"></i>
                            <span>PDF (6.1 MB)</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Analisis mendalam tentang tren pasar cryptocurrency di kawasan Asia Tenggara, termasuk regulasi dan adopsi di Indonesia.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">Dilihat 2.367 kali</span>
                            <button class="flex items-center bg-primary text-white px-3 py-1.5 !rounded-button whitespace-nowrap hover:bg-blue-600 transition duration-150 ease-in-out">
                                <i class="ri-download-line mr-1"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Document 4 -->
                <div class="document-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-red-50 rounded-md">
                                <i class="ri-book-open-line ri-xl text-red-500"></i>
                            </div>
                            <span class="badge badge-ebook">E-Book</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Panduan Lengkap Investasi Saham untuk Pemula</h3>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="ri-calendar-line mr-2"></i>
                            <span>Maret 2025</span>
                            <span class="mx-2">•</span>
                            <i class="ri-file-pdf-line mr-2"></i>
                            <span>PDF (8.5 MB)</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">E-book komprehensif yang membahas dasar-dasar investasi saham untuk pemula, termasuk strategi dan analisis fundamental.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">Dilihat 3.512 kali</span>
                            <button class="flex items-center bg-primary text-white px-3 py-1.5 !rounded-button whitespace-nowrap hover:bg-blue-600 transition duration-150 ease-in-out">
                                <i class="ri-download-line mr-1"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Document 5 -->
                <div class="document-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-blue-50 rounded-md">
                                <i class="ri-file-text-line ri-xl text-primary"></i>
                            </div>
                            <span class="badge badge-research">Riset</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Studi Komparatif Fintech di Indonesia dan Singapura</h3>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="ri-calendar-line mr-2"></i>
                            <span>Februari 2025</span>
                            <span class="mx-2">•</span>
                            <i class="ri-file-pdf-line mr-2"></i>
                            <span>PDF (5.7 MB)</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Penelitian yang membandingkan perkembangan industri fintech di Indonesia dan Singapura, termasuk regulasi dan inovasi.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">Dilihat 1.876 kali</span>
                            <button class="flex items-center bg-primary text-white px-3 py-1.5 !rounded-button whitespace-nowrap hover:bg-blue-600 transition duration-150 ease-in-out">
                                <i class="ri-download-line mr-1"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Document 6 -->
                <div class="document-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-green-50 rounded-md">
                                <i class="ri-file-chart-line ri-xl text-green-500"></i>
                            </div>
                            <span class="badge badge-financial">Laporan Keuangan</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Laporan Tahunan Bursa Efek Indonesia 2024</h3>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="ri-calendar-line mr-2"></i>
                            <span>Januari 2025</span>
                            <span class="mx-2">•</span>
                            <i class="ri-file-pdf-line mr-2"></i>
                            <span>PDF (12.3 MB)</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Laporan tahunan resmi Bursa Efek Indonesia yang mencakup kinerja pasar modal, IPO, dan perkembangan investasi selama 2024.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">Dilihat 2.145 kali</span>
                            <button class="flex items-center bg-primary text-white px-3 py-1.5 !rounded-button whitespace-nowrap hover:bg-blue-600 transition duration-150 ease-in-out">
                                <i class="ri-download-line mr-1"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Document 7 -->
                <div class="document-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-yellow-50 rounded-md">
                                <i class="ri-line-chart-line ri-xl text-yellow-500"></i>
                            </div>
                            <span class="badge badge-market">Analisis Pasar</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Prospek Ekonomi Indonesia 2025-2030</h3>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="ri-calendar-line mr-2"></i>
                            <span>April 2025</span>
                            <span class="mx-2">•</span>
                            <i class="ri-file-pdf-line mr-2"></i>
                            <span>PDF (7.8 MB)</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Analisis komprehensif tentang prospek ekonomi Indonesia untuk periode 2025-2030, termasuk proyeksi pertumbuhan sektor-sektor utama.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">Dilihat 1.923 kali</span>
                            <button class="flex items-center bg-primary text-white px-3 py-1.5 !rounded-button whitespace-nowrap hover:bg-blue-600 transition duration-150 ease-in-out">
                                <i class="ri-download-line mr-1"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Document 8 -->
                <div class="document-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-red-50 rounded-md">
                                <i class="ri-book-open-line ri-xl text-red-500"></i>
                            </div>
                            <span class="badge badge-ebook">E-Book</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Ekonomi Digital: Transformasi Bisnis di Era Industri 4.0</h3>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="ri-calendar-line mr-2"></i>
                            <span>Maret 2025</span>
                            <span class="mx-2">•</span>
                            <i class="ri-file-pdf-line mr-2"></i>
                            <span>PDF (9.2 MB)</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">E-book yang membahas transformasi bisnis dalam era ekonomi digital dan Industri 4.0, dengan studi kasus dari Indonesia.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">Dilihat 2.789 kali</span>
                            <button class="flex items-center bg-primary text-white px-3 py-1.5 !rounded-button whitespace-nowrap hover:bg-blue-600 transition duration-150 ease-in-out">
                                <i class="ri-download-line mr-1"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Document 9 -->
                <div class="document-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-blue-50 rounded-md">
                                <i class="ri-file-text-line ri-xl text-primary"></i>
                            </div>
                            <span class="badge badge-research">Riset</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Dampak Kebijakan Moneter Terhadap Inflasi di Indonesia</h3>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="ri-calendar-line mr-2"></i>
                            <span>Januari 2025</span>
                            <span class="mx-2">•</span>
                            <i class="ri-file-pdf-line mr-2"></i>
                            <span>PDF (3.9 MB)</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Penelitian tentang efektivitas kebijakan moneter Bank Indonesia dalam mengendalikan inflasi selama periode 2020-2024.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">Dilihat 1.456 kali</span>
                            <button class="flex items-center bg-primary text-white px-3 py-1.5 !rounded-button whitespace-nowrap hover:bg-blue-600 transition duration-150 ease-in-out">
                                <i class="ri-download-line mr-1"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>
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
        <footer class="bg-gray-800 text-white mt-16">
            <div class="container mx-auto px-4 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-['Pacifico'] mb-4">EconoDocs</h3>
                        <p class="text-gray-400 mb-4">Platform repository dokumen ekonomi terlengkap di Indonesia. Menyediakan akses ke berbagai riset, laporan, dan publikasi ekonomi.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-700 hover:bg-primary transition duration-150">
                                <i class="ri-facebook-fill"></i>
                            </a>
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-700 hover:bg-primary transition duration-150">
                                <i class="ri-twitter-x-fill"></i>
                            </a>
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-700 hover:bg-primary transition duration-150">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-700 hover:bg-primary transition duration-150">
                                <i class="ri-instagram-fill"></i>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Kategori</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">Riset Ekonomi</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Laporan Keuangan</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Analisis Pasar</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">E-Book</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Statistik Ekonomi</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Tautan</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">Beranda</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Repository</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Tentang Kami</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Kontak</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Berlangganan</h4>
                        <p class="text-gray-400 mb-4">Dapatkan update terbaru tentang dokumen ekonomi baru.</p>
                        <div class="flex">
                            <input type="email" placeholder="Email Anda" class="bg-gray-700 text-white px-4 py-2 rounded-l-md w-full focus:outline-none focus:ring-1 focus:ring-primary">
                            <button class="bg-primary text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-150 whitespace-nowrap">
                                Langganan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-700 mt-10 pt-6 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">© 2025 EconoDocs. Hak Cipta Dilindungi.</p>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Kebijakan Privasi</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Syarat & Ketentuan</a>
                    </div>
                </div>
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
</body>
</html>