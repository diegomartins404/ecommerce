<?php

namespace App\Controllers;

use App\Controllers\Traits\RenderizadorHtmlTrait;
use App\Domain\Model\Produto;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AtualizarProduto implements RequestHandlerInterface
{
  use RenderizadorHtmlTrait;
  public function handle(ServerRequestInterface $request): ResponseInterface 

  {
    $titulo = 'Atualizar produto';

    $id = filter_input(
      INPUT_GET,
      'id',
      FILTER_VALIDATE_INT
    );

    $produto = new Produto();
    $res = $produto->Recuperar($id);
    $produto->setAll($res);


    return new Response(
      200,
      [],
      $this->renderizaHTML(
        '/produtos/FormularioInserirProduto.php',
        [
          'produto' => $produto,
          'titulo' => $titulo
        ]
      )
    );
  }
}
?>