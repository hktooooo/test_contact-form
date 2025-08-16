<?php

namespace Database\Factories;

use App\Models\Contact;
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
        // 詳細
        $detail = "届いた商品が注文した商品ではありませんでした。商品の交換をお願いします。";
        
        return [
            //
            'category_id' => $this->faker->numberBetween(1,5),
            'first_name' => $this->faker->firstname,
            'last_name' => $this->faker->lastname,
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->unique()->safeEmail,
            'tel' => $this->faker->numerify($this->faker->randomElement(['070', '080', '090']) . '########'),
            'address' => "{$this->faker->prefecture} {$this->faker->city} {$this->faker->streetName}",
            'building' => $this->faker->secondaryAddress,
            'detail' => "{$detail}"
        ];
    }
}
