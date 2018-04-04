<h1>Bienvenue</h1>
<article>
<header>
  <h2>
  <?php echo $edito['titre']; ?>
  </h2>
</header>
  <?php if ($edito['image']) : ?>
  <?php echo '<img class="float-left" src="images/'.$edito['image'].'" alt="'.$edito['titre'].'" width="120px">'; ?>
  <?php endif; ?>
  <?php echo $edito['contenu'];?>
<footer>
  le <?php echo $edito['date']; ?>, par <i><?php echo $edito['login'];?></i>
</footer>
</article>
