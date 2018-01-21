<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTeacher extends FormRequest
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

            'class_id'        => 'bail|required',
            'Designation'     => 'max:255',
            'Address'         => 'bail|required|max:255',
            'Joining_Date'    => 'bail|required|date',
            'DOB'             => 'bail|required|date',
            'Increment_At'    => 'max:255',
            'Allowed_Holidays'=> 'bail|integer',
            'Salary'          => 'bail|required|integer',
            'Increment'       => 'bail|integer',
            'Religion'        => 'max:255',
            'First_Name'      => 'bail|required|max:255',
            'Last_Name'       => 'bail|required|max:255',
            'Guardian'        => 'bail|required|max:255',
            'username'        => 'bail|required|unique:users|max:15',
            'CNIC'            => 'max:17',
            'Mobile'          => 'bail|max:17',
            'Gender'          => 'bail|required',
//            'Image'           => 'bail|required|image'
        ];
    }
}
