<?php
session_start();
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $u=$_POST['u']??''; $p=$_POST['p']??'';
  if ($u==='admin' && $p==='admin') { $_SESSION['preauth']=true; header('Location: /verify.php'); exit; }
}
?><html><body><form method=post><input name=u><input name=p type=password><button>login</button></form><a href=/setup.php>setup</a></body></html>
