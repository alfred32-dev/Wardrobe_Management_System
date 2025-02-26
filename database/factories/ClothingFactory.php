<?php


namespace Database\Factories;

use App\Models\Clothing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clothing>
 */
class ClothingFactory extends Factory
{
    protected $model = Clothing::class; // ✅ Ensure Laravel knows which model to use

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category' => Arr::random(['Tops', 'Bottoms', 'Shoes', 'Accessories']),
            'size' => Arr::random(['S', 'M', 'L', 'XL']),
            'color' => $this->faker->safeColorName(),
            'brand' => $this->faker->company(),
            'price' => $this->faker->randomFloat(2, 10, 200), // ✅ Use float for price
            'image_url' => 'https://via.placeholder.com/150',
            'outfit' => Arr::random(['Football', 'Church', 'Work', 'Casual']),
        ];
    }
}
