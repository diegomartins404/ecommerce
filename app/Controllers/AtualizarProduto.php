<?php

namespace App\Controllers;

use App\Controllers\Traits\RenderizadorHtmlTrait;
use App\Domain\Infrastructure\Repository\PdoProductRepository;
use App\Domain\Model\Product;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AtualizarProduto implements RequestHandlerInterface
{
    use RenderizadorHtmlTrait;
    private $productRepository;
    public function __construct()
    {
        $this->productRepository =  new PdoProductRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $title = 'Atualizar produto';

        $id = filter_input(
          INPUT_GET,
          'id',
          FILTER_VALIDATE_INT
        );

        $product = $this->productRepository->findOneById($id);

        return new Response(
          200,
          [],
          $this->renderizaHTML(
            '/produtos/FormularioInserirProduto.php',
            [
                'title' => $title,
                'product' => $product

            ]
          )
        );
    }
}