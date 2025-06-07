<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna</title>
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
            background-color: #f9fafb;
        }
        .custom-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .tab-active {
            color: #4F46E5;
            border-bottom: 2px solid #4F46E5;
        }
        input[type="search"]::-webkit-search-decoration,
        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-results-button,
        input[type="search"]::-webkit-search-results-decoration {
            display: none;
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .custom-switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
        }
        .custom-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e5e7eb;
            transition: .4s;
            border-radius: 20px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #4F46E5;
        }
        input:checked + .slider:before {
            transform: translateX(20px);
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Header & Navigation -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <a href="#" class="text-3xl font-['Pacifico'] text-primary">EconoDocs</a>
            </div>
            
            <div class="relative mx-4 flex-grow max-w-3xl">
                <div class="relative w-full">
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
                <a href="{{ route('dashboard')}}" class="text-gray-900 hover:text-primary font-medium text-sm">Beranda</a>
                <a href="{{ route('document') }}" class="text-gray-600 hover:text-primary font-medium text-sm">Dokumen</a>
                <a href="{{ route('dokumen.upload') }}" class="text-gray-600 hover:text-primary font-medium text-sm">Upload</a>
                
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
            <a href="{{ route('profil') }}" class="text-sm text-gray-600 hover:text-primary px-4">Profil</a>
        </div>
        <hr class="border-gray-200 my-2">
        <div id="logout" class="mt-4">
            <i class="ri-logout-box-r-line text-lg text-gray-600 hover:text-primary"></i>
            <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" class="text-sm text-gray-600 hover:text-primary px-4 bg-transparent border-none cursor-pointer">Logout</button>
    </form>
        </div>
    </div>

    <main class="container mx-auto px-4 py-6 pt-16">
        <div class="bg-white rounded shadow-sm p-6 my-6 mt-6">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                <div class="w-24 h-24 rounded-full bg-primary/10 flex items-center justify-center">
                    <img src="https://readdy.ai/api/search-image?query=professional%20portrait%20photo%20of%20Indonesian%20man%20with%20glasses%2C%20business%20casual%20attire%2C%20neutral%20background%2C%20professional%20headshot&width=200&height=200&seq=1&orientation=squarish" alt="Foto Profil" class="w-full h-full rounded-full object-cover">
                </div>
                <div class="flex-1">
                    <h1 class="text-2xl font-semibold text-gray-800">Luthfian Afif</h1>
                    <p class="text-gray-500">luthfian.afif@gmail.com</p>
                    <div class="flex items-center mt-2">
                        <span class=" text-sm text-gray-500">Bergabung sejak 26 Mei 2025</span>
                    </div>
                </div>
                <a href="{{ route('profile.edit') }}">
                    <button class="px-4 py-2 bg-primary text-white rounded-md whitespace-nowrap flex items-center gap-2">
                        <i class="ri-edit-line"></i>
                        Edit Profil
                    </button>
                </a>
            </div>
        </div>

        <div class="bg-white rounded shadow-sm p-6 mb-6">
            <div class="flex overflow-x-auto border-b mb-6">
                <button id="tab-info" class="tab-active px-4 py-2 font-medium text-sm whitespace-nowrap">
                    Informasi Pengguna
                </button>
                <button id="tab-upload" class="px-4 py-2 font-medium text-sm text-gray-500 whitespace-nowrap">
                    Riwayat Unggahan
                </button>
                <button id="tab-download" class="px-4 py-2 font-medium text-sm text-gray-500 whitespace-nowrap">
                    Riwayat Unduhan
                </button>
            </div>

            <div id="content-info" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gray-50 p-4 rounded">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-gray-700 font-medium">Total Unggahan</h3>
                            <div class="w-10 h-10 p-6 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                                <i class="ri-upload-cloud-2-line ri-2x block"></i>
                            </div>
                        </div>
                        <p class="text-2xl font-semibold text-gray-800">32</p>
                        <p class="text-sm text-gray-500">5 unggahan dalam 1 bulan terakhir</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-gray-700 font-medium">Total Unduhan</h3>
                            <div class="w-10 h-10 p-6 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                                <i class="ri-download-cloud-2-line ri-2x block"></i>
                            </div>
                        </div>
                        <p class="text-2xl font-semibold text-gray-800">128</p>
                        <p class="text-sm text-gray-500">12 unduhan dalam 1 bulan terakhir</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded">
                        
                    </div>
                    
                </div>

                <div class="border-t pt-6">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Informasi Pribadi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Nama Lengkap</p>
                            <p class="font-medium">Luthfian Afif</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Bio</p>
                            <p class="font-medium">Guwa Engineering</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Asal Instansi</p>
                            <p class="font-medium">Universitas Gang Mrican</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Email</p>
                            <p class="font-medium">luthfian.afif@gmail.com</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Nomor Telepon</p>
                            <p class="font-medium">+62 812 3456 7890</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Alamat</p>
                            <p class="font-medium">Jl. Jendral Sudirman No. 123, Jakarta Selatan</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="content-upload" class="hidden">
                <div class="flex flex-col md:flex-row items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Riwayat Unggahan</h2>
                    <div class="flex items-center space-x-2 mt-4 md:mt-0">
                        <div class="relative">
                            <input type="search" placeholder="Cari file..." id="search" class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 w-full md:w-64">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center text-gray-400">
                                <i class="ri-search-line"></i>
                            </div>
                        </div>
                        <div class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-gray-700 bg-gray-100 rounded-full">
                            <i class="ri-filter-3-line"></i>
                        </div>
                        <div class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-gray-700 bg-gray-100 rounded-full">
                            <i class="ri-refresh-line"></i>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table id="table" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama File</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ukuran</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody1" class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex items-center justify-center text-primary bg-primary/10 rounded">
                                            <i class="ri-file-word-line"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Laporan_Keuangan_Q2_2025.docx</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">22 Mei 2025, 14:30</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">2.4 MB</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-download-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex items-center justify-center text-primary bg-primary/10 rounded">
                                            <i class="ri-file-excel-line"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Data_Penjualan_April_2025.xlsx</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">18 Mei 2025, 09:15</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">1.8 MB</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-download-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex items-center justify-center text-primary bg-primary/10 rounded">
                                            <i class="ri-file-pdf-line"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Proposal_Proyek_Baru.pdf</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">15 Mei 2025, 16:45</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">4.2 MB</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-download-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex items-center justify-center text-primary bg-primary/10 rounded">
                                            <i class="ri-image-line"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Desain_Logo_Perusahaan.png</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">10 Mei 2025, 11:20</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">3.7 MB</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-download-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex items-center justify-center text-primary bg-primary/10 rounded">
                                            <i class="ri-file-zip-line"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Aset_Website.zip</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">5 Mei 2025, 13:10</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">28.5 MB</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-download-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex items-center justify-between">
                    <p class="text-sm text-gray-500">Menampilkan 5 dari 47 file</p>
                    <button class="px-4 py-2 text-primary border border-primary !rounded-button whitespace-nowrap flex items-center gap-2">
                        Lihat Semua
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </div>
            </div>

            <div id="content-download" class="hidden">
                <div class="flex flex-col md:flex-row items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Riwayat Unduhan</h2>
                    <div class="flex items-center space-x-2 mt-4 md:mt-0">
                        <div class="relative">
                            <input type="search" placeholder="Cari file..." id="search2" class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 w-full md:w-64">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center text-gray-400">
                                <i class="ri-search-line"></i>
                            </div>
                        </div>
                        <div class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-gray-700 bg-gray-100 rounded-full">
                            <i class="ri-filter-3-line"></i>
                        </div>
                        <div class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-gray-700 bg-gray-100 rounded-full">
                            <i class="ri-refresh-line"></i>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama File</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ukuran</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody2" class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex items-center justify-center text-primary bg-primary/10 rounded">
                                            <i class="ri-file-pdf-line"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Panduan_Pengguna_Aplikasi.pdf</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">21 Mei 2025, 10:15</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">5.2 MB</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-download-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex items-center justify-center text-primary bg-primary/10 rounded">
                                            <i class="ri-file-excel-line"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Template_Anggaran_2025.xlsx</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">19 Mei 2025, 14:30</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">1.3 MB</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-download-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex items-center justify-center text-primary bg-primary/10 rounded">
                                            <i class="ri-file-ppt-line"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Presentasi_Rapat_Tahunan.pptx</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">17 Mei 2025, 09:45</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">8.7 MB</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-download-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex items-center justify-center text-primary bg-primary/10 rounded">
                                            <i class="ri-file-text-line"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">SOP_Departemen_IT.docx</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">15 Mei 2025, 16:20</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">2.1 MB</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-download-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex items-center justify-center text-primary bg-primary/10 rounded">
                                            <i class="ri-image-line"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Mockup_Aplikasi_Mobile.png</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">12 Mei 2025, 11:05</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">4.5 MB</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-download-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex items-center justify-between">
                    <p class="text-sm text-gray-500">Menampilkan 5 dari 128 file</p>
                    <button class="px-4 py-2 text-primary border border-primary !rounded-button whitespace-nowrap flex items-center gap-2">
                        Lihat Semua
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </div>
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


    <script id="tab-switcher">
        document.addEventListener('DOMContentLoaded', function() {
            const tabInfo = document.getElementById('tab-info');
            const tabUpload = document.getElementById('tab-upload');
            const tabDownload = document.getElementById('tab-download');
            
            const contentInfo = document.getElementById('content-info');
            const contentUpload = document.getElementById('content-upload');
            const contentDownload = document.getElementById('content-download');
            
            function switchTab(activeTab, activeContent) {
                // Hide all contents
                contentInfo.classList.add('hidden');
                contentUpload.classList.add('hidden');
                contentDownload.classList.add('hidden');
                
                // Remove active class from all tabs
                tabInfo.classList.remove('tab-active');
                tabUpload.classList.remove('tab-active');
                tabDownload.classList.remove('tab-active');
                
                tabInfo.classList.add('text-gray-500');
                tabUpload.classList.add('text-gray-500');
                tabDownload.classList.add('text-gray-500');
                
                // Show active content and set active tab
                activeContent.classList.remove('hidden');
                activeTab.classList.add('tab-active');
                activeTab.classList.remove('text-gray-500');
            }
            
            tabInfo.addEventListener('click', function() {
                switchTab(tabInfo, contentInfo);
            });
            
            tabUpload.addEventListener('click', function() {
                switchTab(tabUpload, contentUpload);
            });
            
            tabDownload.addEventListener('click', function() {
                switchTab(tabDownload, contentDownload);
            });
        });
    </script>

    <script id="toggle-switches">
        document.addEventListener('DOMContentLoaded', function() {
            const toggleSwitches = document.querySelectorAll('.custom-switch input[type="checkbox"]');
            
            toggleSwitches.forEach(toggle => {
                toggle.addEventListener('change', function() {
                    // Here you would typically send an API request to update the setting
                    console.log('Toggle changed:', this.checked);
                });
            });
        });
    </script>
    <script src="js/script.js"></script>
    {{-- search unggahan--}}
    <script>
            const filter = document.getElementById('search');
            const items = document.querySelectorAll('#tbody1 tr');

            filter.addEventListener('input', (e) => filterData(e.target.value));

            function filterData(search) {
                items.forEach((item) => {
                    if (item.innerText.toLowerCase().includes(search.toLowerCase())) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            }
    </script>
    {{-- search unduhan --}}
    <script>
        const filters = document.getElementById('search2');
        const items = document.querySelectorAll('#tbody2 tr');

        filters.addEventListener('input', (e) => filterData(e.target.value));

        function filterData(search) {
            items.forEach((item) => {
                if (item.innerText.toLowerCase().includes(search.toLowerCase())) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }
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
</html>