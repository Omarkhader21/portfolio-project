<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GeneralDeveloperInformation>
 */
class GeneralDeveloperInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'years_of_experience' => $this->faker->numberBetween(3, 10),
            'projects' => $this->faker->numberBetween(3, 10),
            'cv' => $this->faker->filePath(),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'what_i_know' => $this->faker->sentence,
            'email' => $this->faker->unique()->safeEmail,
            'projects_description' => $this->faker->paragraph,
        ];
    }
}
