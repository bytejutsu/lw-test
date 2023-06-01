<?php

namespace Database\Factories;

use App\Models\EBook;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EBook>
 */
class EBookFactory extends Factory
{
    protected $model = EBook::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'author' => $this->faker->name(),
        ];
    }
}
