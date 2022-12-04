<?php

namespace App\Http\Requests;

/**
 * Class RegisterRequest
 * @package App\Http\Requests
 */
class RegisterRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules() : array
    {
        return [
            'name'                  => 'string',
            'email'                 => 'required|unique:users|email:rfc,dns',
            'password'              => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6',
        ];
    }
}
