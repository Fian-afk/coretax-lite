<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | EconoDocs</title>
    <link rel="stylesheet" href="css/app.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
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
        .login-container {
            position: absolute;
            width: 400px;
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
            font-size: 12px;
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
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <div class="split-container">
        <div class="white-side">
            <img src="<?php echo e(asset('img/Logo.png')); ?>" alt="Logo" class="h-4 ml-6 mt-6">
            <img src="<?php echo e(asset('img/Man1.png')); ?>" alt="Character" class="character-img mx-auto">
        </div>

        <div class="blue-side">
            <img src="<?php echo e(asset('img/Building.png')); ?>" alt="Building" class="building-img mx-auto">
        </div>

        <div class="login-container">
            <div class="mb-6">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-sm text-gray-600">Welcome to <span class="econodocs-text">EconoDocs</span></h2>
                    <div class="text-right grid grid-row-2">
                        <p class="text-sm text-gray-500">Belum punya akun?</p>
                        <a href="<?php echo e(route('register')); ?>" class="text-blue-600 font-medium hover:underline text-sm">Sign up</a>
                    </div>
                </div>
                
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-bold text-gray-800">Sign in</h1>
                </div>
            </div>

            <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Masukkan username atau email anda</label>
                    <input type="text" name="email" placeholder="Username atau alamat email" class="input-field w-full" required>
                </div>

                <div>
                    <label class="block text-sm text-gray-600 mb-1">Masukkan password anda</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="Password" class="input-field w-full" required>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-5">
                            <i class="ri-eye-line text-gray-400"></i>
                        </span>
                    </div>
                    <div class="text-right mt-1">
                        <a href="<?php echo e(route('password.request')); ?>" class="text-blue-600 hover:underline text-xs">Lupa password?</a>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white  py-3 rounded-lg hover:bg-blue-700 transition font-medium text-sm">
                    Sign in
                </button>
            </form>

            <div class="flex items-center my-4">
                <div class="flex-1 border-t border-gray-300"></div>
                <span class="px-3 text-gray-400 text-sm">Atau</span>
                <div class="flex-1 border-t border-gray-300"></div>
            </div>

            <a href="<?php echo e(route('admin.login')); ?>" class="block text-center py-3 rounded-lg text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white transition font-medium text-sm">
                Sign in sebagai Admin
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
</html>
<?php /**PATH C:\xampp\htdocs\Pemrograman Web\coretax-lite-restore-laravel10\coretax-lite-restore-laravel10\resources\views/auth/login.blade.php ENDPATH**/ ?>