<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrierenRequest extends FormRequest
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
			'benutzername' => ['required'],
			'email' => ['required', 'email:rfc,dns'],
			'passwort' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).+$/'],
		];
	}

	public function messages()
	{
		return [
			'passwort.regex' => __('validation.regex.passwort'),
			'passwort.min' => __('validation.min.passwort'),
		];
	}
}
