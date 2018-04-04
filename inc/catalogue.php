<?php
  $action = isset($_GET['action'])? $_GET['action']:'index';

  $file = "cache/".md5($_SERVER['QUERY_STRING']).'.cache';
  if (is_file($file) && time() - filemtime($file) < 3600 ){
    readfile($file);}else {
      ob_start();
      switch ($action) {
        default:
        case 'index':
          indexAction();
          break;
        case 'detail':
          detailAction();
          break;
        case 'detailarticle':
          detailarticleAction();
          break;
        case 'tagdetail':
          tagdetail();
          break;
      }
      $buffer = ob_get_flush();
      file_put_contents($file, $buffer);
    }


  function indexAction()
  {
    global $pdo;
    $sql = 'SELECT id_cat, nom FROM categorie';
    $sqlcont = 'SELECT COUNT(id_produit) nb FROM produit JOIN categorie ON id_categorie = id_cat group by id_cat';
    $compt = $pdo->query($sqlcont);
    $result = $pdo->query($sql);
    $categorie = $result->fetchAll();
    include 'themes/vue/catalogue/index.html.php';
  }
  function detailAction()
  {
    global $pdo;
    $id = $_GET['id'];
    $sql = 'SELECT id_produit, nom_produit, contenu, image FROM produit WHERE id_categorie = ?';
    $result = $pdo->prepare($sql);
    $result->bindParam(1, $id, PDO::PARAM_INT);
    $result->execute();
    $produits = $result->fetchAll();
    include 'themes/vue/catalogue/detail.html.php';
  }
  function detailarticleAction()
  {
    global $pdo;
    $id = $_GET['id'];
    //recupere le produit
    $sql = 'SELECT id_produit, nom_produit, contenu, prix, image FROM produit WHERE id_produit = ?';
    $result = $pdo->prepare($sql);
    $result->bindParam(1, $id, PDO::PARAM_INT);
    $result->execute();
    $produit = $result->fetch();

    //recupere les tags
    $sql = 'SELECT t.id, t.titre FROM tag t JOIN produit_tag pt ON t.id = pt.id_tag JOIN produit p ON p.id_produit = pt.id_produit AND p.id_produit = ?';
    $result = $pdo->prepare($sql);
    $result->bindParam(1, $id, PDO::PARAM_INT);
    $result->execute();
    $tags = $result->fetchAll();
    include 'themes/vue/catalogue/detailarticle.html.php';
  }
  function tagdetail()
  {
    global $pdo;
    $id = $_GET['id'];
    $sql = 'SELECT p.id_produit, nom_produit, contenu, image
    FROM produit p
    JOIN produit_tag pt ON p.id_produit = pt.id_produit
    join tag t ON t.id = pt.id_tag
    AND t.id = ?';
    $result = $pdo->prepare($sql);
    $result->bindParam(1, $id, PDO::PARAM_INT);
    $result->execute();
    $produits = $result->fetchAll();
    include 'themes/vue/catalogue/detail.html.php';
  }

 ?>
