<article>
<header>
  <h1><?php echo $article['titre']; ?></h1>
  <p>
    <?php echo $article['contenu']; ?>
  </p>
  <p>
    <?php echo strftime('%A %d %B %Y %X', strtotime($article['date'])); ?>
  </p>
</header>
</article>
