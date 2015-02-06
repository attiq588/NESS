<?
include("xmlrpc.inc");
include("xmlrpcs.inc");
function onttax($par){
$amount=$par->getParam(0);
$amountval=$amount->scalarval(); 
$taxcalc=$amountval*.15;
return new xmlrpcresp(new xmlrpcval($taxcalc, "string"));
}
$server=new xmlrpc_server(array("taxcalc.onttax" => array("function" => "onttax")));
?>