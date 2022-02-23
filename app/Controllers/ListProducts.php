<?php

namespace App\Controllers;

use App\Controllers\Traits\RenderizadorHtmlTrait;
use App\Domain\Infrastructure\Repository\PdoProductRepository;
use App\Domain\Model\Product;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListProducts implements RequestHandlerInterface{
  use RenderizadorHtmlTrait;
  private $productRepository;

  public function __construct()
  {
    return $this->productRepository = new PdoProductRepository();
  }

  public function handle(ServerRequestInterface $request): ResponseInterface
  {
    $products = $this->productRepository->allProducts();

    $title = 'Lista de produtos';

    $html = $this->renderizaHTML(
      'produtos/ListProducts.php',
      [
        'title' => $title,
        'products' => $products
      ]
    );

    return new Response(
      200,
      [],
      $html
    );
  }
}

?>