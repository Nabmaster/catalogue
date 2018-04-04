<article>
<header>
<?php foreach ($produits as $key => $value) :?>
  <?php if ($value['image']) : ?>
  <?php echo '<img class="float-left" src="images/'.$value['image'].'" alt="'.$value['nom_produit'].'" height="80px">'; ?>
  <?php endif; ?>

  <h1><a href="index.php?page=catalogue&action=detailarticle&id=<?php echo $value['id_produit']; ?>"><?php echo $value['nom_produit']; ?></a></h1>
  <p>
    <?php echo $value['contenu']; ?>
  </p>
<?php endforeach; ?>
</header>
</article>
