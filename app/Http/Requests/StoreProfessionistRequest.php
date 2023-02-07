<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfessionistRequest extends FormRequest
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
            'nickname' => 'required|unique:professionists|max:15|min:3',
            'name' => 'required|max:15|min:3',
            'surname' => 'required|max:15|min:3',
            'job_address' => 'nullable',
            'bio' => 'nullable',
            'profile_image' => 'nullable|image',
            'cv_path' => 'nullable|image',
            'user_id' => 'nullable|exists:user,id',
            'technologies_id' => 'nullable',
            'phone_number' => 'nullable',
            'linkedin' => 'nullable',
            'github' => 'nullable',

        ];
    }
}
