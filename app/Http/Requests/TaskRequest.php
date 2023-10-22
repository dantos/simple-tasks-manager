<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest {
	public function rules(): array {
		return [
			'name'       => [ 'required', ],
			'priority'   => [ 'required', 'numeric', ],
			'date'       => [ 'required', 'date', ],
			'project_id' => [ 'nullable', 'integer', ],
		];
	}

	public function authorize(): bool {
		return true;
	}
}
