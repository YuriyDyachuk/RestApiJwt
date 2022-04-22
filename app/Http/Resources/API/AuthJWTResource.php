<?php

declare(strict_types=1);

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthJWTResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'status' => true,
            'token' => $this->resource
        ];
    }
}
