<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/5a2d867f6e.js" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $titulo; ?></title>
</head>
<body>

  <?php if (isset($_SESSION['logado'])): ?>
    <nav class="navbar navbar-dark bg-dark pe-3 ps-3 mb-3">
      <a class="navbar-brand" href="/listar-produtos">Home</a>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/logout">Sair</a>
        </li>
      </ul>
    </nav>
  <?php endif; ?>

  <div class="ps-3 pe-3 <?= !isset($_SESSION['logado']) ? 'pt-2' : ''; ?>">
    <?php if(isset($_SESSION['msg'])): ?>
        <p class="alert alert-<?= $_SESSION['tipoMsg']; ?>"><?= $_SESSION['msg']; ?></p>
    <?php endif; unset($_SESSION['msg']); unset($_SESSION['tipoMsg']);?>