<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($objet); ?></title>
  </head>
  <body>
    <h1> <img src="" alt=""><?php echo $objet; ?> </h1>
    <table>
      <tr>
        <td><?php echo $genre; ?></td>
        <td><?php echo $nom; ?></td>
      </tr>
      <tr>
        <td><?php echo $email; ?></td>
        <td><?php echo $message; ?></td>
      </tr>
    </table>
  </body>
</html>
