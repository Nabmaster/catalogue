<?php
session_start();
setcookie(session_name(), session_id(), time() + 3600, "/", null, null, true);
$erreur=false;
if (isset($_GET['fermer'])) {
  session_destroy();
  setcookie(session_name(), session_id(), time() - 10, "/", null, null, true);
  UNSET($_SESSION);
  header('Location: accueil_admin.php');
  exit;
}
if (isset($_POST['login'])) {
  if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token'] && time() - $_SESSION['token_time'] < 5 * 60) {
    //////////////////////////////////////////
    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    //preparer la requette
    $sql = 'SELECT id, login, pwd FROM auteur WHERE login = ?';
    $result = $pdo->prepare($sql);
    $result->bindValue(1, $login);
    $result->execute();
    $user = $result->fetch();
    //////////////////////////
    if ($user) {
      if (password_verify($pwd, $user['pwd'])) {
        //echo "connection valide";
        $_SESSION['auth'] = TRUE;
        $_SESSION['login'] = $user['login'];
        $_SESSION['IPaddress'] = sha1($_SERVER['REMOTE_ADDR']);
        $_SESSION['userAgent'] = sha1($_SERVER['HTTP_USER_AGENT']);
      }else {
        sleep(1);
        $erreur= 'code errone';
      }
    }
    else {
      sleep(1);
      $erreur = 'utilisateur non connue';
    }
    //////////////////////////////////////////
  } else {$erreur = 'Erreur, Veillez reessayer';}
}


//////////////////////////////////////////////////
$token = sha1(uniqid(rand(), TRUE));
$token_time = time();
$_SESSION['token'] = $token;
$_SESSION['token_time'] = $token_time;


?>
<?php if (isset($_SESSION['auth']) && $_SESSION['auth'] === true): ?>
  <?php
  if ($_SESSION['IPaddress'] != sha1($_SERVER['REMOTE_ADDR']) || $_SESSION['userAgent'] != sha1($_SERVER['HTTP_USER_AGENT']))
  exit('possible session hijacking attempt');
  ?>
<?php include 'inc/accueil_admin.php'; ?>
  <?php else: include 'theme_admin/vue/connexion.html.php';?>
  <?php endif; ?>
