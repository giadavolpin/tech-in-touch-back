<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
            'name' => ['required', 'min:3' ,'max:50', Rule::unique('projects')->where('professionist_id', Auth::user()->professionists->id)->ignore($this->project)],
            'description' => 'required',
            //togliere obbligatoria descrizione
            'slug' => 'unique',
            'cover_image' => 'nullable',
            'professionist_id' => 'exists:professionist,id',
            // 'state' => 'exists:states,abbreviation'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio.',
            'name.min' => 'Il nome deve avere almeno :min caratteri.',
            'name.max' => 'Il nome non può superare i :max caratteri.',
            'description.required' => 'La descrizione è obbligatoria.',
            'slug.unique' => 'Hai già creato un progetto con questo nome'


        ];
    }
}
