<?php 
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Lista de productos
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create'); // Vista para crear producto
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index'); // Redirige a la lista de productos
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product')); // Vista para mostrar detalle de producto
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product')); // Vista para editar producto
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index'); // Redirige a la lista de productos
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index'); // Redirige a la lista de productos
    }
}

