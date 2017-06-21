<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
        $method = $this->method();

        switch ($method) {
            case 'POST': {
                return [
                    'name' => 'required|unique:properties,name',
                    'label' => 'required',
                ];
            }
            case 'PUT': {
                return [
                    'name' => 'required',
                    'label' => 'required',
                ];
            }
        }
    }
}
