<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Econodocs - Repository Dokumen Ekonomi Terlengkap</title>
    <link rel="stylesheet" href="css/app.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">

</head>
<body class="min-h-screen bg-gray-50">
    
    <!-- Header & Navigation -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <a href="<?php echo e(route('dashboard')); ?>" class="text-3xl font-['Pacifico'] text-primary">EconoDocs</a>
            </div>
            
            <div class="relative mx-4 flex-grow max-w-2xl">
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
                <div class="relative mr-8 space-x-6">    
                    <a href="#" class="text-gray-900 hover:text-primary font-medium text-sm">Beranda</a>
                    <a href="<?php echo e(route('dokumen.index')); ?>" class="text-gray-600 hover:text-primary font-medium text-sm">Dokumen</a>
                    <a href="<?php echo e(route('dokumen.upload')); ?>" class="text-gray-600 hover:text-primary font-medium text-sm">Upload</a>
                </div>
                
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
            <a href="#" class="text-sm text-gray-600 hover:text-primary px-4">Profil</a>
        </div>
        <hr class="border-gray-200 my-2">
        <div id="logout" class="mt-4">
            <i class="ri-logout-box-r-line text-lg text-gray-600 hover:text-primary"></i>
            <a href="#" class="text-sm text-gray-600 hover:text-primary px-4">Logout</a>
        </div>
    </div>

    <main class="container mx-auto px-4 py-6 pt-20">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Edit Informasi Pribadi</h2>
            <hr class="border-gray-200 mb-4">
            <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="flex flex-col items-center mb-8">
                    <div class="relative items-center text-center">
                        <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                            <img id="profileImage" src="https://readdy.ai/api/search-image?query=professional%20headshot%20portrait%20of%20person%20with%20neutral%20expression%2C%20high%20quality%2C%20studio%20lighting%2C%20clean%20background&width=128&height=128&seq=1&orientation=squarish" class="w-full h-full object-cover mx-auto" alt="Foto Profil"/>
                        </div>
                        <label for="photoInput" class="absolute bottom-0 right-0 w-8 h-8 bg-primary text-white rounded-full cursor-pointer flex items-center justify-center hover:bg-primary/90 transition">
                            <i class="ri-camera-line"></i>
                        </label>
                        <input type="file" id="photoInput" accept="image/*" class="hidden"/>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Unggah foto profil (Maks. 5MB)</p>

                </div>
                
                    
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="<?php echo e(auth()->user()->username); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    </div>
                    <div class="mb-4">
                        <label for="telp" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="tel" id="telp" name="telp" value="<?php echo e(auth()->user()->telp); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>" class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm" readonly>
                        <p class="text-sm text-gray-500 mt-2">Email tidak dapat diubah</p>
                    </div>
                    
                    <div class="mb-4">
                        <label for="uploader" class="block text-sm font-medium text-gray-700">Asal Instansi</label>
                        <input type="text" id="uploader" name="uploader" value="<?php echo e(auth()->user()->uploader); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    </div>
                    <div class="mb-4">
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea id="bio" name="bio" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary"><?php echo e(auth()->user()->bio); ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <input type="text" id="location" name="location" value="<?php echo e(auth()->user()->location); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    </div>

                </div>


                <button type="submit" class="px-4 py-2 mr-2 bg-primary text-white rounded-md hover:bg-primary-dark">Simpan Perubahan</button>
                <a href="<?php echo e(route('profil')); ?>" class=" px-4 py-[10px] mb-4 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Batal</a>
                <hr class="border-gray-200 my-4 mb-4">
                <a href="#" class="px-4 py-[10px] bg-red-500 text-white rounded-md hover:bg-red-600"><i class="ri-delete-bin-5-line"></i> Hapus Akun</a>
            </form>
        </div>

    </main>
    
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
</html><?php /**PATH C:\xampp\htdocs\Pemrograman Web\coretax-lite-restore-laravel10\coretax-lite-restore-laravel10\resources\views/profile/edit.blade.php ENDPATH**/ ?>