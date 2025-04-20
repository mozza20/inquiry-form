<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Contact::class;
      
    public function definition()
    {
        return [
            'last_name'=>$this->faker->lastName(),
            'first_name'=>$this->faker->firstName(),
            'gender'=>$this->faker->randomElement(['男性','女性']),
            'email'=>$this->faker->safeEmail(),
            'no1'=>$this->faker->numberBetween(2,5),
            'no2'=>$this->faker->numberBetween(2,5),
            'no3'=>$this->faker->numberBetween(2,5),
            'address'=>$this->faker->prefecture.$this->faker->city.$this->faker->streetAddress,
            'building'=>$this->faker->secondaryAddress(),
            'category_id'=>$this->faker->numberBetween(1,5),
            'detail'=>$this->faker->realText(),
            'created_at'=>$this->faker->dateTimeBetween('-1 year','now'),
        ];
    }
}
