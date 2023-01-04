<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtablissementRequest extends FormRequest
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
            'name'=>'required|min:8',
            'adress'=>'required|min:10',
            'nmbrmax'=>'required',
            'email'=>'required|email',
            'tel'=>'required|max:8|min:8'
        ];
    }

    public function messages(){
        return[
            'name.required'=>"Le nom est obligatoire!",
            'name.min'=>"Le nom plus de 10 caracteres",
            'adress.required'=>"L'adresse est obligatoire!",
            'adress.min'=>"L'adresse plus de 10 caracteres",
            'email.required'=>"L'email est obligatoire!",
            'email.email'=>"Le format de l'email n'est pas correcte",
            'tel.required'=>"La téléphone est obligatoire!",
            'tel.max'=>"Le téléphone doit etre composé de 8 caractéres",
            'tel.min'=>"Le téléphone doit etre composé de 8 caractéres"
        ];
    }
}
