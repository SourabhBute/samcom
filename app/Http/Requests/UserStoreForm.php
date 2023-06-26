<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreForm extends FormRequest
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

            "name" => "required|string|max:70",
            "email"=> "required|email|unique:users,email|max:100",
            "role" => "required|string|in:supplier,reseller",
            "profile_image" => "mimes:jpeg,jpg,png|image|required|max:4096",
            "contact_no" => "required|numeric|digits:10",
            "address" => "required|string"
        ];
    }

    public function messages()
    {
        return [
            "contact_no.required" => "The contact number field is required.",
            "contact_no.numeric" => "The contact number must be a number.",
            "contact_no.digits" => "The contact number must be 10 digits."
        ];
    }
}
