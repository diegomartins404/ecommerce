<?php

namespace App\Controllers;

use App\Controllers\Traits\RenderizadorHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioLogin implements RequestHandlerInterface
  {
    use RenderizadorHtmlTrait;
    public function handle(ServerRequestInterface $request): ResponseInterface{
      $titulo = 'Login';
      $html = $this->renderizaHTML(
        '/FormularioLogin.php',
        ['titulo' => $titulo]
      );

      return new Response( 
        200,
        [],
        $html
      );
    }
  }

?>