<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function dashboard(): View
    {
        return view('welcome');
    }

    public function login(){
        return $this->userService->login();
    }

    public function register(){
        return $this->userService->register();
    }

    public function signup(RegisterRequest $request){
        return $this->userService->signup($request->validated());
    }

    public function signin(LoginRequest $request){
        return $this->userService->signin($request->validated());
    }

    public function apiLogin(LoginRequest $request): JsonResponse
    {
        return $this->userService->apiLogin($request->validated());
    }
}
