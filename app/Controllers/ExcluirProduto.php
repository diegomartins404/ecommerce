<?php

namespace App\Controllers;
use App\Controllers\Traits\FlashMessageTrait;
use App\Domain\Model\Produto;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExcluirProduto implements RequestHandlerInterface
{
  private $produto;
  public function __construct(Produto $produto)
  {
    $this->produto = $produto;
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

    $produtoObj = $this->produto;
    $produtoObj->Excluir($id);
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