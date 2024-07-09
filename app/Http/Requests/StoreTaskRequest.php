<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,done',
            'deadline' => 'required|date|after_or_equal:today',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',
            'title.max' => 'Title must not exceed 255 characters',
            'description.string' => 'Description must be a string',
            'status.required' => 'Status is required',
            'status.in' => 'Status must be one of the following: todo, in_progress, done',
            'deadline.required' => 'Deadline is required',
            'deadline.date' => 'Deadline must be a valid date',
            'deadline.after_or_equal' => 'Deadline must be today or a future date',
        ];
    }
}
