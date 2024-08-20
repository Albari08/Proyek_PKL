<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\models\User;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = faker::create();

        return [
            'role_id' => mt_rand(2, 5),
            'fname' => $faker->name($gender = 'male'|'female'),
            'key' => $faker->numberBetween(3000001, 3999999),
            'password' => Hash::make('secret'), // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    // public function unverified()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'email_verified_at' => null,
    //         ];
    //     });
    // }
}
