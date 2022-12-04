<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function login(LoginRequest $request): Response|Application|ResponseFactory
    {
        if (!Auth::attempt($request->validated())) {
            return response(['message' => 'Invalid email or password.']);
        }

        return response(['user' => Auth::user(), 'access_token' => Auth::user()->createToken('authToken')->accessToken]);
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->validated());
        $user->sendEmailVerificationNotification();
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return response()->json(['message' => 'An email verification link has been sent on your email. Please verify by using verification API']);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        if (Auth::check()) {
            Auth::user()->token()->revoke();
        }

        return response()->json(['message' => 'You are successfully logged out.']);
    }
}
