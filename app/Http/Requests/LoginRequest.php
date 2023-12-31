<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
			'passwort' => ['required'],
		];
	}

	public function messages()
	{
		return [
			'benutzername.required' => __('validation.required.benutzername'),
			'passwort.required' => __('validation.required.passwort'),
		];
	}
}
