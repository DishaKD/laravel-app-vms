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
            'product_sku' => $request -> input('product_sku'),
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'order_from' => $request-> input('order_from'),
            'order_by' => $request -> input('order_by'),
            'contact_info' => $request -> input('contact_info'),
            'special_instructions' => $request -> input('special_instructions'),
            'status' => 0
        ]);

        return redirect() -> back();

    }
}
