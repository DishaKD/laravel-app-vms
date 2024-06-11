<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new Product();
    }

    public function index()
    {
        return view('');
    }

    public function store(Request $request)
    {
        $this->task->create([
            'product_title' => $request->input('product_title'),
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status') === 'approved'
        ]);

        return redirect() -> back();

    }
}
