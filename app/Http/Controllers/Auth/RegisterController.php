<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' =>'required',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' =>$request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user]);
    }
}
