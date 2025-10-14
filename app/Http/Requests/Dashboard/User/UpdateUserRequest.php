<?php

namespace App\Http\Requests\Dashboard\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

/**
 * @method \App\Models\User|null route(string|null $param = null, $default = null)
 */
class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($this->route('user')->id)],
            'phone'     => ['nullable', 'string', 'max:255'],
            'address'   => ['nullable', 'string'],
            'role'      => ['required', 'string', 'in:admin,staff,customer'],
        ];
    }
}
