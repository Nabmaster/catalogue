<article>
<header>
<?php foreach ($categorie as $key => $value) :?>
<h2><a href="index.php?page=catalogue&action=detail&id=<?php echo $value['id_cat']; ?>"><?php echo $value['nom']; ?></a></h2>
<?php $compts = $compt->fetch(); ?>
(<?php echo $compts['nb'];?>)
<?php endforeach; ?>
</header>
</article>
