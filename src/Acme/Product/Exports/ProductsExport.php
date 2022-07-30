<?php

declare(strict_types=1);

namespace Acme\Product\Exports;


use Maatwebsite\Excel\Concerns\FromArray;

/**
 * @author Adi Putra <adiputrapermana@gmail.com>
 */
class ProductsExport implements FromArray
{
    public function __construct(private array $products)
    {
    }

    public function array(): array
    {
        return $this->products;
    }
}