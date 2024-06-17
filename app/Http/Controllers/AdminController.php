<?php

namespace App\Http\Controllers;

use domain\Facade\AdminFacade;
use domain\Facade\ProductFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;

class AdminController extends Controller
{

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

            $adminUser = AdminFacade::login($request);

            Log::info('Hashed Password from DB: ' . $adminUser->password);

            session(['adminUser' => $adminUser]);

            return redirect()->route('admin.dashboard');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (AuthenticationException $e) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        } catch (\Exception $e) {
            Log::error('Unexpected error during login: ' . $e->getMessage());
            return back()->withErrors(['email' => 'An unexpected error occurred'])->withInput();
        }
    }

    public function logout()
    {
        try {
            AdminFacade::logout();
            return redirect()->route('admin')->with('success', 'Logged out successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->withErrors(['message' => 'Logout failed. Please try again.']);
        }
    }

    public function orders()
    {
        $adminUser = session('adminUser');

        if (!$adminUser) {
            return redirect()->route('admin')->withErrors(['message' => 'Admin user not found.']);
        }

        $products = ProductFacade::index();

        return view('pages.admin.adminOrders', compact('adminUser', 'products'));
    }


    public function generateOrderReport()
    {
        return AdminFacade::generateOrderReport();
    }


    public function products(Request $request)
    {
        $adminUser = session('adminUser');

        if (!$adminUser) {
            return redirect()->route('admin')->withErrors(['message' => 'Admin user not found.']);
        }
        $search = $request->input('search');
        $response['products'] = ProductFacade::index($search);
        $products = AdminFacade::products();

        return view('pages.admin.adminProduct', compact('adminUser', 'products'));
    }

    public function AddProduct()
    {
        $adminUser = session('adminUser');

        if (!$adminUser) {
            return redirect()->route('admin')->withErrors(['message' => 'Admin user not found.']);
        }

        return view('pages.admin.adminAddProduct', compact('adminUser'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_sku' => 'nullable|string|max:50',
            'category' => 'required|string',
            'initial_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        try {
            AdminFacade::store($validatedData);

            return redirect()->route('admin.addProducts')->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        AdminFacade::update($request->all(), $id);
        return redirect()->back();
    }

    public function delete($product_id)
    {
        AdminFacade::delete($product_id);

        return redirect()->back();
    }

    public function generateProductReport()
    {
        return AdminFacade::generateProductReport();
    }
}
