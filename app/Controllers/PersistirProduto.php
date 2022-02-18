<?php

namespace App\Controllers;

use App\Controllers\Traits\FlashMessageTrait;
use App\Domain\Model\Produto;
use Nyholm\Psr7\Response;
use Psr\Http\Server\RequestHandlerInterface;

class PersistirProduto implements RequestHandlerInterface{
  use FlashMessageTrait;
  public function handle(){
    $nome = filter_input(
      INPUT_POST,
      'nome',
      FILTER_SANITIZE_STRING
    );
    $valor = filter_input(
      INPUT_POST,
      'valor',
      FILTER_VALIDATE_INT
    );
    $qtd = filter_input(
      INPUT_POST,
      'qtd',
      FILTER_VALIDATE_INT
    );
    $id = filter_input(
      INPUT_GET,
      'id',
      FILTER_VALIDATE_INT
    );


    $produto = new Produto($nome, $valor, $qtd);
    if ($id != ''){
      $produto->Atualizar($id);
      $this->defineMensagem('Produto atualizado com sucesso!', 'success');
    }
    else{
      $produto->Persistir();
      $this->defineMensagem('Produto adicionado com sucesso!', 'success');
    }
    return new Response(
      200,
      ['Location' => '/listar-produtos']
    );
  }
}

?>