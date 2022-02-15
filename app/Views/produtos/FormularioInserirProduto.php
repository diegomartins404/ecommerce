<?php require __DIR__ . '/../inicioHTML.php'; ?>
  <form action="/persistir-produto<?= isset($produto) ? '?id=' . $produto->getId() : '';?>" method="post">
  <div class="mb-3 form-group">
    <label class="form-label" for="nome">Nome do produto</label>
    <input class="form-control" type="text" name="nome" value="<?= isset($produto) ? $produto->getNome() : ''; ?>">
  </div>
  <div class="mb-3 form-group">
    <label class="form-label" for="valor">Preço R$</label>
    <input class="form-control" type="text" name="valor" value="<?= isset($produto) ? $produto->getValor() : ''; ?>">
  </div>
  <div class="mb-3 form-group">
    <label class="form-label" for="qtd">Quantidade atual</label>
    <input class="form-control" type="text" name="qtd" value="<?= isset($produto) ? $produto->getQtd() : ''; ?>">
  </div>
  <button type="submit">Salvar</button>
  </form>
<?php require __DIR__ . '/../fimHTML.php'; ?>