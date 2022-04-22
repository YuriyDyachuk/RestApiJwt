<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\DataTransObject\RegisterDTO;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(RegisterDTO $DTO): User
    {
        return $this->userRepository->create($DTO);
    }
}