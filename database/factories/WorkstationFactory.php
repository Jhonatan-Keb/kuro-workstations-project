<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workstation>
 */
class WorkstationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Kuro Build ' . $this->faker->bothify('##??'),
            'cpu' => $this->faker->randomElement(['Ryzen 5 7600X', 'Ryzen 7 7800X3D', 'Ryzen 9 7950X', 'Core i5-13600K', 'Core i9-14900K']),
            'ram' => $this->faker->randomElement([16, 32, 64, 128]),
            'gpu' => $this->faker->randomElement(['RTX 4060', 'RTX 4090', 'RX 7800 XT', 'RX 7900 XTX', 'Intel Arc A770']),
            'os' => $this->faker->randomElement(['Artix Linux', 'Fedora Workstation', 'Arch Linux', 'Debian Stable']),
            'status' => $this->faker->randomElement(['pending', 'building', 'shipped', 'cancelled']),
        ];
    }
}
