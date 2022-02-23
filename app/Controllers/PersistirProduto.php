<?php

namespace App\Controllers;

use App\Controllers\Traits\FlashMessageTrait;
use App\Domain\Infrastructure\Repository\PdoProductRepository;
use App\Domain\Model\Product;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PersistirProduto implements RequestHandlerInterface
{
    use FlashMessageTrait;
    private $productRepository;
    public function __construct()
    {
        $this->productRepository = new PdoProductRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        $nome = filter_input(
            INPUT_POST,
            'nome',
            FILTER_SANITIZE_STRING
        );

        $valor = filter_input(
            INPUT_POST,
            'valor',
            FILTER_VALIDATE_INT
        );
        $qtd = filter_input(
            INPUT_POST,
            'qtd',
            FILTER_VALIDATE_INT
        );

        $product = new Product($id, $nome, $valor, $qtd);
        $this->productRepository->save($product);

        return new Response(
            200,
            ['Location' => '/listar-produtos']
        );
    }
}
