<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/posts">Les derniers articles</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <?php if(isset($_SESSION["auth"])): ?>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Se déconnecter</a>
          </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>
</div>
  <div class="container"><?= $content ?></div>
    

  <script src="../public/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>