<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'desire.schedule_id' => 'required',
            'desire.start_time' => 'required',
            'desire.end_time' => 'required',
            'desire.remarks' => 'max:200'
        ];
    }
}
