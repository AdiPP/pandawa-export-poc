<?php

declare(strict_types=1);

namespace Acme\Api\Presenter;


use Acme\Product\Exports\ProductsExport;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as Format;
use Maatwebsite\Excel\Facades\Excel;
use Pandawa\Component\Presenter\NameablePresenterInterface;
use Pandawa\Component\Presenter\PresenterInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * @author Adi Putra <adiputrapermana@gmail.com>
 */
class ExportProductPresenter implements PresenterInterface, NameablePresenterInterface
{
    public static function name(): string
    {
        return "acme::product.export";
    }

    public function render(Request $request): BinaryFileResponse
    {
        return  Excel::download(
            new ProductsExport([
                [
                    'id' => 1,
                    'title' => 'Product 1',
                    'price' => 10000
                ],
                [
                    'id' => 2,
                    'title' => 'Product 2',
                    'price' => 15000
                ],
            ]),
            'products.csv',
            Format::CSV,
            [
                'Content-Type' => 'text/csv',
            ]
        );
    }
}