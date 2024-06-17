<?php

namespace App\Http\Controllers;

use App\Models\Product;
use domain\Facade\ProductFacade;
use Illuminate\Http\Request;

class ProductController extends ParentController
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $response['products'] = ProductFacade::index($search);
        return view('pages.productDashboard')->with($response);
    }

    public function store(Request $request)
    {
        ProductFacade::store([
            'product_title' => $request->input('product_title'),
            'product_sku' => $request->input('product_sku'),
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'order_from' => $request->input('order_from'),
            'order_by' => $request->input('order_by'),
            'contact_info' => $request->input('contact_info'),
            'special_instructions' => $request->input('special_instructions'),
            'status' => 0
        ]);

        return redirect()->back();
    }


    public function delete($product_id)
    {
        ProductFacade::delete($product_id);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        ProductFacade::update($request->all(), $id);
        return redirect()->back();
    }

    public function updateStatus(Request $request, $id)
    {
        ProductFacade::updateStatus($request->all(), $id);
        return redirect()->route('admin.orders');
    }
}
