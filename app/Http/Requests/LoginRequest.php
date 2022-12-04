<?php

namespace App\Http\Requests;

/**
 * Class LoginRequest
 * @package App\Http\Requests
 */
class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules() : array
    {
        return [
            'email'    => 'required|email:rfc,dns',
            'password' => 'required'
        ];
    }
}
