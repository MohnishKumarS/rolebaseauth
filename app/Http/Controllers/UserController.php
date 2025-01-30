<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // **Admin sees all users, normal user sees only their own details**
        $users = $user->role === 'admin' ? User::all() : User::where('id', $user->id)->get();

        // ✅ **API Request (JSON Response)**
        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'users' => $users
            ], 200);
        }

        // ✅ **Web Request (HTML View)**
        return view('users.index', compact('users'));
    }

    public function profile()
    {
        return response()->json(Auth::user());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,user',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'role']));
        return response()->json($user);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(['message' => 'User deleted successfully']);
    }
}
