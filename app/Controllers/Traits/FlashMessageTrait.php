<?php

  namespace App\Controllers\Traits;

  trait FlashMessageTrait{
    public function defineMensagem(string $msg, string $tipoMsg): void{
      $_SESSION['msg'] = $msg;
      $_SESSION['tipoMsg'] = $tipoMsg;
    }
  }

?>