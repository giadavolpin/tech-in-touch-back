<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfessionistRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nickname' => 'nullable' | 'min:3' | 'max:15' | Rule::unique('professionists')->ignore($this->professionist),
            'name' => ['required', 'string', 'min:3', 'max: 50'],
            'surname' => ['required', 'string', 'min:3', 'max: 50'],
            'job_address' => ['nullable', 'string', 'min:3', 'max: 50'],
            'phone_number' => ['nullable', 'max: 15', Rule::unique('professionists')->ignore($this->professionist)],
            'bio' => ['nullable'],
            'profile_image' => ['nullable', 'image'],
            'cv_path' => ['required', 'string'],
            'linkedin' => ['nullable'],
            'github' => ['nullable']
        ];
    }
}