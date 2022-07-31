<?php

declare(strict_types=1);

namespace Acme\Product\Exports;


use Acme\Product\Model\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

/**
 * @author Adi Putra <adiputrapermana@gmail.com>
 */
class ProductsExport implements FromCollection, WithMapping, WithHeadings
{
    public function __construct(private Collection $products)
    {
    }

    public function collection(): Collection
    {
        return $this->products;
    }

    /**
     * @param Product $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->title,
            $row->price,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'title',
            'price',
        ];
    }
}