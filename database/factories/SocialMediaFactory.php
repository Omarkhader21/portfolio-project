<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocialMedia>
 */
class SocialMediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected static $usedIcons = [];

    public function definition(): array
    {
        $fontAwesomeIcons = [
            '<i class="fa-brands fa-facebook"></i>',
            '<i class="fa-brands fa-x-twitter"></i>',
            '<i class="fa-brands fa-github"></i>',
            '<i class="fa-brands fa-linkedin"></i>',
            '<i class="fa-brands fa-instagram"></i>',
            '<i class="fa-brands fa-youtube"></i>',
            '<i class="fa-brands fa-pinterest"></i>',
            '<i class="fa-brands fa-tiktok"></i>'
        ];

        $availableIcons = array_diff($fontAwesomeIcons, static::$usedIcons);
        $icon = $this->faker->randomElement($availableIcons);
        static::$usedIcons[] = $icon;

        return [
            'icon' => $this->faker->randomElement($fontAwesomeIcons),
            'url' => $this->faker->url,
        ];
    }
}
