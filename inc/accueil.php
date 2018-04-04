<?php
  $sql = 'SELECT e.titre, contenu, image, date, login FROM edito e JOIN auteur a ON auteur_id = a.id ORDER BY date DESC LIMIT 1';
  $result = $pdo->query($sql);
  $edito = $result->fetch();
  include 'themes/vue/accueil.html.php';
 ?>
