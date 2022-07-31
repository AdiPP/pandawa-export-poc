<?php

declare(strict_types=1);

namespace Acme\Api\Presenter;


use Acme\Product\Exports\ProductsExport;
use Acme\Product\Repository\ProductRepository;
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
    public function __construct(
        private ProductRepository $productRepository,
    )
    {
    }

    public static function name(): string
    {
        return "acme::product.export";
    }

    public function render(Request $request): BinaryFileResponse
    {
        $priceGte = $request['price_gte'];
        $products = $this->productRepository->findAllExport(
            null !== $priceGte ? (int) $priceGte : null
        );

        return Excel::download(
            new ProductsExport($products),
            'products.csv',
            Format::CSV,
            [
                'Content-Type' => 'text/csv',
            ]
        );
    }
}