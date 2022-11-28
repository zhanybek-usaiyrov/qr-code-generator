<?php

namespace App\Http\Requests\Api\QrCode;

use Illuminate\Foundation\Http\FormRequest;

class GenerateRequest extends FormRequest
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
            'content' => 'string|min:1|max:255|required',
            'size' => 'integer|min:10|max:1000|required',
            'fill_color' => 'string|min:10|max:25|required',
            'background_color' => 'string|min:10|max:25|required',
        ];
    }
}
