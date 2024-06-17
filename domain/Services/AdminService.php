<?php

namespace Domain\Services;

use App\Models\AdminUsers;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Products;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class AdminService
{
    /**
     * Attempt to authenticate an admin user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\AdminUsers|null
     * @throws \Exception
     */
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            Log::info('Login attempt for email: ' . $credentials['email']);

            $adminUser = AdminUsers::where('email', $credentials['email'])->first();

            if (!$adminUser) {
                throw new \Exception('Invalid credentials');
            }

            Log::info('Fetched admin user: ' . $adminUser->toJson());

            if (!Hash::check($credentials['password'], $adminUser->password)) {
                throw new \Exception('Invalid credentials');
            } else {
                Log::info('Password check result: Hash matches');
            }

            Log::info('Admin user logged in successfully: ' . $adminUser->email);

            return $adminUser;
        } catch (\Exception $e) {
            Log::error('Authentication error: ' . $e->getMessage());

            throw $e;
        }
    }

    public function logout()
    {
        try {
            Log::info('Admin user logged out successfully.');

            session()->forget('adminUser');
        } catch (\Exception $e) {
            Log::error('Logout error: ' . $e->getMessage());

            throw $e;
        }
    }


    public function generateOrderReport()
    {
        $products = Orders::all();

        $pdf = $this->generatePdfView('admin.reports.order_report', compact('products'));

        return $pdf;
    }

    private function generatePdfView($view, $data = [])
    {
        $html = view($view, $data)->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape'); // Landscape orientation

        $dompdf->render();

        return $dompdf->stream('order_report.pdf');
    }

    public function store(array $data)
    {
        try {
            $product = Products::create([
                'product_name' => $data['product_name'],
                'product_sku' => $data['product_sku'],
                'category' => $data['category'],
                'initial_price' => $data['initial_price'],
                'selling_price' => $data['selling_price'],
                'stock' => $data['stock'],
            ]);

            Log::info('Product created successfully: ' . $product->id);

            return $product;
        } catch (\Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            throw $e;
        }
    }

    protected $product;

    public function __construct()
    {
        $this->product = new Products();
    }
    public function products($search = null)
    {
        if ($search) {
            return $this->product->where('product_name', 'LIKE', "%{$search}%")
                ->orWhere('id', 'LIKE', "%{$search}%")
                ->orWhere('product_sku', 'LIKE', "%{$search}%")
                ->get();
        }
        return $this->product->all();
    }

    public function update(array $data, $id)
    {
        $product = $this->product->find($id);

        if ($product) {
            $product->update([
                'product_name' => $data['product_name'],
                'product_sku' => $data['product_sku'],
                'category' => $data['category'],
                'initial_price' => $data['initial_price'],
                'selling_price' => $data['selling_price'],
                'stock' => $data['stock'],
            ]);
        }
    }

    public function delete($id)
    {
        $product = $this->product->find($id);
        $product->delete();
    }

    public function generateProductReport()
    {
        $products = Products::all();

        $pdf = $this->generateProductPdfView('admin.reports.product_report', compact('products'));

        return $pdf;
    }

    private function generateProductPdfView($view, $data = [])
    {
        $html = view($view, $data)->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape'); // Landscape orientation

        $dompdf->render();

        return $dompdf->stream('product_report.pdf');
    }
}
