<?php

namespace TomatoPHP\TomatoDusk\Http\Requests\TestLog;

use Illuminate\Foundation\Http\FormRequest;

class TestLogUpdateRequest extends FormRequest
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
            'model_type' => 'nullable|max:255|string',
            'model_id' => 'nullable|max:255|string',
            'log' => 'sometimes',
            'type' => 'nullable|max:255|string'
        ];
    }
}
