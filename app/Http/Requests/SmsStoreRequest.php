<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'applicationId' => 'required',
            'sourceAddress' => 'required',
            'message' => 'required',
            'requestId' => 'required',
        ];
    }
}
