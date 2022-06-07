<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>Str::random(10),
            'city'=>$this->faker->city(),
            'street'=>$this->faker->streetAddress(),
            'building'=>random_int(1, 150),
            'floor'=>random_int(1,15),
            'flat'=>random_int(1,5),
            'intercom'=>'V'.random_int(0,9).random_int(0,9).random_int(0,9).random_int(0,9),
            'addition_date'=>date(DATE_RFC822),
        ];
    }
}
