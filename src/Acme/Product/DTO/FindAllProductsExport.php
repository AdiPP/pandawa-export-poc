<?php

declare(strict_types=1);

namespace Acme\Product\DTO;


use Acme\Product\Contract\FindAllProductsExport as FindAllProductsExportContract;

/**
 * @author Adi Putra <adiputrapermana@gmail.com>
 */
class FindAllProductsExport implements FindAllProductsExportContract
{
    public function __construct(
        private ?int $priceGte
    )
    {
    }

    public function getPriceGte(): ?int
    {
        return $this->priceGte;
    }
}