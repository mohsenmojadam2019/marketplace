<?php

namespace marketplace\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use marketplace\src\Models\user;
use marketplace\src\Http\Services\AuthService;
use marketplace\src\Http\Requests\LoginRequest;
use marketplace\src\Http\Requests\RegistrationRequest;

class AuthController extends Controller
{

    public function __construct(protected AuthService $authService)
    {
    }

    public function register(RegistrationRequest $request): JsonResponse
    {
        $token = $this->authService->register($request->validated());
        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $token
        ], Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        $token = $this->authService->login($credentials);

        if ($token) {
            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $token
            ], Response::HTTP_OK);
        }

        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function logout(): JsonResponse
    {
        $this->authService->logout();

        return response()->json(['message' => 'Successfully logged out'], Response::HTTP_OK);
    }
}

