<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class RegisterUser extends FormRequest
{
    private $minimumDate = "";
    private $maximumDate = "";
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
        if($this->get('gender') == 'Male')
        {
            $this->minimumDate = Carbon::now()->subYears(35)->format('Y-m-d');
            $this->maximumDate = Carbon::now()->subYears(50)->format('Y-m-d');
        } else
        {
            $this->minimumDate = Carbon::now()->subYears(28)->format('Y-m-d');
            $this->maximumDate = Carbon::now()->subYears(40)->format('Y-m-d');
        }

        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'dob' => 'required|before:'.$this->minimumDate.'|after:'.$this->maximumDate,
            'password' => 'required|confirmed|min:6'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'dob.before' => 'Your age must be in between '.Carbon::parse($this->minimumDate)->age.' to'.Carbon::parse($this->maximumDate)->age.' years',
            'dob.after' => 'Your age must be in between '.Carbon::parse($this->minimumDate)->age.' to'.Carbon::parse($this->maximumDate)->age.'  years'

        ];
    }
}
