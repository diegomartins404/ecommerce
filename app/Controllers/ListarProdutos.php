<?php

namespace App\Controllers;

use App\Controllers\Traits\RenderizadorHtmlTrait;
use App\Domain\Model\Produto;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarProdutos implements RequestHandlerInterface{
  use RenderizadorHtmlTrait;
  public function handle(ServerRequestInterface $request): ResponseInterface{
    $produtosObj = new Produto();
    $produtos = $produtosObj->Recuperar();

    $titulo = 'Lista de produtos';

    $html = $this->renderizaHTML(
      'produtos/ListarProdutos.php',
      [
        'titulo' => $titulo,
        'produtos' => $produtos
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