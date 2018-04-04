<?php
include 'config.php';
include 'inc/connection.php';

if (isset($_SESSION['auth']) && $_SESSION['auth'] === true){

$page = (isset($_GET['page'])) ? $_GET['page'] : 'accueil';
switch ($page) {
  default:
  case 'accueil':
    $file = 'accueil_admin.php';
    break;
}
ob_start();
include 'inc/'.$file;
$buffer = ob_get_clean();
include 'theme_admin/layout.html.php';
}
else 
{
  include 'inc/formadmin.php';
}
 ?>
