<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentBlogRequest extends FormRequest
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
            'contenu'=>'required',
            'g-recaptcha-response' => 'required'
        ];
    }
    public function messages(){
        return[
            'content.required'=>"Il faut écrir le contenu!",
            'g-recaptcha-response.required' => 'Il faut cocher je ne suis pas un robot'
        ];
    }
}
