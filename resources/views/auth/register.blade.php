<!DOCTYPE html>
<html lang="en">
     <head>

          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Register</title>

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
               <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <p class="flex justify-center mb-2 font-semibold text-xl">REGISTRASI</p>
                    <p class="flex justify-center mb-4 font-semibold text-lg">Selamat Datang Di Bengkel Arilla</p>
                    <p class="mb-2 text-l">Isi formulir berikut untuk melanjutkan</p>
                    
                    <!-- Session Status -->
                    <form action="/registerpost" method="post">
                         @csrf
                         
                         <!-- Name -->
                         <div>
                              <label class="block font-medium text-sm text-gray-700" for="name">Nama</label>
                              <input  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="name" type="text" name="name" required="required" autofocus="autofocus" autocomplete="name">
                         </div>
                         
                         <!-- Email Address -->
                         <div class="mt-4">
                              <label class="block font-medium text-sm text-gray-700" for="email">Email</label>
                              <input  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="email" type="email" name="email" required="required" autocomplete="username">
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
                         
                         <!-- Alamat -->
                         <div class="mt-4">
                              <label class="block font-medium text-sm text-gray-700" for="alamat">Alamat</label>
                              <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="alamat" type="text" name="alamat" required="required">
                         </div>
                         
                         <!-- Nomor Handphone -->
                         <div class="mt-4">
                              <label class="block font-medium text-sm text-gray-700" for="nomor-handphone">Nomor Handphone</label>
                              <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="nomor-handphone" type="tel" name="nomor_handphone" required="required">
                         </div>
                         <button type="submit" class="items-center px-4 py-2 mt-4 w-full bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Register</button>
                         <div class="flex items-center justify-end mt-2">
                              <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/log">Sudah Mendaftar?</a>
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
 