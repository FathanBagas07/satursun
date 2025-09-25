<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;

class JobStoreRequest extends FormRequest
{
    public function authorize(): bool 
    { 
        return Auth::check() && Auth::user()->isPoster(); 
    }

    public function rules(): array {
        return [
            'title'       => ['required','string','max:200'],
            'description' => ['required','string'],
            'deadline'    => ['nullable','date','after:today'],
            'location'    => ['required','string','max:200'],
        ];
    }
}
