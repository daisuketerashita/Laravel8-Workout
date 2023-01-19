<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExercise extends FormRequest
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
            'name' => 'required|max:80',
            'weight' => 'required|numeric',
            'repetition' => 'required|numeric',
            'set_num' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '種目名',
            'weight' => '重さ',
            'repetition' => 'レップ数',
            'set_num' => 'セット数',
        ];
    }
}
