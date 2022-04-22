<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\UserService;
use App\Factories\UserFactory;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\UserResource;
use App\Http\Resources\API\ErrorResource;
use App\Http\Requests\API\UserAuthRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\API\UserLoginRequest;
use App\Http\Resources\API\AuthJWTResource;

class AuthJWTController extends Controller
{
    protected UserService $userService;
    protected UserFactory $userFactory;

    public function __construct(
        UserService $userService,
        UserFactory $userFactory
    ){
        $this->userService = $userService;
        $this->userFactory = $userFactory;
    }

    public function register(UserAuthRequest $request): JsonResponse
    {
        $userDTO = $this->userFactory->create($request);
        $user = $this->userService->create($userDTO);

        return UserResource::make($user)->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function login(UserLoginRequest $request)
    {
        #========================== [Create token] ==========================#
        try {
            if (!$token = JWTAuth::attempt($request->only('email', 'password'))) {
                return ErrorResource::make([
                    'error' => 'Login credentials are invalid.',
                    'code'  => Response::HTTP_BAD_REQUEST
                ]);
            }
        } catch (JWTException $e) {
            return ErrorResource::make([
                'error' => 'Could not create token.',
                'code'  => Response::HTTP_FORBIDDEN
            ]);
        }

        return (new AuthJWTResource($token))->response()->setStatusCode(Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        #========================== [Request is validated, do logout ] ==========================#
        try {
            JWTAuth::invalidate($request->input('token'));

            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return ErrorResource::make([
                'error' => 'Sorry, user cannot be logged out!',
                'code'  => Response::HTTP_BAD_REQUEST
            ]);
        }
    }
}
