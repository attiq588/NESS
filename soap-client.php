<?php
require_once('nusoap.php'); 
$wsdl="http://localhost/soap-server.php?wsdl";
$client=new soapclient($wsdl, 'wsdl'); 
$param=array(
'amount'=>'15.00',
); 
echo $client->call('CalculateOntarioTax', $param);
?>


