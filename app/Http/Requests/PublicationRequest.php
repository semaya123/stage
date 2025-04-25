<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titre'=>'required|min:5',
            'body'=>'required|min:5|max:15',
            'image'=>'image|mimes:png,jpg,jpeg,svg',
        ];
    }
  /*  public function messages(){
        return [
            'titre.required'=> "hiiiiii",
        ];
    }*/
}
