<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSchedule extends FormRequest
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
            'sch_date' => 'required|max:40',
            'sch_part' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'sch_date' => '日付',
            'sch_part' => '部位',
        ];
    }
}
