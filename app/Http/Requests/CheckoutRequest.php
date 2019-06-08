<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
           'email' => 'required',
           'name' => 'required',
           'address' => 'required',
           'city' => 'required',
           'province' => 'required',
           'postal-code' => 'required',
           'phone' => 'required',
        ];
    }
}
