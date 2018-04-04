<?php
$dsn='mysql:host='.$host.';dbname='.$dbname;
$pdo = new PDO($dsn, $login, $pwd, [
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
?>
