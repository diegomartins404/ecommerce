<?php 
  use App\Controllers\{
    FormularioInserirProduto, 
    PersistirProduto,
    ListProducts,
    ExcluirProduto,
    AtualizarProduto,
    FormularioLogin,
    RealizeLogin,
    Deslogar,


  };
  $rotas = [
    "/novo-produto" => FormularioInserirProduto::class,
    "/persistir-produto" => PersistirProduto::class,
    "/listar-produtos" => ListProducts::class,
    "/excluir-produto" => ExcluirProduto::class,
    "/atualizar-produto" => AtualizarProduto::class,
    "/login" => FormularioLogin::class,
    "/realiza-login" => RealizeLogin::class,
    "/logout" => Deslogar::class,

  ];
  return $rotas;
?>