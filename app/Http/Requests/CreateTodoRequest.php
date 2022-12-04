<?php

namespace App\Http\Requests;

/**
 * Class CreateTodoRequest
 * @package App\Http\Requests
 */
class CreateTodoRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules() : array
    {
        return [
            'title'       => 'required|string',
            'description' => 'required|string',
        ];
    }
}
