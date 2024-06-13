<?php

namespace Domain\Services;

use App\Models\AdminUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

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
            Log::info('Password Input: ' . $credentials['password']);

            $adminUser = AdminUsers::where('email', $credentials['email'])->first();

            if (!$adminUser) {
                throw new \Exception('Invalid credentials');
            }

            // Logging fetched admin user information (optional)
            Log::info('Fetched admin user: ' . $adminUser->toJson());
            Log::info('Hashed Password 1: ' . $adminUser->password);

            // Verify the password using Laravel's Hash facade
            if (!Hash::check($credentials['password'], $adminUser->password)) {
                Log::info('Password check result: Hash does not match');
                throw new \Exception('Invalid credentials');
            } else {
                Log::info('Password check result: Hash matches');
            }

            $password = '12345';
            $hashedPassword = Hash::make($password);
            Log::info('Hashed Password 2: ' . $hashedPassword);

            echo "Hashed Password 2: $hashedPassword";

            // Logging successful login (optional)
            Log::info('Admin user logged in successfully: ' . $adminUser->email);

            return $adminUser;
        } catch (\Exception $e) {
            // Logging authentication failure
            Log::error('Authentication error: ' . $e->getMessage());

            throw $e; // Rethrow the exception to propagate it
        }
    }
}
