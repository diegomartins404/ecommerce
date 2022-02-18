<?php

use App\Domain\Model\Produto;
use App\Domain\Model\User;

$containerBuilder = new DI\ContainerBuilder();

$containerBuilder->addDefinitions([
  ProdutoInterface::class => function(){
    return new Produto();
  },
  User::class => function(){
    return new User();
  }
]);

return $containerBuilder->build();
?>