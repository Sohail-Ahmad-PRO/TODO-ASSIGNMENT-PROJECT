<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

/**
 * Class TodoAuthorizeUserRequest
 * @package App\Http\Requests
 */
class TodoAuthorizeUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules() : array
    {
        return [
            'id' => 'exists:todos,id,user_id,' . Auth::id()
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'id' => 'You are not authorized to perform this operation'
        ];
    }
}
