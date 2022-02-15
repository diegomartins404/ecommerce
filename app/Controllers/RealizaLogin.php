<?php

  namespace App\Controllers;

  use App\Controllers\Traits\FlashMessageTrait;
  use App\Models\Usuario;

  use Nyholm\Psr7\Response;
  use Psr\Http\Message\ServerRequestInterface;
  use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

  class RealizaLogin implements RequestHandlerInterface{
    use FlashMessageTrait;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
      $email = filter_input(
        INPUT_POST,
        'email',
        FILTER_SANITIZE_EMAIL
      );
      $senha = filter_input(
        INPUT_POST,
        'senha', 
        FILTER_SANITIZE_STRING
      );
      $usuario = new Usuario();
      $usuarioExiste = $usuario->Recupera($email);
      if (!$usuarioExiste || !$usuario->VerificaSenha($senha)){
        $this->defineMensagem('E-mail ou senha inválidos', 'dark');
        return new Response(
          200, 
          ['Location' => '/login']
        );
      }
      
      $_SESSION['logado'] = true;
      return new Response(
        200, 
        ['Location' => '/listar-produtos']
      );
    }
  }
?>  