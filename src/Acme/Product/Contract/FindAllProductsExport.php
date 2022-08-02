<?php

declare(strict_types=1);

namespace Acme\Product\Contract;


/**
 * @author Adi Putra <adiputrapermana@gmail.com>
 */
interface FindAllProductsExport
{
    public function getPriceGte(): ?int;
}