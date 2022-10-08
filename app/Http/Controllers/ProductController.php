<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('products.index', ['data' => Product::all()]);
    }

    public function store(Request $request)
    {
        $products = new Product($request->all());
        $products->save();
        return back()->with(['tatus-success' => 'Product Save']);
    }

    public function show($id)
    {
        $data = Product::find($id);

        return view('products.show', ['data' => $data]);
    }

    
}
