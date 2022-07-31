<?php

declare(strict_types=1);

namespace Acme\Product\Model;


use Pandawa\Component\Ddd\AbstractModel;

/**
 * @property string $id
 * @property string $title
 * @property int $price
 *
 * @author Adi Putra <adiputrapermana@gmail.com>
 */
class Product extends AbstractModel
{
    protected $casts = [
        'id' => 'string',
        'title' => 'string',
        'price' => 'integer'
    ];
}