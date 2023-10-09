<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPracticeRequest extends FormRequest
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
            'newPractice.user_id' => 'required',
            'newPractice.song_id' => 'required',
            'newPractice.part_id' => 'required',
        ];
    }
}
