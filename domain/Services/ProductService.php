<?php

namespace domain\Services;

use App\Models\Orders;
use App\Models\Product;

class ProductService
{

    protected $product;

    public function __construct()
    {
        $this->product = new Orders();
    }

    public function index($search = null)
    {
        if ($search) {
            return $this->product->where('product_title', 'LIKE', "%{$search}%")
                ->orWhere('id', 'LIKE', "%{$search}%")
                ->get();
        }
        return $this->product->all();
    }
    public function get($product_id)
    {
        return $this->product->find($product_id);
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


    public function delete($id)
    {
        $product = $this->product->find($id);
        $product->delete();
    }

    public function update(array $data, $id)
    {
        $product = $this->product->find($id);

        if ($product) {
            $product->update([
                'product_title' => $data['product_title'],
                'product_sku' => $data['product_sku'],
                'category' => $data['category'],
                'quantity' => $data['quantity'],
                'order_from' => $data['order-from'],
                'order_by' => $data['order-by'],
                'contact_info' => $data['contact-info'],
                'special_instructions' => $data['special-instructions'],
            ]);
        }
    }

    public function updateStatus(array $data, $id)
    {
        $product = $this->product->find($id);

        if ($product) {
            $product->update([
                'product_title' => $data['product_title'],
                'product_sku' => $data['product_sku'],
                'category' => $data['category'],
                'quantity' => $data['quantity'],
                'order_from' => $data['order_from'],
                'order_by' => $data['order_by'],
                'contact_info' => $data['contact_info'],
                'special_instructions' => $data['special_instructions'],
                'status' => $data['update_status'],
            ]);
        }
    }
}
