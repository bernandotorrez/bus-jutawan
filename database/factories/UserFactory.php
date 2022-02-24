<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->numberBetween(10000, 19990),
            'email' => $this->faker->email,
            'name' => $this->faker->name,
            'password' => Hash::make('password'), // password
            'level' => 'Prk',
            'status' => '1',
            'remember_token' => Str::random(10),
        ];
    }
}
