<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class loginController extends Controller
{
     public function index(){
          return view('auth.login');
     }

     // Login 

     public function login_post(Request $request){
        Session::flash('email', $request->email);
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);
    
        $loginproses= [
            'email'     => $request->email,
            'password'  => $request->password
        ];
    
        if(Auth::attempt($loginproses)){
            if(Auth::user()->role == 'admin') {
                return redirect('admin-dashboard');
            } else {
                return redirect('halamanutama');
            }
        } else {
            return redirect()->route('login')->withErrors('Email atau Password Anda Salah');
        }
    }
     public function logout(){
          Auth::logout();
          return redirect()->route('login')->with('success','Anda berhasil logout');
     }

     public function register(){
          return view('auth.register');
     }

     //register
     public function register_post (Request $request){
          Session::flash('nama', $request->nama);
          Session::flash('email', $request->email);
          $data1 = $request->validate([
              'name'     => 'required',
              'email'     => 'required',
              'password'  => 'required',
              'alamat'  => 'required',
              'nomor_handphone'  => 'required',
            ],[
               'name.required' => 'Nama wajib diisi',
               'email.required' => 'Email wajib diisi',
               'email.email' => 'Silahkan masukkan email yang valid',
               'password.required' => 'Password wajib diisi',
               'password.min' => 'Minimun password yang digunakan 6 karakter',
            ]);

               $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'alamat' => $request->alamat,
                'nomor_handphone' => $request->nomor_handphone,
            ]);

            if (Auth::login($user)) {
                // Redirect ke halaman yang sesuai setelah login
                if ($user->role == 'admin') {
                    return redirect('admin-dashboard');
                } else {
                    return redirect('halamanutama');
                }
            } else {
                // Gagal autentikasi
                return redirect()->route('login')->withErrors('Gagal login.');
            }
       }
  
    
}
