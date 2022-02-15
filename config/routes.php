<?php 
  use App\Controllers\{
    FormularioInserirProduto, 
    PersistirProduto,
    ListarProdutos,
    ExcluirProduto,
    AtualizarProduto,
    FormularioLogin,
    RealizaLogin,
    Deslogar,


  };
  $rotas = [
    "/novo-produto" => FormularioInserirProduto::class,
    "/persistir-produto" => PersistirProduto::class,
    "/listar-produtos" => ListarProdutos::class,
    "/excluir-produto" => ExcluirProduto::class,
    "/atualizar-produto" => AtualizarProduto::class,
    "/login" => FormularioLogin::class,
    "/realiza-login" => RealizaLogin::class,
    "/logout" => Deslogar::class,

  ];
  return $rotas;
?>