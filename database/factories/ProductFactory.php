<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $products = [
            ['name' => 'Yam Tubers', 'image' => 'yam.jpg', 'description' => 'Freshly harvested yam tubers from local farms.'],
            ['name' => 'Maize', 'image' => 'maize.jpg', 'description' => 'Dried yellow maize ideal for pap and feed production.'],
            ['name' => 'Plantain', 'image' => 'plantain.jpg', 'description' => 'Ripe and unripe plantains for cooking and frying.'],
            ['name' => 'Tomato', 'image' => 'tomato.jpg', 'description' => 'Fresh red tomatoes perfect for stew and sauce.'],
            ['name' => 'Pepper', 'image' => 'pepper.jpg', 'description' => 'Hot chili pepper for all your spicy dishes.'],
            ['name' => 'Carrot', 'image' => 'carrot.jpg', 'description' => 'Organic carrots rich in vitamins and freshness.'],
            ['name' => 'Cucumber', 'image' => 'cucumber.jpg', 'description' => 'Crunchy cucumbers suitable for salad and juice.'],
            ['name' => 'Onion', 'image' => 'onion.jpg', 'description' => 'Fresh onions for seasoning and daily cooking.'],
            ['name' => 'Rice', 'image' => 'rice.jpg', 'description' => 'Clean, stone-free local rice for healthy meals.'],
            ['name' => 'Beans', 'image' => 'beans.jpg', 'description' => 'High-protein brown beans great for porridge and moi moi.'],
        ];

        $product = $this->faker->randomElement($products);

        return [
            'name' => $product['name'],
            'slug' => Str::slug($product['name'] . '-' . Str::random(5)),
            'description' => $product['description'],
            'price' => $this->faker->randomFloat(2, 500, 5000),
            'quantity' => $this->faker->numberBetween(5, 100),
            'unit' => 'kg',
            'city' => $this->faker->randomElement(['Lagos', 'Abuja', 'Port Harcourt', 'Enugu']),
            'image' => $product['image'],
            'stock' => $this->faker->numberBetween(10, 200),
            'published' => true,
        ];
    }
}
