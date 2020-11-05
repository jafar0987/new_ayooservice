<?php

namespace App\Domains\Notification\Http\Requests;

use App\Http\Requests\API\BaseRequest;

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
