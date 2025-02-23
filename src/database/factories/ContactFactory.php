<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::pluck('id')->toArray();
        return [
            'first_name' => $this->faker->firstname,
            'last_name' => $this->faker->lastname,
            'gender' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->unique()->safeEmail(),
            'tel' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'building' => $this->faker->secondaryAddress(),
            'category_id' =>
            $this->faker->randomElement($categories),
            'detail' => $this->faker->sentence(),
        ];
    }
}
