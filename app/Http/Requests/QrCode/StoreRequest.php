<?php

namespace App\Http\Requests\QrCode;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'background' => 'string|min:1|max:10|required',
            'created_by' => 'integer|required',
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
            'background' => $this->{'background-color'},
            'created_by' => auth()->user()->id,
        ]);
    }
}
