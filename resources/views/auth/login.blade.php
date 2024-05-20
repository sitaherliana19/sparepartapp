<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>

        <!-- Fonts -->
        <link href="font-bunny.css" rel="stylesheet">
    
        <!-- Scripts -->
        <link rel="stylesheet" href="/login/login.css">

        <link rel="stylesheet" href="/font2/css/all.min.css">
        
        <!-- Custom CSS -->
        <style>
            #password-visibility-toggle {
                position: absolute;
                right: 0;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 old-transition login-page login-bg">
            <div class="alert alert-danger offset-md-3 w-full sm:max-w-md">
                <ul style="text-align: center;">
                    @foreach ($errors->all() as $item)
                        <li><div style="border: 1px solid gray; padding: 10px; background-color: pink;">{{ $item }}</div></li>
                    @endforeach
                </ul>
            </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg ">
                <p class="flex justify-center mb-4 font-semibold text-xl">LOGIN</p>
                <p class="mb-4 text-m">Masukkan informasi akun anda</p>
                
                <!-- Session Status -->
                <form method="post" action="{{ route('login_post')}}">
                    {{ csrf_field() }}
                    @csrf
                    
                    <!-- Email Address -->
                    <div>
                        <label class="block font-medium text-sm text-gray-700" for="email">Email</label>
                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="email" type="email" name="email" required="required" autofocus="autofocus" autocomplete="username" value={{ Session::get('email') }} >
                    </div>
                    
                    <!-- Password -->
                    <div class="mt-4 relative">
                        <label class="block font-medium text-sm text-gray-700" for="password">Password</label>
                        <div class="flex items-center">
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full pr-10" id="password" type="password" name="password" required="required" autocomplete="current-password">
                            <button type="button" class="absolute inset-y-0 right-0 px-3 py-2 bg-gray-300 text-gray-600 hover:text-gray-700 focus:outline-none" id="password-visibility-toggle" onclick="togglePasswordVisibility()">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Ingat saya -->
                    <div class="block mt-1">
                        <label for="ingat saya" class="inline-flex items-center">
                            <input id="ingat saya" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="ingat saya">
                            <span class="ms-2 text-sm text-gray-600">Ingat Saya</span>
                        </label>
                    </div>
                    <button type="submit" class="items-center px-4 py-2 mt-4 w-full bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Log in</button>
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">Lupa Kata Sandi?</a>
                    </div>                    
                    <div class="flex items-center justify-end mt-4">
                        <a class="class=mb-0 text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  text-sm">
                            <b>Belum Punya Akun?</b><a href="{{ route('register') }}" class="underline text-sm text-gray-600">Daftar Akun</a>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var passwordVisibilityToggle = document.getElementById('password-visibility-toggle');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordVisibilityToggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordInput.type = 'password';
            passwordVisibilityToggle.innerHTML = '<i class="fas fa-eye"></i>';
        }
    }
</script>





    

 

