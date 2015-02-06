<?
include("xmlrpc.inc");
$name="15.00";
$format=new xmlrpcmsg('taxcalc.onttax',array(new xmlrpcval($name, "int")));
$client=new xmlrpc_client("xmlrpc-server.php", "localhost", 80);
$request=$client->send($format);
$value=$request->value();
print $value->scalarval();
?>