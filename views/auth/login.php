<?php if(isset($_SESSION['errors'])): ?>
    <?php foreach($_SESSION['errors']  as $errorsArray): ?>
        <?php foreach($errorsArray as $errors): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                    <li><?= $error; ?></li>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>
    <?php endforeach ?>
<?php endif ?>
<?php if(isset($_SESSION['erreur'] )): ?>
    <div class="alert alert-danger">
        <li><?= $_SESSION['erreur'] ?></li>
    </div>
<?php endif ?>
<?php session_destroy(); ?>

<h1 class="mx-auto">Se connecter</h1>
<form action="/login" method="POST">
<div class="form-group mb-3">
      <label for="username" id="" class="form-label">Username</label>
      <input type=text" name="username" class="form-control" id="username" placeholder="">
    </div>

    <div class="form-group mb-3">
      <label for="password" id="" class="form-label">Password</label>
      <input type=text" name="password" class="form-control" id="password" placeholder="">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
