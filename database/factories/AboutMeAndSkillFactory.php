<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutMeAndSkill>
 */
class AboutMeAndSkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fontAwesomeIcons = [
            'fa-user', 'fa-code', 'fa-laptop', 'fa-database', 'fa-mobile-alt', 'fa-cloud', 'fa-cogs', 'fa-paint-brush'
        ];

        return [
            'icon' => $this->faker->randomElement($fontAwesomeIcons),
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
        ];
    }
}
