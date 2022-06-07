<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'blocked'=>random_int(0,1) > 0.5,
            'lastname'=>$this->faker->lastName(),
            'phone'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->email(),
            'registration_date'=>date(DATE_RFC822),
        ];
    }
}
