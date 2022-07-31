<?php

declare(strict_types=1);

namespace Acme\Product\Repository;


use Pandawa\Component\Ddd\Collection;
use Pandawa\Component\Ddd\Repository\Repository;

/**
 * @author Adi Putra <adiputrapermana@gmail.com>
 */
class ProductRepository extends Repository
{
    public function findAllExport(?int $priceGte = null): Collection
    {
        $qb = $this->createQueryBuilder();

        $qb->select('products.*');

        if ($priceGte) {
            $qb->where('products.price', '>=', $priceGte);
        }

        return $this->execute($qb);
    }
}