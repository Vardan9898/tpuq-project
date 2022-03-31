<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePropertyRequest extends FormRequest
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
            'name'            => ['required', 'string', 'max:255'],
            'image'           => ['image', 'max:10240'],
            'address'         => ['required', 'string', 'max:255'],
            'description'     => ['required', 'string', 'max:1000'],
            'mortgage_status' => ['boolean'],
            'price'           => ['required', 'numeric', 'max:999000000']
        ];
    }
}
