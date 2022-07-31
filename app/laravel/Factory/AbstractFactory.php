<?php

declare(strict_types=1);

namespace App\Factory;


use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Support\Collection;
use Pandawa\Component\Ddd\AbstractModel;
use Pandawa\Component\Ddd\Repository\Repository;

/**
 * @author Adi Putra <adiputrapermana@gmail.com>
 */
abstract class AbstractFactory
{
    protected string $class;
    protected Generator $faker;

    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    public static function new(): static
    {
        return new static();
    }

    public function makeOne(): AbstractModel
    {
        $class = $this->class;
        $object = new $class;

        foreach ($this->definition() as $key => $value) {
            if (method_exists($object, $method = 'set'.ucfirst($key))) {
                $object->{$method}($value);
            }
        }

        return $object;
    }

    public function make(int $total = 1): Collection
    {
        $objects = new Collection();

        for ($i = 0; $i < $total; $i++) {
            $objects->add($this->makeOne());
        }

        return $objects;
    }

    protected function withFaker()
    {
        return $this->container()->make(Generator::class);
    }

    protected function container(): Container
    {
        return Container::getInstance();
    }

    abstract protected function definition(): array;

    abstract protected function repo(): Repository;
}