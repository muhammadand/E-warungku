<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;  // Import model Product

class AdminController extends Controller
{
    public function index()
    {
        
        // Mengambil jumlah total produk dari database
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalQuantitySold = Order::sum('quantity');
        $username = Auth::user()->name;

        // Mengirimkan data total produk ke tampilan
        return view('admin.index', compact('totalProducts','totalOrders','username','totalQuantitySold'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function orders()
    {
        $orders = Order::paginate(10); // Paginasi dengan 10 item per halaman
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $username = Auth::user()->name;
        return view('admin.orders', compact('orders','totalProducts','totalOrders','username'));
    }
    public function product()
    {
        // Logic untuk menampilkan halaman produk
        return view('product');
    }
}
