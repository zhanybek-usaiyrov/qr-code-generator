<?php

namespace App\Http\Requests\QrCode;

use Illuminate\Foundation\Http\FormRequest;

class PreviewRequest extends FormRequest
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
            'string' => 'string|min:1|max:255|required',
            'size' => 'integer|min:10|max:1000|required',
            'color' => 'string|min:1|max:10|required',
            'background-color' => 'string|min:1|max:10|required',
            'color-rgb' => 'array',
            'background-color-rgb' => 'array',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'color-rgb' => [
                hexdec(substr($this->color, 1, 2)),
                hexdec(substr($this->color, 3, 2)),
                hexdec(substr($this->color, 5, 2)),
            ],
            'background-color-rgb' => [
                hexdec(substr($this->{'background-color'}, 1, 2)),
                hexdec(substr($this->{'background-color'}, 3, 2)),
                hexdec(substr($this->{'background-color'}, 5, 2)),
            ],
        ]);
    }
}
