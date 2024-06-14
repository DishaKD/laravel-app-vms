<?php

namespace Domain\Services;

use App\Models\AdminUsers;
use App\Models\Product;
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

            // Logging email for debugging
            Log::info('Login attempt for email: ' . $credentials['email']);

            $adminUser = AdminUsers::where('email', $credentials['email'])->first();

            if (!$adminUser) {
                throw new \Exception('Invalid credentials');
            }

            // Logging fetched admin user information (optional)
            Log::info('Fetched admin user: ' . $adminUser->toJson());

            // Verify the password using Laravel's Hash facade
            if (!Hash::check($credentials['password'], $adminUser->password)) {
                throw new \Exception('Invalid credentials');
            } else {
                Log::info('Password check result: Hash matches');
            }

            // Logging successful login (optional)
            Log::info('Admin user logged in successfully: ' . $adminUser->email);

            return $adminUser;
        } catch (\Exception $e) {
            // Logging authentication failure
            Log::error('Authentication error: ' . $e->getMessage());

            throw $e; // Rethrow the exception to propagate it
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


    public function generateProductReport()
    {
        // Fetch products data
        $products = Product::all();

        // Generate PDF
        $pdf = $this->generatePdfView('admin.reports.product_report', compact('products'));

        return $pdf;
    }

    private function generatePdfView($view, $data = [])
    {
        // Load the view into a HTML string
        $html = view($view, $data)->render();

        // Configure Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'landscape'); // Landscape orientation

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (inline or download)
        return $dompdf->stream('product_report.pdf');
    }
}
