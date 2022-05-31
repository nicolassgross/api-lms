<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'cd_curso' => ['exists:categories,id|nullable'],
            'ds_nome' => ['required', 'max:255'],
            'me_ementa' => ['required', 'max:255'],
            'me_resumo' => ['required', 'max:255'],
            'imagem' => ['required'],
        ];
    }
}