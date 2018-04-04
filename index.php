<?php
include 'config.php';
setlocale(LC_ALL, $LOCALE);
include 'inc/connection.php';
include 'inc/tools.php';


$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';
switch ($page) {
  default:
  case 'accueil':
    $file='accueil.php';
    break;
  case 'catalogue':
    $file='catalogue.php';
    break;
  case 'magazine':
    $file='magazine.php';
    break;
  case 'contact':
    $file='contact.php';
    break;
  case 'recherche':
    $file='recherche.php';
    break;
  case 'newsletter':
    $file='newsletter.php';
    break;
}
ob_start();
include 'inc/'. $file;
$buffer=ob_get_clean();
include THEME.'layout.php';
?>
