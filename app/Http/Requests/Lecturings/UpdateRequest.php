<?php

namespace App\Http\Requests\Lecturings;

use App\Models\Lecturing;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->route('lecturing'));
    }

    public function rules()
    {
        $lecturing = $this->route('lecturing');
        $isImamRequired = in_array($lecturing->audience_code, [Lecturing::AUDIENCE_TARAWIH]);

        return [
            'date' => ['required', 'date_format:Y-m-d'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['nullable', 'date_format:H:i'],
            'time_text' => ['nullable', 'max:20'],
            'lecturer_name' => ['nullable', 'max:60'],
            'imam_name' => [$isImamRequired ? 'required' : 'nullable', 'max:60'],
            'muadzin_name' => ['nullable', 'max:60'],
            'title' => ['nullable', 'max:60'],
            'place' => ['nullable', 'max:60'],
            // 'book_writer' => ['nullable', 'max:60'],
            // 'book_link' => ['nullable', 'max:255'],
            // 'video_link' => ['nullable', 'max:255'],
            // 'audio_link' => ['nullable', 'max:255'],
            'description' => ['nullable', 'max:255'],
        ];
    }
}
