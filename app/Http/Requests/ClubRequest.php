<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubRequest extends FormRequest
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
            'nom'=>'required|max:30',
            'type'=>'required',
            'fondateur'=>'required|max:30',
            'date_creation'=>'required|date_format:Y-m-d'
        ];
    }

    public function messages(){
        return[
          'nom.required'=>"Le nom est obligatoire.",
          'nom.max'=>"Le nom a 30 caractères au maximum.",
          'fondateur.required'=>"Le fondateur est obligatoire.",
          'fondateur.max'=>"Le fondateur a 30 caractères au maximum.",
          'type.required'=>"Le type est obligatoire.",
          'date_creation.required'=>"La date de creation est obligatoire.",
          'date_creation.date_format'=>"La date de création ne correspond pas au format Y-m-d."
        ];
    }
}
