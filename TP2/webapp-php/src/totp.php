<?php
namespace TOTP;
function secret($len=20){$a='ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';$s='';for($i=0;$i<$len;$i++){$s.=$a[random_int(0,strlen($a)-1)];}return $s;}
function base32decode($b){$b=strtoupper($b);$m='';$a='ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';$n=0;$v=0;for($i=0;$i<strlen($b);$i++){ $p=strpos($a,$b[$i]); if($p!==false){$v=($v<<5)|$p;$n+=5; if($n>=8){$n-=8;$m.=chr(($v>>$n)&0xFF);}}}return $m;}
function hotp($k,$c,$d=6){$k=base32decode($k);$bin=pack('N*',0).pack('N*',$c);$h=hash_hmac('sha1',$bin,$k,true);$o=ord(substr($h,-1))&0x0F;$t=(ord($h[$o])&0x7F)<<24|(ord($h[$o+1])&0xFF)<<16|(ord($h[$o+2])&0xFF)<<8|(ord($h[$o+3])&0xFF);$t=$t% (10**$d);return str_pad((string)$t,$d,'0',STR_PAD_LEFT);}
function totp($k,$t=null,$s=30,$d=6){if($t===null)$t=time();$c=floor($t/$s);return hotp($k,$c,$d);}
function check($k,$code,$w=1){$n=time();for($i=-$w;$i<=$w;$i++){if(totp($k,$n+$i*30)===str_pad($code,6,'0',STR_PAD_LEFT))return true;}return false;}
function otp_uri($k,$acc,$iss){return 'otpauth://totp/'.rawurlencode($iss).':'.rawurlencode($acc).'?secret='.$k.'&issuer='.rawurlencode($iss).'&algorithm=SHA1&digits=6&period=30';}
