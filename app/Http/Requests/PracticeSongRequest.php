<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PracticeSongRequest extends FormRequest
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
            'progress.song_id' => 'required',
            'progress.part_id' => 'required',
            'newSong.name' => 'required|string|max:30',
            'newPart.id' => 'required',
            'newPractice.user_id' => 'required',
            'newPractice.song_id' => 'required',
            'newPractice.part_id' => 'required',
        ];
    }
}
