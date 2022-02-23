<?php 

  namespace App\Controllers\Traits;

  trait RenderizadorHtmlTrait{
    public function renderizaHTML(string $caminhoTemplate, array $dados):string{
      extract($dados);
      ob_start();
      require __DIR__ . '/../../Views/' . $caminhoTemplate;
      return $html = ob_get_clean();
    }
  }
?>