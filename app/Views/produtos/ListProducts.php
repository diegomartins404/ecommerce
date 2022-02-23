<?php require __DIR__ . '/../inicioHTML.php'; ?>

<a href="/novo-produto" class="btn btn-primary">Adicionar</a>
<table class="table">
  <thead>
    <tr>
      <th>#</td>
      <th>Nome</td>
      <th>Preço</td>
      <th>Quantidade</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($products as $produto): ?>
      <tr class="align-middle">
        <td><?= $produto->getId(); ?></td>
        <td><?= $produto->getName(); ?></td>
        <td><?= $produto->getValue(); ?></td>
        <td><?= $produto->getQuantity(); ?></td>
        <td> 
          <div class="d-flex justify-content-end m-0">
            <a href="/atualizar-produto?id=<?= $produto->getId(); ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
          </div>
        </td>
        <td> 
          <div class="d-flex justify-content-start m-0">
            <a href="/excluir-produto?id=<?= $produto->getId(); ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
          </div>
        </td>
      </tr>
    <?php endforeach ?> 
  </tbody>
</table>

<?php require __DIR__ . '/../fimHTML.php'; ?>