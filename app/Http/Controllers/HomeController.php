<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $products = Product::where('name', 'LIKE', "%{$query}%")
                               ->orWhere('detail', 'LIKE', "%{$query}%")
                               ->get();
        } else {
            $products = Product::all();
        }

        $totalProducts = Product::count();
        $totalOrders = Order::count();

        $hasResults = $products->isNotEmpty();

        return view('home', compact('totalProducts', 'totalOrders', 'products', 'hasResults', 'query'));
    }
    public function product()
    {
        $products = Product::all(); // Ambil semua produk dari database
        return view('product', ['products' => $products]);
    }
    public function contact()
    {
        // Logic untuk menampilkan halaman produk
        return view('contact');
    }
}

