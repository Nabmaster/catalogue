<?php
$file = 'newsletter.txt';
$mail=$_POST['email'];
if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {   //si le format mail est bon
  if (file_exists($file)) {
      echo "Le fichier $file existe.<br />";
      $contentfile = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (in_array($mail, $contentfile)) {
          echo "ce mail est deja inscrit";
        }
        else {
          // Ouvre un fichier pour lire un contenu existant
          $current = file_get_contents($file);
          // Ajoute le mail et la date
          $current .= $mail."\n\r";
          // Écrit le résultat dans le fichier
          file_put_contents($file, $mail, FILE_APPEND);
          echo "le mail vien d'etre rajouter";
        }
  } else {
      echo "Le fichier $file n'existe pas.";
      if (false !== file_put_contents($file, '')){
      echo "il vien d'etre creer";
  } else{
      echo 'création du fichier impossible';
  }
  }
}else {
  echo "le mail n'est pas valide";
}
var_dump($contentfile);
?>
