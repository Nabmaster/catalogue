<?php
  if (isset($_POST['ok'])) :
    $erreur = '';
    $nom = '';
    $message = '';
    $email = '';
    $objet = '';
    if (strlen($_POST['nom']) < 2) :
      $erreur .= 'le champ nom est invalide <br />';
    else :
      $nom = htmlspecialchars($_POST['nom']);
    endif;
    if ($_POST['objet'] == '0') :
      $erreur .= 'le champ objet est vide<br />';
    else:
      $objet = htmlspecialchars($_POST['objet']);
    endif;
    if ($_POST['msg'] == '') :
      $erreur .= 'le champ message est vide<br />';
    else:
      $message = htmlspecialchars($_POST['msg']);
    endif;
    if (!isset($_POST['genre'])) :
      $erreur .= 'le champ genre est vide<br />';
    else:
      $genre = htmlspecialchars($_POST['genre']);
    endif;
    if (strlen($_POST['email'])<2) :
      $erreur .= 'le champ Email est vide<br />';
    else:
      $email = htmlspecialchars($_POST['email']);
    endif;
    $resultat = $nom.':'.$email.':'.$message;
  endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style>
      .success{
        background-color: green;
      }
      .error{
        background-color: red;
      }
    </style>
      <?php if (isset($erreur)) :?>
        <?php if($erreur == null):?>
            <div class="success"><?php echo $resultat; ?></div>
            <?php
                global $pdo;
                $sql = 'INSERT INTO contact VALUES (NULL, :genre, :nom, :email, :objet, :message, now())' ;
                $result = $pdo->prepare($sql);
                $result->bindValue(':genre', $genre, PDO::PARAM_INT);
                $result->bindValue(':nom', $nom, PDO::PARAM_INT);
                $result->bindValue(':email', $email, PDO::PARAM_INT);
                $result->bindValue(':objet', $objet, PDO::PARAM_INT);
                $result->bindValue(':message', $message, PDO::PARAM_INT);
                $result->execute();
                echo '<script>alert("Votre message a bien été envoyé");</script>';
             ?>
        <?php else : ?>
            <div class="error"><?php echo $erreur; ?></div>
        <?php endif; ?>
      <?php endif; ?>

<form class="" name="recherche" method="POST" action="">
  <div class="col-sm-6">
    <label class="radio-inline"><input type="radio" name="genre" value="Monsieur">M.</label>
    <label class="radio-inline"><input type="radio" name="genre" value="Madame">Mme</label>
    <input class="form-control" type="text" placeholder="Nom" name="nom">
    <input class="form-control" type="email" placeholder="Email" name="email">
    <select class="form-control" name="objet">
      <option value="0">Objet</option>
      <option value="Produit">Produits</option>
      <option value="Magazines">Magazines</option>
      <option value="Autres">Autres</option>
    </select>
    <textarea class="form-control" name="msg" placeholder="Message" rows="8" cols="80"></textarea>
    <button class="btn btn-info" type="reset">Reset</button>
    <button class="btn btn-success" type="submit" name="ok">Envoyer</button>
  </div>
</form>
</body>
</html>
