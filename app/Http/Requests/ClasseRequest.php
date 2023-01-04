<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClasseRequest extends FormRequest
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
            'nom'=> ['required',  'max:255'],
            'type'=>'required',
            'max_capacity'=>'required'

        ];
    }

    public function messages(){
        return[
            'nom.required'=>"Le nom de la classe est obligatoire!",
            'type.required'=>"type not found!",
            'max_capacity'=>'capacity de type number'

        ];
    }
}
