<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request  $request)
    {
        // $request->authenticate();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (!Auth::attempt($request->only('email', 'password'))) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }

        $user = Auth::user();

        // $request->session()->regenerate();
        // $user = Auth::user();
        // $token = $user->createToken('API Token')->plainTextToken;
        if ($request->expectsJson()) {
            // Return JSON response for API requests
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful!',
                'user' => $user,
                'token' => $user->createToken('API Token')->plainTextToken
            ], 200);
        }
        $request->session()->regenerate();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {

        if ($request->expectsJson()) {
            if (!$request->user()) {
                return response()->json(['error' => 'User is not authenticated'], 401);
            }
            $request->user()->tokens()->delete();
            return response()->json(['message' => 'Logged out successfully!'], 200);
        }
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
