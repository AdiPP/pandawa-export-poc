<?php

namespace Database\Factories;

use Acme\Product\Model\Product;
use Acme\Product\Repository\ProductRepository;
use App\Factory\AbstractFactory;
use Illuminate\Support\Str;
use Pandawa\Component\Ddd\Repository\Repository;

class ProductFactory extends AbstractFactory
{
    protected string $model = Product::class;

    public function makeOne(): Product
    {
        $definition = $this->definition();

        $product = new Product($definition);

        return $this->repo()->save($product);
    }

    public function definition(): array
    {
        return [
            'id' => Str::uuid()->toString(),
            'title' => fake()->name(),
            'price' => fake()->randomNumber()
        ];
    }

    protected function repo(): Repository
    {
        return app(ProductRepository::class);
    }
}
