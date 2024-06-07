<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
    
        // Ambil data pesanan dari pengguna yang sedang login
        $user = Auth::user();
        $orders = Order::with(['product', 'transaction'])->where('user_id', $user->id)->get();


        // Kirim data pesanan ke view
        return view('pesanan.index', compact('orders', 'user'));
    
    }
}
