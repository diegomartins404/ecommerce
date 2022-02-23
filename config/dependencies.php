<?php

use App\Controllers\RealizeLogin;
use App\Domain\Model\Product;
use App\Domain\Model\User;

$containerBuilder = new DI\ContainerBuilder();

$containerBuilder->addDefinitions([
  ProdutoInterface::class => function(){
    return new Product();
  },
  User::class => function(){
    return new User();
  },
]);

return $containerBuilder->build();
?>