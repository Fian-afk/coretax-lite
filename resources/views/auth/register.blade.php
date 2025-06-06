<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | EconoDocs</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/app.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.5.7/css/intlTelInput.css" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
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
        .register-container {
            position: absolute;
            width: 450px;
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
            <img src="{{ asset('img/Man1.png') }}" alt="Character" class="character-img">
        </div>

        <div class="blue-side">
            <img src="{{ asset('img/Building.png') }}" alt="Building" class="building-img">
        </div>

        <div class="register-container">
            <div class="mb-6">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-sm text-gray-600">Welcome to <span class="econodocs-text">EconoDocs</span></h2>
                    <div class="text-right grid grid-row-2">
                        <p class="text-sm text-gray-500">Sudah punya akun?</p>
                        <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline text-sm">Sign in</a>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-bold text-gray-800">Sign up</h1>
                </div>
            </div>
            
            <form method="POST" action="{{ route('register') }}" class="space-y-4" id="Form">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <!-- Email -->
                    <div class="col-span-2">
                        <label class="block text-sm text-gray-600 mb-2">Masukkan alamat email anda</label>
                        <input type="email" name="email" value="{{old('email')}}" placeholder="Alamat email" class="input-field w-full {{ $errors->has('email') ? 'input-error' : '' }}" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
                    </div>
                    <!-- Name -->
                    <div>
                        <label for="username" class="block text-sm text-gray-600 mb-2">Username</label>
                        <input id="username" class="input-field w-full" type="text" name="username" value="{{ old('username') }}" placeholder="Username" required />
                        <x-input-error :messages="$errors->get('username')" class="mt-1 text-red-500 text-sm" />
                    </div>
                    <!-- Phone -->
                    <div>
                        <label for="telp" class="block text-sm text-gray-600 mb-2">Nomor Telepon</label>
                        <input id="telp" class="input-field w-full" type="tel" name="telp" value="{{ old('telp') }}" required />
                        <x-input-error :messages="$errors->get('telp')" class="mt-1 text-red-500 text-sm" />
                    </div>
                    <!-- Password -->
                    <div class="col-span-2">
                        <label for="password" class="block text-sm text-gray-600 mb-2">Password</label>
                        <div class="relative">
                            <input id="password" class="input-field w-full" type="password" name="password" value="{{ old('password') }}" required placeholder="Minimal 8 Karakter"/>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-5">
                                <i class="ri-eye-line text-gray-400"></i>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-span-2">
                        <label for="password_confirmation" class="block text-sm text-gray-600 mb-2">Konfirmasi password</label>
                        <input id="password_confirmation" class="input-field w-full pb-2" type="password" name="password_confirmation" required oninput="checkMatch()"/>
                        <p id="status" class="text-xs"></p>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <button type="submit" class="col-span-2 w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-medium text-sm flex items-center justify-center">
                        Sign up
                    </button>

                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.5.7/js/intlTelInput.min.js"></script>
    <script>
        // 3. Inisialisasi plugin
        const phoneInputField = document.querySelector("#telp");
        const phoneInput = window.intlTelInput(phoneInputField, {
            // Opsi-opsi umum:
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.5.7/js/utils.js", 
            initialCountry: "id", 
            separateDialCode: true,
            autoPlaceholder: "polite", 
        });

        // Password
        
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

        // Konfirmasi Password
        function checkMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const status = document.getElementById('status');

            if (password === confirmPassword && password !== "") {
                status.textContent = 'Kata sandi cocok';
                status.className = 'text-green-500';
            } else {
                status.textContent = 'Kata sandi tidak cocok';
                status.className = 'text-red-500';
            }
        }
    </script>
</body>
</html>