<?php

declare(strict_types=1);

namespace Acme\Product\Repository;


use Acme\Product\Contract\FindAllProductsExport;
use Pandawa\Component\Ddd\Collection;
use Pandawa\Component\Ddd\Repository\Repository;

/**
 * @author Adi Putra <adiputrapermana@gmail.com>
 */
class ProductRepository extends Repository
{
    public function findAllExport(FindAllProductsExport $contract): Collection
    {
        $qb = $this->createQueryBuilder();

        $qb->select('products.*');

        if ($priceGte = $contract->getPriceGte()) {
            $qb->where('products.price', '>=', $priceGte);
        }

        return $this->execute($qb);
    }
}