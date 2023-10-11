<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name(),
            'company' => $this->faker->company(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'birth_date' => $this->faker->date(),
            'photo_url' => UploadedFile::fake()->image('profile.jpg'),
        ];
    }
}
