<?php

namespace App\Http\Requests;

use App\Models\Technology;
use Illuminate\Foundation\Http\FormRequest;

class EditProjectRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technology_id' => 'required|array',
            'technology_id.*' => 'exists:technologies,id',

        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il campo Title è richiesto',
            'title.max' => 'Il campo contiene un massimo di 255 caratteri',
            'description' => 'Il campo Description è richiesto',
            'technology_id' => 'Devi selezionare almeno una Tecnologia'
        ];
    }
}
