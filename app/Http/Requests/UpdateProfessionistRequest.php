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
            'nickname' => [
                'nullable',
                'string',
                'min:3',
                'max:15', Rule::unique('professionists')->ignore($this->professionist)
            ],
            'name' => ['required', 'string', 'min:3', 'max: 50'],
            'surname' => ['required', 'string', 'min:3', 'max: 50'],
            'job_address' => ['nullable', 'string', 'min:3', 'max: 50'],
            'phone_number' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', Rule::unique('professionists')->ignore($this->professionist)],

            'bio' => ['nullable'],
            'profile_image' => ['nullable', 'image'],
            'cv_path' => ['nullable'],
            'linkedin' => ['nullable', 'string'],
            'github' => ['nullable', 'string'],
            'visible' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'nickname.min' => 'Il nickname deve essere almeno :min caratteri',
            'nickname.max' => 'Il nickname deve essere massimo :max caratteri',
            'name.required' => 'Compila il campo',
            'name.min' => 'Il Nome deve essere almeno :min caratteri',
            'name.max' => 'Il Nome deve essere massimo :max caratteri',
            'surname.min' => 'Il Cognome deve essere almeno :min caratteri',
            'surname.max' => 'Il Cognome deve essere massimo :max caratteri',
            'job_address.min' => 'Indirizzo deve essere almeno :min caratteri',
            'job_address.max' => 'Indirizzo deve essere massimo :max caratteri',
            'phone_number.max' => 'Il numero di telefono deve essere massimo :max numeri',
            'phone_number.regex' => 'Il formato del numero di telefono non è corretto',
            'profile_image.image' => 'Il file deve essere una immagine',
            'cv_path.required' => 'Il campo è obbligatorio',
            'linkedin.string' => 'Inserisci un URL',
            'github.string' => 'Inserici un URL',
            'visible.required' => 'Selezionare un opzione'
        ];
    }
}
