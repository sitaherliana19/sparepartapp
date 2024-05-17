<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Lupa Sandi</title>
        <!-- Fonts -->
        <link href="login/font-bunny.css" rel="stylesheet"/>
        <!-- Scripts -->
        <link rel="stylesheet" href="/login/login.css">

        <link rel="stylesheet" href="/font2/css/all.min.css">
        
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 old-transition login-page login-bg">
            <div class="alert alert-danger offset-md-3 w-full sm:max-w-md">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <div class="mb-4 text-sm text-gray-600">Lupa Kata Sandi? Masukkan alamat email Anda untuk menyetel ulang kata sandi</div>
                    <!-- Session Status -->
                    <form method="POST" action="/lupa_sandi">
                        <input type="hidden" name="_token" autocomplete="off">
                        <!-- Email Address -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="email">Email</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="email" type="email" name="email" required="required" autofocus="autofocus">
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Tautan Reset Kata Sandi Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </body>
</html>
