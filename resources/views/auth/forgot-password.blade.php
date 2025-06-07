<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | EconoDocs</title>
    <link rel="stylesheet" href="css/app.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="h-4 ml-6 mt-6">
            <img src="{{ asset('img/Man1.png') }}" alt="Character" class="character-img mx-auto">
        </div>

        <div class="blue-side">
            <img src="{{ asset('img/Building.png') }}" alt="Building" class="building-img mx-auto">
        </div>

        <div class="login-container">
            <div class="mb-6">
                <div class="mb-4 text-sm text-gray-600 grid grid-cols-1 gap-2">
                    <p class="text-2xl font-semibold text-gray-800">
                        {{ __('Lupa Kata Sandi?') }}
                    </p>
                    {{ __('Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan untuk menyetel ulang kata sandi Anda.') }}
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <input id="email" class="block mt-2 w-full rounded-md shadow-sm border-gray-300 border-1 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-start mt-4">
                        <button type="submit" class="w-full inline-flex items-center justify-center py-4 bg-blue-600 border border-transparent rounded-md font-medium text-white uppercase text-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                            <i class="ri-mail-line mr-2"></i>
                            <p>Email Password Reset Link</p>
                        </button>

                    </div>
                    <div class="flex items-start mt-4">
                        <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline"><i class="ri-arrow-left-line"></i>{{ __('  Kembali ke Login') }}</a>
                    </div>
                </form>

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
