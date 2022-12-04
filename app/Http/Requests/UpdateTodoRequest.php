<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

/**
 * Class UpdateTodoRequest
 * @package App\Http\Requests
 */
class UpdateTodoRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules() : array
    {
        return [
            'id'          => 'exists:todos,id,user_id,' . Auth::id(),
            'title'       => 'required|string',
            'description' => 'required|string',
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
