<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudent extends FormRequest
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

//            'Registration_ID' => 'bail|required|unique:students|max:255',
            'class_id'        => 'bail|required',
            'Religion'        => 'max:255',
            'Address'         => 'bail|required|max:255',
            'Admission_Date'  => 'bail|required|date',
            'First_Name'      => 'bail|required|max:255',
            'Last_Name'       => 'bail|required|max:255',
            'Guardian'        => 'bail|required|max:255',
            'username'        => 'bail|required|unique:users|max:15',
            'CNIC'            => 'max:17',
            'Mobile'          => 'bail|max:17',
            'Gender'          => 'bail|required',
            'Medium'          => 'bail|required',
            'Roll_No'         => 'bail|required|max:255',
//            'Image'           => 'bail|required|image'
        ];
    }

    public function messages()
    {
        return [
            'Mobile'   => 'This Mobile number is already register',
            'class_id' => 'Please select a class'
        ];
    }
}
