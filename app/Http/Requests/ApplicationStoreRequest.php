<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationStoreRequest extends FormRequest
{
    public function authorize(): bool { return Auth::check() && auth()->user::isFreelancer(); }

    public function rules(): array {
        return [
            'note' => ['nullable','string','max:2000'],
            'cv'   => ['required','file','mimes:pdf','max:3072'], 
        ];
    }
}
