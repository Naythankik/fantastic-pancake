<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UserService
{
    /**
     * @return View
     */
    public function login(): View
    {
        return view('login');
    }

    public function register(): View
    {
        return view('register');
    }

    /**
     * @param $credentials
     * @return RedirectResponse|View
     */
    public function signin($credentials): RedirectResponse
    {
        if(!Auth::attempt($credentials)){
            return redirect()->route('login');
        }
        return redirect()->route('dashboard');
    }

    public function signup($credentials): View
    {
        $user = User::create($credentials);

        if($user){
            return view('login', ['user' => 'User has been created successfully']);
        }
    }

    public function apiLogin($credentials): JsonResponse
    {
        $user = User::where('email', $credentials['email'])->first();

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => "Invalid email or password."], 422);
        }

        $token = Str::random(60);

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
}