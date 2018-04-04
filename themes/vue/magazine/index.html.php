<?php foreach ($article as $key => $value) :?>
<h3><a href="<?php echo RACINE;?>magazine/<?php echo $value['slug']; ?>-<?php echo $value['id']; ?>"><?php echo $value['titre']; ?></a></h3>
<?php echo extrait($value['contenu']); ?>
<?php endforeach; ?>
