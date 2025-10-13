<?php
session_start(); require_once __DIR__.'/totp.php';
$secret_file=__DIR__.'/.secret';
if (file_exists($secret_file)) { header('Location: /login.php'); exit; }
$secret=\TOTP\secret();
file_put_contents($secret_file,$secret);
$issuer='TP2'; $account='admin';
$url=\TOTP\otp_uri($secret,$account,$issuer);
$q='https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl='.urlencode($url);
?><html><body><p>Scan</p><img src="<?php echo $q; ?>"><p><?php echo $secret; ?></p><a href=/login.php>login</a></body></html>
