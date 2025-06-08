<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EconoDocs - Repositori Dokumen</title>
    <link rel="stylesheet" href="css/app.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        .upload-area {
            border: 2px dashed #e2e8f0;
            transition: all 0.3s ease;
        }
        .upload-area.dragover {
            border-color: #4f46e5;
            background-color: rgba(79, 70, 229, 0.05);
        }
        .file-preview {
            display: none;
        }
        .progress-container {
            display: none;
        }
    </style>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#4f46e5',secondary:'#8b5cf6'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header & Navigation -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <a href="#" class="text-3xl font-['Pacifico'] text-primary">EconoDocs</a>
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
                <a href="<?php echo e(route('document')); ?>" class="text-gray-600 hover:text-primary font-medium text-sm">Dokumen</a>
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

    <div class="mt-16 max-w-3xl mx-auto p-6 md:p-8">
        <div class="bg-white shadow-md rounded-lg p-6 md:p-8">
            <div class="mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Upload Dokumen</h1>
                <p class="text-gray-600 mt-2">Silakan isi informasi dokumen dan unggah file Anda</p>
            </div>

            <form id="documentForm" class="space-y-6" method="POST" action="<?php echo e(route('dokumen.upload.store')); ?>" enctype="multipart/form-data">
                <!-- Judul -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <div class="error-message text-red-500 text-sm mt-1 hidden"></div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" rows="4" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                    <div class="error-message text-red-500 text-sm mt-1 hidden"></div>
                </div>

                <!-- Kategori -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="flex items-center">
                            <div class="relative w-full">
                                <select id="category" name="category" required class="w-full appearance-none px-4 py-2.5 bg-gray-50 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent pr-8">
                                    <option value="" disabled selected>Pilih kategori</option>
                                    <option value="makro">Makroekonomi</option>
                                    <option value="mikro">Mikroekonomi</option>
                                    <option value="saham">Pasar Saham</option>
                                    <option value="ekonomi_digital">Ekonomi Digital</option>
                                    <option value="laporan">Laporan Keuangan</option>
                                    <option value="riset">Riset Ekonomi</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <div class="w-5 h-5 flex items-center justify-center">
                                        <i class="ri-arrow-down-s-line"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="error-message text-red-500 text-sm mt-1 hidden"></div>
                </div>

                <!-- Instansi Pengunggah -->
                <div>
                    <label for="instansi" class="block text-sm font-medium text-gray-700 mb-1">Instansi Pengunggah</label>
                    <input type="text" id="tags" name="instansi" placeholder="Contoh : Bank Indonesia" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>

                <!-- File Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">File (PDF, DOCX, XLSX, CSV, ZIP) <span class="text-red-500">*</span></label>
                    
                    <div id="uploadArea" class="upload-area rounded-lg p-6 bg-gray-50 text-center cursor-pointer">
                        <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center text-primary">
                            <i class="ri-upload-cloud-line ri-3x"></i>
                        </div>
                        <p class="text-gray-700 font-medium">Tarik dan lepas file di sini atau</p>
                        <button type="button" id="browseButton" class="mt-3 px-4 py-2 bg-primary text-white font-medium rounded-lg hover:bg-opacity-90 transition-all whitespace-nowrap">Pilih File</button>
                        <input type="file" id="fileInput" name="document" accept=".pdf,.docx,.xlsx,.pptx" class="hidden" required>
                        <p class="text-sm text-gray-500 mt-3">Ukuran maksimal: 10MB</p>
                    </div>
                    
                    <div id="filePreview" class="file-preview mt-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 flex items-center justify-center text-primary mr-3">
                                    <i class="ri-file-line ri-2x"></i>
                                </div>
                                <div>
                                    <p id="fileName" class="font-medium text-gray-800 truncate max-w-xs">document.pdf</p>
                                    <p id="fileSize" class="text-sm text-gray-500">2.5 MB</p>
                                </div>
                            </div>
                            <button type="button" id="removeFile" class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500 transition-colors">
                                <i class="ri-close-line ri-lg"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div id="progressContainer" class="progress-container mt-4">
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Mengunggah...</span>
                            <span id="progressPercentage">0%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div id="progressBar" class="bg-primary h-2 rounded-lg" style="width: 0%"></div>
                        </div>
                    </div>
                    
                    <div id="uploadError" class="text-red-500 text-sm mt-2 hidden"></div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <?php echo csrf_field(); ?>
                    <button type="submit" id="submitButton" class="w-full py-3 bg-primary text-white font-medium rounded-lg hover:bg-opacity-90 transition-all whitespace-nowrap">
                        Upload Dokumen
                    </button>
                    <button type="button" id="cancelButton" class=" w-full mt-3 px-4 py-2 bg-gray-300 text-gray-800 font-medium rounded-lg hover:bg-gray-400 transition-all whitespace-nowrap">
                        Batalkan
                    </button>
                </div>
            </form>
        </div>
    </div>
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
             viewBox="24 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
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

    <script id="file-upload-handlers">
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('documentForm'); // Tambahkan deklarasi form
            const uploadArea = document.getElementById('uploadArea');
            const fileInput = document.getElementById('fileInput');
            const browseButton = document.getElementById('browseButton');
            const filePreview = document.getElementById('filePreview');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');
            const removeFile = document.getElementById('removeFile');
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('progressBar');
            const progressPercentage = document.getElementById('progressPercentage');
            const uploadError = document.getElementById('uploadError');

            // Trigger file input when browse button is clicked
            browseButton.addEventListener('click', function() {
                fileInput.click();
            });
            
            // Handle file selection
            fileInput.addEventListener('change', function() {
                handleFiles(this.files);
            });
            
            // Drag and drop functionality
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                uploadArea.addEventListener(eventName, function() {
                    uploadArea.classList.add('dragover');
                }, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, function() {
                    uploadArea.classList.remove('dragover');
                }, false);
            });
            
            uploadArea.addEventListener('drop', function(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                handleFiles(files);
            }, false);
            
            // Handle the selected files
            function handleFiles(files) {
                if (files.length === 0) return;
                
                const file = files[0];
                const fileType = file.type;
                const fileExtension = file.name.split('.').pop().toLowerCase();
                const validExtensions = ['pdf', 'docx', 'xlsx', 'csv', 'zip'];
                const maxSize = 10 * 1024 * 1024; // 10MB
                
                // Validate file type
                if (!validExtensions.includes(fileExtension)) {
                    showError('Format file tidak didukung. Silakan gunakan PDF, DOCX, XLSX, CSV, atau ZIP.');
                    return;
                }
                
                // Validate file size
                if (file.size > maxSize) {
                    showError('Ukuran file terlalu besar. Maksimal 10MB.');
                    return;
                }
                
                // Clear any previous errors
                hideError();
                
                // Display file info
                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);
                filePreview.style.display = 'block';
                uploadArea.style.display = 'none';
                
                // Simulate file upload
                simulateUpload();
            }
            
            // Remove selected file
            removeFile.addEventListener('click', function() {
                fileInput.value = '';
                filePreview.style.display = 'none';
                uploadArea.style.display = 'block';
                progressContainer.style.display = 'none';
                progressBar.style.width = '0%';
                progressPercentage.textContent = '0%';
                hideError();
            });
            
            // Tombol Batalkan
            const cancelButton = document.getElementById('cancelButton');
            cancelButton.addEventListener('click', function() {
                form.reset();
                fileInput.value = '';
                filePreview.style.display = 'none';
                uploadArea.style.display = 'block';
                progressContainer.style.display = 'none';
                progressBar.style.width = '0%';
                progressPercentage.textContent = '0%';
                hideError();
            });
            
            // Format file size
            function formatFileSize(bytes) {
                if (bytes < 1024) return bytes + ' B';
                else if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
                else return (bytes / 1048576).toFixed(1) + ' MB';
            }
            
            // Show error message
            function showError(message) {
                uploadError.textContent = message;
                uploadError.classList.remove('hidden');
            }
            
            // Hide error message
            function hideError() {
                uploadError.textContent = '';
                uploadError.classList.add('hidden');
            }
            
            // Simulate file upload progress
            function simulateUpload() {
                progressContainer.style.display = 'block';
                let progress = 0;
                
                const interval = setInterval(() => {
                    progress += Math.random() * 10;
                    if (progress > 100) progress = 100;
                    
                    progressBar.style.width = progress + '%';
                    progressPercentage.textContent = Math.round(progress) + '%';
                    
                    if (progress === 100) {
                        clearInterval(interval);
                    }
                }, 300);
            }
        });
    </script>

    <script id="form-validation">
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('documentForm');
            const requiredFields = form.querySelectorAll('[required]');
            
            form.addEventListener('submit', function(e) {
                if (isValid) {
                    form.submit(); // Kirim ke backend
                } else {
                    e.preventDefault(); // Hanya cegah submit jika tidak valid
                }
                
                let isValid = true;
                
                // Validate all required fields
                requiredFields.forEach(field => {
                    const errorElement = field.parentElement.querySelector('.error-message');
                    
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('border-red-500');
                        
                        if (errorElement) {
                            errorElement.textContent = 'Bidang ini wajib diisi';
                            errorElement.classList.remove('hidden');
                        }
                    } else {
                        field.classList.remove('border-red-500');
                        
                        if (errorElement) {
                            errorElement.classList.add('hidden');
                        }
                    }
                });
                
                // Validate year input
                const yearInput = document.getElementById('year');
                const yearError = yearInput.parentElement.querySelector('.error-message');
                const currentYear = new Date().getFullYear();
                
                if (yearInput.value) {
                    const year = parseInt(yearInput.value);
                    if (year < 1900 || year > currentYear + 1) {
                        isValid = false;
                        yearInput.classList.add('border-red-500');
                        yearError.textContent = `Tahun harus antara 1900 dan ${currentYear + 1}`;
                        yearError.classList.remove('hidden');
                    }
                }
                
                // If form is valid, show success message
                if (isValid) {
                    // Simulate form submission
                    const submitButton = document.getElementById('submitButton');
                    submitButton.disabled = true;
                    submitButton.innerHTML = '<span class="flex items-center justify-center"><i class="ri-loader-4-line ri-spin mr-2"></i> Memproses...</span>';
                    
                    setTimeout(() => {
                        // Reset form
                        form.reset();
                        document.getElementById('filePreview').style.display = 'none';
                        document.getElementById('uploadArea').style.display = 'block';
                        document.getElementById('progressContainer').style.display = 'none';
                        
                        // Show success message
                        alert('Dokumen berhasil diunggah!');
                        
                        // Reset button
                        submitButton.disabled = false;
                        submitButton.textContent = 'Upload Dokumen';
                    }, 2000);
                }
            });
            
            // Clear validation errors on input
            requiredFields.forEach(field => {
                field.addEventListener('input', function() {
                    const errorElement = field.parentElement.querySelector('.error-message');
                    field.classList.remove('border-red-500');
                    
                    if (errorElement) {
                        errorElement.classList.add('hidden');
                    }
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
</html><?php /**PATH C:\xampp\htdocs\Pemrograman Web\coretax-lite-restore-laravel10 (1)\coretax-lite-restore-laravel10\resources\views/upload.blade.php ENDPATH**/ ?>