<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('', '');
        return [
            'title' => $this->faker->name(),
            'start_date'=> $start,
            'end_date'=> $this->faker->dateTimeBetween($start,''),
            'description'=> $this->faker->text(),
            'category_id' => Category::factory(),
            'graphics' => $this->faker->filePath(),
            'created_by' => User::factory()
        ];
    }
}
