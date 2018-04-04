<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>connexion</title>
  </head>
  <body>
    <h1>Connexion</h1>
    <?php if($erreur):; ?>
      <div class="alert alert-danger">
        <?php echo $erreur; ?>
      </div>
    <?php endif; ?>
    <form method="post">
      <input type="hidden" name="token" value="<?php echo $token; ?>">
      <input type="text" name="login" value="login">
      <input type="text" name="pwd" value="password">
      <input type="submit" name="ok" value="ok">
    </form>
  </body>
</html>
