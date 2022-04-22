<?php

declare(strict_types=1);

namespace App\Factories;

use App\DataTransObject\RegisterDTO;
use App\Http\Requests\API\UserAuthRequest;

class UserFactory
{
    public function create(UserAuthRequest $request): RegisterDTO
    {
        return new RegisterDTO([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
    }
}