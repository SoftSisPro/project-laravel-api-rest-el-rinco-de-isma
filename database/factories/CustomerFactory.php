<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['I', 'B']); # Individual or Business
        $name = $type =="I" ? $this->faker->name() : $this->faker->company(); # If type is I, then name is a person name, otherwise is a company name

        return [
            "name"=>$name,
            "type"=>$type,
            "email"=>$this->faker->unique()->safeEmail(),
            "phone"=>$this->faker->phoneNumber(),
            "address"=>$this->faker->address(),
            "city"=>$this->faker->city(),
            "state"=>$this->faker->state(),
            "postal_code"=>$this->faker->postcode(),
        ];
    }
}
