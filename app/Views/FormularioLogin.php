<?php require __DIR__ . '/./inicioHTML.php'; ?>


<form action="/realiza-login" method="post">
  <div class="form-group">
    <label for="email">E-mail:</label>
    <input class="form-control" type="email" name="email">
  </div>
  <div class="form-group">
    <label for="password">Senha:</label>
    <input class="form-control" type="password" name="senha">
  </div>
  <button type="submit">Log in</button>
</form>



<?php require __DIR__ . '/./fimHTML.php'; ?>