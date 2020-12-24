<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $userIds = User::all()->pluck('id')->toArray();
        
        return [
            'name' => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
            'description' => $this->faker->text($maxNbChars = 200),
            'avaible' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'user_id' =>$this->faker->randomElement($userIds)
        ];
        
    }
}
