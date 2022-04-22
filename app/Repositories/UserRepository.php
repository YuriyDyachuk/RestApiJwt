<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DataTransObject\RegisterDTO;
use App\Models\User;

class UserRepository extends AbstractRepository
{
    public function model(): string
    {
        return User::class;
    }

    public function create(RegisterDTO $DTO): User
    {
        return $this->query()->create($DTO->toArray())->refresh();
    }
}