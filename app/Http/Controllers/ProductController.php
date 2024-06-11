<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $response ['products'] = $this->product->all();
        return view('pages.productDashboard')->with($response);
    }

    public function store(Request $request)
    {
        $this->product->create([
            'product_title' => $request->input('product_title'),
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status') === 'approved'
        ]);

        return redirect() -> back();

    }
}
