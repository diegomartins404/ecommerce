<?php

namespace App\Controllers;
use App\Controllers\Traits\FlashMessageTrait;
use App\Domain\Infrastructure\Repository\PdoProductRepository;
use App\Domain\Model\Product;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExcluirProduto implements RequestHandlerInterface
{
  private $productRepository;
  public function __construct()
  {
    $this->productRepository = new PdoProductRepository();
  }

  use FlashMessageTrait;

  public function handle(ServerRequestInterface $request): ResponseInterface
  {
    $id = filter_input(
      INPUT_GET,
      'id',
      FILTER_VALIDATE_INT);

    if(is_null($id) || $id === false){
      $this->defineMensagem('ID inexistente', 'dark');
      return new Response(
        200,
        ['Location' => '/listar-produtos']
      );
    }

    $this->productRepository->delete($id);
    $this->defineMensagem('Produto excluído com sucesso!', 'success');
    return new Response(
      200,
      [
        'Location' => '/listar-produtos'
      ]
    );
  }
}
?>