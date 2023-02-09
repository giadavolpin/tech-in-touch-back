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
            'name' => 'required|max:50|min:3',
            'surname' => 'required|max:50|min:3',
            'job_address' => 'nullable',
            'bio' => 'nullable',
            'profile_image' => 'nullable|image',
            'cv_path' => 'nullable|image',
            'user_id' => 'nullable|exists:user,id',
            'technologies_id' => 'nullable',
            'phone_number' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'linkedin' => 'nullable',
            'github' => 'nullable',
            'visible' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nickname.required' => 'Devi inserire un nickname',
            'nickname.min' => 'Il nickname deve essere almeno :min caratteri',
            'nickname.max' => 'Il nickname deve essere massimo :max caratteri',
            'name.required' => 'Compila il campo',
            'name.min' => 'Il Nome deve essere almeno :min caratteri',
            'name.max' => 'Il Nome deve essere massimo :max caratteri',
            'surname.min' => 'Il Cognome deve essere almeno :min caratteri',
            'surname.max' => 'Il Cognome deve essere massimo :max caratteri',
            'job_address.min' => 'Indirizzo deve essere almeno :min caratteri',
            'job_address.max' => 'Indirizzo deve essere massimo :max caratteri',
            'phone_number.min' => 'Il numero di telefono deve essere di minimo :min numeri',
            'profile_image.image' => 'Il file deve essere una immagine',
            'linkedin.string' => 'Inserisci un URL',
            // 'cv_path.required' => 'Il campo è obbligatorio',
            'github.string' => 'Inserici un URL',
            'visible.required' => 'Selezionare un opzione'
        ];
    }
}