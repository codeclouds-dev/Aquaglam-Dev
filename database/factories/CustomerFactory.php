<?php

namespace Database\Factories;

use App\Models\Customers;
use Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Customers::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,                
            'address' => $this->faker->address,   
            'city' => $this->faker->city,  
            'country' => $this->faker->country, 
            'state' => $this->faker->state, 
            'zip' => $this->faker->zip, 
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // Generates a unique SKU
            
        ];
    }
}
