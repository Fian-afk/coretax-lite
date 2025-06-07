<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin | EconoDocs</title>
    <link rel="stylesheet" href="css/app.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc; 
        }
        .split-container {
            display: flex;
            width: 100%;
            height: 600px;
            overflow: hidden;
            position: relative;
        }
        .white-side {
            width: 50%;
            background: white;
            position: relative;
        }
        .blue-side {
            width: 50%;
            background: #6FB1FC; 
            position: relative;
        }
        .admin-login-container { 
            position: absolute;
            width: 350px; 
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
        }
        .input-field {
            border: 1px solid #D1D5DB; 
            border-radius: 8px;
            padding: 12px 14px;
        }
        .input-field:focus {
            outline: none;
            border-color: #3B82F6; 
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }
        .econodocs-text {
            font-family: 'Pacifico', cursive;
            color: #3B82F6; 
        }
        .character-img {
            position: absolute;
            bottom: 0px;
            left: 0px;
            height: 450px;
            max-width: none;
        }
        .building-img {
            position: absolute;
            top: 40%;
            right: 0px;
            transform: translateY(-60%);
            height: 270px;
            z-index: 1;
        }
        .admin-login-container label {
            font-size: 12px !important;
        }
        .admin-login-container .input-field {
            font-size: 12px !important;
        }
        .admin-login-container .text-right a.text-blue-600 {
            font-size: 12px !important;
        }
        .admin-login-container button[type="submit"] {
            font-size: 12px !important;
            padding-top: 8px !important;
            padding-bottom: 8px !important;
        }
        .admin-login-container h2 { 
            font-size: 12px;
        }
        .admin-login-container h1 { 
            font-size: 26px; 
        }
        .admin-login-container span.px-3.text-gray-400 { 
            font-size: 12px;
        }
        .admin-login-container a.block.text-center.border {
            font-size: 12px !important;
            padding-top: 10px;
            padding-bottom: 10px;
            background-color: #EBF5FF; 
            border-color: #EBF5FF; 
            color: #3B82F6; 
        }
        .admin-login-container a.block.text-center.border:hover {
            background-color: #DDEBFB; 
            border-color: #DDEBFB;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <div class="split-container">
        <div class="white-side">
            <img src="<?php echo e(asset('img/Logo.png')); ?>" alt="Logo" class="h-4 ml-6 mt-6"> 
            <img src="<?php echo e(asset('img/Man1.png')); ?>" alt="Character" class="character-img">
        </div>
        
        <div class="blue-side">
            <img src="<?php echo e(asset('img/Building.png')); ?>" alt="Building" class="building-img">
        </div>
        
        <div class="admin-login-container">
            <div class="mb-6">
                <h2 class="text-sm text-gray-600 mb-2">Welcome to <span class="econodocs-text">EconoDocs</span></h2>
                <h1 class="text-3xl font-bold text-gray-800">Sign in Admin</h1>
            </div>

            <form action="<?php echo e(route('admin.login.submit')); ?>" method="POST" class="space-y-4">
                <?php echo csrf_field(); ?>
                
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Masukkan ID Perusahaan</label>
                    <input type="text" name="company_id" placeholder="123xxxx"
                           class="input-field w-full" required>
                </div>
                
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Masukkan Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="Password" class="input-field w-full pr-10" required>
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <i class="ri-eye-line text-gray-400"></i>
                        </span>
                    </div>
                    <div class="text-right mt-1">
                        <a href="#" class="text-blue-600 hover:underline text-xs">Lupa password?</a> 
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-medium text-sm">
                    Sign in
                </button>
            </form>

            <div class="flex items-center my-4">
                <div class="flex-1 border-t border-gray-300"></div>
                <span class="px-3 text-gray-400 text-sm">Atau</span>
                <div class="flex-1 border-t border-gray-300"></div>
            </div>

            <a href="<?php echo e(route('login')); ?>" class="block text-center bg-blue-50 py-3 rounded-lg text-blue-600 hover:bg-blue-600 hover:text-white transition font-medium text-sm">
                Sign in sebagai User
            </a>
        </div>
    </div>
    <script>
        const $password = document.querySelector('#password');
        const $togglePassword = document.querySelector('.ri-eye-line');

        const showHidePassword = () => {
            if ($password.type === 'password') {
                $password.setAttribute('type', 'text');
            } else {
                $password.setAttribute('type', 'password');
            }
            $togglePassword.classList.toggle('ri-eye-line');
            $togglePassword.classList.toggle('ri-eye-off-line');
        }
        $togglePassword.addEventListener('click', showHidePassword);
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Pemrograman Web\coretax-lite-restore-laravel10\coretax-lite-restore-laravel10\resources\views/auth/login-admin.blade.php ENDPATH**/ ?>