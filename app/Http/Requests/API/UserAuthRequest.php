<?php

declare(strict_types=1);

namespace App\Http\Requests\API;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserAuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'string', 'min:6']
        ];
    }
}
