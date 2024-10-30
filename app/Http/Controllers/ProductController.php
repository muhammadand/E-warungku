<?php
  
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    public function index(Request $request): View
    {

        $query = $request->input('query');

        if ($query) {
            $products = Product::where('name', 'LIKE', "%{$query}%")
                               ->orWhere('detail', 'LIKE', "%{$query}%")
                               ->get();
        } else {
            $products = Product::all();
        }
        $products = Product::latest()->paginate(5);
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $username = Auth::user()->name;
        
        return view('products.index', compact('products', 'totalProducts', 'totalOrders','username'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
{
    $username = Auth::user()->name; // Mengambil nama pengguna yang sedang login
    $products = Product::latest()->paginate(5);
    $totalProducts = Product::count();
    $totalOrders = Order::count();
    
    return view('products.create', compact('username','products', 'totalProducts', 'totalOrders'));
}
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'harga' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
      
        Product::create($input);
       
        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $username = Auth::user()->name;
    
        return view('products.show', compact('product', 'totalProducts', 'totalOrders','username'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'harga'=>'required',
            'detail' => 'required'
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
            
        $product->update($input);
      
        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
         
        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully');
    }
}