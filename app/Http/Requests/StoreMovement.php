<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreMovement extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => [
                'required',
                Rule::in(['Engreso','Ingreso'])
            ],
            'movement_date' => 'required|date',
            'category_id' => 'required',
            'description' => 'required|min:3|max:1000',
            'money_decimal' => 'required|numeric|min:0.01',
            'image' => 'image'
        ];
    }
}
