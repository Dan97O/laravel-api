<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', Rule::unique('projects', 'title')->ignore($this->project), 'max:150'],
            'cover_image' => ['nullable'],
            'content' => ['nullable'],
            'site_link' => ['nullable', 'max:255'],
            'source_code' => ['nullable', 'max:255'],
            'date_time' => ['date'],
            'type_id' => ['exists:types,id'],
            'technologies' => ['exists:technologies,id'],

        ];
    }
}
