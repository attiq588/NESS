<?
$rs="http://www.stormpixel.com/rest-server.php";
$qs="";
$parray=array('amount'=>"15.00");
foreach($parray as $par=>$value){ 
$qs=$qs."$par=".urlencode($value)."&";}
$uri="$rs?$qs";
$cobj=curl_init($uri);
curl_setopt($cobj,CURLOPT_RETURNTRANSFER,1);
$xml=curl_exec($cobj);
curl_close($cobj);
echo $xml;
?>


