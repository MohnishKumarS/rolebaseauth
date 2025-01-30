<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
            // Validation
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                // 'role' => 'required|in:admin,user',
            ]);

            // Create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role ??  'user'
            ]);

 

            event(new Registered($user));

            Auth::login($user);

                // **Check if request is an API request**
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'User registered successfully!',
                'user' => $user,
                'token' => $user->createToken('API Token')->plainTextToken
            ], 201);
        }

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        

        return redirect('dashboard')->with('success', 'Registration successful!');
    }
}
