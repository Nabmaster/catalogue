<?php
    $recherche = isset($_POST['rechercher']) ? $_POST['rechercher'] : '';
?>

<h2>Resultat de la recherche pour : <?php echo $recherche; ?></h2>

<?php
    global $pdo;
    $sql = 'SELECT nom_produit , contenu, id_produit FROM produit WHERE nom_produit LIKE "%"?"%"';
    $result = $pdo->prepare($sql);
    $result->bindValue(1, $recherche, PDO::PARAM_INT);
    $result->execute();
    $produits = $result->fetchAll();
?>

<?php if($produits != NULL): ?>
    <?php foreach($produits as $produit): ?>
        <a href="Index.php?page=catalogue&action=detailarticle&id=<?php echo $produit['id_produit'] ?>"><h3><?php echo $produit['nom_produit'] ?></h3></a>
    <?php endforeach; ?>
<?php else: ?>
    <p>
      Aucun resultat
    </p>
<?php endif; ?>
