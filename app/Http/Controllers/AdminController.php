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
        $adminUser = session('adminUser');

        if (!$adminUser) {
            return redirect()->route('admin')->withErrors(['message' => 'Admin user not found.']);
        }

        return view('pages.admin.adminDashboard', compact('adminUser'));
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

            $adminUser = $this->adminService->login($request);

            Log::info('Hashed Password from DB: ' . $adminUser->password);

            session(['adminUser' => $adminUser]);

            return redirect()->route('admin.dashboard');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['email' => $e->getMessage()]);
        }
    }
}
