<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class VerificationController
 */
class VerificationController extends Controller
{
    public function verify($user_id, Request $request):JsonResponse
    {
        if (!$request->hasValidSignature()) {
            return response()->json(['message' => 'Invalid/Expired url provided.'], 401);
        }

        $user = User::findOrFail($user_id);
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return response()->json(['message' => 'Email has been verified.', 'access_token' => $user->createToken('authToken')->accessToken]);
    }

    public function resend(): JsonResponse
    {
        if (auth()->user()->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.'], 400);
        }
        auth()->user()->sendEmailVerificationNotification();

        return response()->json(['message' => 'Email verification link sent on your email id']);
    }
}
