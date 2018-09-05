<?php

namespace App\Http\Requests\Secret;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class Store extends FormRequest
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
            'label' => 'nullable',
            'notes' => 'nullable',
            'type' => [
                'required',
                 Rule::in(['credential', 'secret']),
            ],
            'username' => 'nullable',
            'data' => 'nullable',
            'url' => 'nullable|max:2083',
        ];
    }
}
