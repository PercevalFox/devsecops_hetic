<?php
session_start(); require_once __DIR__.'/totp.php';
if (!isset($_SESSION['preauth'])) { header('Location: /login.php'); exit; }
$secret_file=__DIR__.'/.secret';
if (!file_exists($secret_file)) { header('Location: /setup.php'); exit; }
$code=$_POST['code']??''; $secret=trim(file_get_contents($secret_file));
if ($_SERVER['REQUEST_METHOD']==='POST') {
  if (\TOTP\check($secret,$code)) { unset($_SESSION['preauth']); $_SESSION['user']='admin'; header('Location: /'); exit; }
}
?><html><body><form method=post><input name=code><button>verify</button></form></body></html>
