<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Services\AdminService;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        return view('pages.admin.adminLogin');
    }

    public function dashboard()
    {
        return view('pages.admin.adminDashboard');
    }

    public function login(Request $request)
    {
        Log::info('Login method called.');
        try {
            // Validate request data
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            Log::info('Email: ' . $request->input('email'));

            // Attempt login using AdminService
            $adminUser = $this->adminService->login($request);

            Log::info('Hashed Password from DB: ' . $adminUser->password);


            // Redirect to admin dashboard upon successful login
            return redirect()->route('admin.dashboard');
        } catch (\Exception $e) {
            // Handle exceptions by redirecting back with input and error messages
            return back()->withInput()->withErrors(['email' => $e->getMessage()]);
        }
    }
}
