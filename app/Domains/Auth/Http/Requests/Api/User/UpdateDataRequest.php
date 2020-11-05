<?php

namespace App\Http\Requests\API\USER;

use App\Http\Requests\API\BaseRequest;

class UpdateDataRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'array',
        ];
    }
}
