<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $totalOrders = Order::count();
        $orders = Order::latest()->paginate(10);
        return view('orders.index', compact('orders','totalOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product): View
    {
   
        $totalOrders = Order::count();
        return view('orders.create', compact('product','totalOrders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data yang diterima dari request sesuai kebutuhan
        $validatedData = $request->validate([
            'product_id' => 'required', // Menambahkan validasi untuk product_id
            'quantity' => 'required|numeric', // Menambahkan validasi untuk quantity
            'rasa' => 'rasa', // Menambahkan validasi untuk level
        ]);

        // Simpan pesanan ke dalam database
        $order = new Order();
        $order->product_id = $validatedData['product_id']; // Menggunakan 'product_id' dari $validatedData
        $order->quantity = $validatedData['quantity']; // Menggunakan 'quantity' dari $validatedData
        $order->rasa = $validatedData['rasa']; // Menggunakan 'level' dari $validatedData
     
        // Atur properti pesanan lainnya sesuai kebutuhan
        $order->save();

        // Redirect ke halaman yang sesuai setelah pesanan berhasil dibuat
        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): View
    {
        // Tampilkan detail pesanan
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order): View
    {
        // Tampilkan form untuk mengedit pesanan
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order): RedirectResponse
    {
        // Validasi data yang diterima dari request sesuai kebutuhan

        // Perbarui data pesanan
        // Contoh:
        // $order->update($request->all());

        // Redirect ke halaman yang sesuai setelah pesanan berhasil diperbarui
        // return redirect()->route('orders.index')->with('success', 'Order updated successfully!');

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): RedirectResponse
    {
        // Hapus pesanan dari database
        // Contoh:
        // $order->delete();

        // Redirect ke halaman yang sesuai setelah pesanan berhasil dihapus
        // return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
