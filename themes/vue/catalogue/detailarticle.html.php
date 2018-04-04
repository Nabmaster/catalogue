<article>
<header>
  <?php if ($produit['image']) : ?>
  <?php echo '<img class="float-left" src="images/'.$produit['image'].'" alt="'.$produit['nom_produit'].'" height="160px">'; ?>
  <?php endif; ?>
  <h1><?php echo $produit['nom_produit']; ?></h1>
  <p>
    <?php echo $produit['contenu']; ?>
  </p>
  <p><strong>Prix TTC : <?php echo $produit['prix']; ?>€</strong></p>
  Tags :
  <?php foreach ($tags as $tag) :?>
    <span class="badge badge-info">
      <a href="index.php?page=catalogue&action=tagdetail&id=<?php echo $tag['id']; ?>">
        <?php echo $tag['titre']; ?>
      </a>
    </span>
  <?php endforeach; ?>
</header>
</article>
