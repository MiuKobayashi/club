<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSongRequest extends FormRequest
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
            'newSong.name' => 'required|string|max:30',
            'newSong.url' => 'string',
            'newPart.id' => 'required'
            ];
    }
}
