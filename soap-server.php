<?
require_once("nusoap.php");
$ns="http://localhost/";
$server = new soap_server();
$server->configureWSDL('CanadaTaxCalculator',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('CalculateOntarioTax',
array('amount' => 'xsd:string'),
array('return'=>'xsd:string'),
$ns);
function CalculateOntarioTax($amount){
$taxcalc=$amount*.15;
return new soapval('return','string',$taxcalc);
}
$server->service($HTTP_RAW_POST_DATA);
?>