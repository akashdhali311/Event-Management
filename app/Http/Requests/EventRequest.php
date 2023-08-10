<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules= [
            'name'=>[
                'required',
                

            ],
            'event_type_id'=>[
                'required',
                Rule::exists('event_types', 'id')
            ],
            'description' => 'required',
            'location' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'published_at'=> 'required',
        ];
        return $rules;
    }
}
