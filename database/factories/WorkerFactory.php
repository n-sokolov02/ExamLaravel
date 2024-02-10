<?php

namespace Database\Factories;

use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'office_id'=> Office::all()->random()->office_id,
            'name'=>$this->faker->name,
            'salary'=>random_int(1000, 5000),
            'email'=>$this->faker->email,
        ];
    }

}
