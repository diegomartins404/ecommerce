<?php 

  namespace App\Controllers;
  
  use App\Controllers\Traits\RenderizadorHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInserirProduto implements RequestHandlerInterface
  {
    use RenderizadorHtmlTrait;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
      $titulo = 'Novo produto';

      $html = $this->renderizaHTML(
        '/produtos/FormularioInserirProduto.php', 
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
