<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaskFactory extends Factory {
	protected $model = Task::class;

	public function definition(): array {
		return [
			'name'       => $this->faker->text(30),
			'priority'   => $this->faker->randomNumber(1),
			'date'       => Carbon::now(),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];
	}
}
