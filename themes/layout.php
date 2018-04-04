<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="nabil">

    <title>Mon site php</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="<?php echo RACINE;?>themes/css/starter-template.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Mon site</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo RACINE;?>">Accueil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo RACINE;?>magazine">Magazine</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo RACINE;?>catalogue">Catalogue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo RACINE;?>contact">Contact</a>
          </li>

        </ul>
        <form class="form-inline my-2 my-lg-0" name="recherche" method="POST" action="?page=recherche">
          <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" name="rechercher">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <?php echo $buffer;?>
      </div>

    </div><!-- /.container -->
<footer>
  <div class="starter-template">
    <h4>Inscription a la newsletter : </h4>
    <form class="form-inline my-2 my-lg-0" name="inscription" method="POST" action="?page=newsletter">
      <input class="form-control mr-sm-2" type="text" placeholder="E-Mail" name="email">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Inscription</button>
    </form>
  </div>
</footer>
  </body>
</html>
