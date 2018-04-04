<?php
  $action = isset($_GET['action'])? $_GET['action']:'index';
  switch ($action) {
    default:
    case 'index':
      indexAction();
      break;

    case 'detail':
      detailAction();
      break;
  }
  function indexAction()
  {
    global $pdo;
    $sql = 'SELECT id, titre, contenu, slug FROM article WHERE publier = 1 order by date desc limit 3';
    $result = $pdo->query($sql);
    $article = $result->fetchAll();
    include 'themes/vue/magazine/index.html.php';
  }
  function detailAction()
  {
    global $pdo;
    $id = $_GET['id'];
    $sql = 'SELECT id, titre, contenu, date FROM article WHERE id = ?';
    $result = $pdo->prepare($sql);
    $result->bindParam(1, $id, PDO::PARAM_INT);
    $result->execute();
    $article = $result->fetch();
    include 'themes/vue/magazine/detail.html.php';

  }
 ?>
