<?php

namespace App\Domains\Auth\Http\Requests\Api\User;

use App\Http\Requests\Api\BaseRequest;

class FcmRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body'  => 'required',
        ];
    }
}
