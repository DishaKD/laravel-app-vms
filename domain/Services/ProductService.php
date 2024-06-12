<?php

namespace domain\Services;

use App\Models\Product;

class ProductService
{

       protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        return $this->product->all();
    }

    public function store($data)
{
    $this->product->create([
        'product_title' => $data['product_title'],
        'product_sku' => $data['product_sku'],
        'category' => $data['category'],
        'quantity' => $data['quantity'],
        'order_from' => $data['order_from'],
        'order_by' => $data['order_by'],
        'contact_info' => $data['contact_info'],
        'special_instructions' => $data['special_instructions'],
        'status' => 0
    ]);
}


    public function delete($product_id)
    {
        $product = $this->product->find($product_id);
        $product->delete();
    }

}
