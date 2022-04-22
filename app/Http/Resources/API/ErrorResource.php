<?php

declare(strict_types=1);

namespace App\Http\Resources\API;

use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    /**
     * @param $request
     * @param $response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode($this->resource['code']
            ?? Response::HTTP_BAD_REQUEST,
            $this->resource['error']
            ?? 'Bad request');
    }

    public function toArray($request): array
    {
        $errors['data'] = '';
        $errors['ok'] = false;
        $errors['message'] = $this->resource['error'] ?? 'Bad request';

        return $errors;
    }
}
