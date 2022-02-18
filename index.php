<?php

use Psr\Http\Message\ResponseInterface;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Container\ContainerInterface;

use Nyholm\Psr7\MessageTrait;

require_once('./vendor/autoload.php');

  if(!isset($_SERVER["PATH_INFO"])){
    echo "index";
  } else{
    $caminho = $_SERVER["PATH_INFO"];
    $rotas = require __DIR__ . "/config/routes.php";

    
    if(!array_key_exists($caminho, $rotas)){
      http_response_code(404);
      exit();
    }

    session_start();

    $ehRotaLogin = stripos($caminho, 'login');
    if(!isset($_SESSION['logado']) && $ehRotaLogin === false){
      header('Location: /login');
      exit();
    }



    $psr17Factory = new Psr17Factory();

    $creator = new \Nyholm\Psr7Server\ServerRequestCreator(
      $psr17Factory, // ServerRequestFactory
      $psr17Factory, // UriFactory
      $psr17Factory, // UploadedFileFactory
      $psr17Factory  // StreamFactory
    );
  
    $request = $creator->fromGlobals();

    $classeControladora = $rotas[$caminho]; 
    $controlador = new $classeControladora();

    $container = require __DIR__ . '/config/dependencies.php';
    $controlador = $container->get($classeControladora);

    $resposta = $controlador->handle($request);
    
    $headers = $resposta->getHeaders();
    foreach($headers as $name => $values){
      foreach($values as $value){
        header(sprintf('%s: %s', $name, $value), false);
      }
    }

    $html = $resposta->getBody();
    if (! $html == ''){
      echo $html;
    }

  }
?> 