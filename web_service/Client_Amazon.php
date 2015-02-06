<?php
// **********************************************
// Webservice By Sundas
// **********************************************
?>
<html>
<head>
<title>Amazon WebService Client </title>
<style>
h1  { color:#000066; }
h3  { color:#666600; }
pre { background-color:#FFFFE0; padding:5px; border:1px solid #666600; }
</style>
</head>
<body>
<h1>Amazon SimpleDB Webservice</h1>

<?php
// ----------- AMAZON SimpleDB Webservice (1GB/month free) -------------

$SERVER_URL = "https://sdb.amazonaws.com";

require_once("classUtils.php");
require_once("classWebservice.php");
$Service = new Webservice($SERVER_URL, "POST", "utf-8", "Amazon SimpleDB PHP5 Library");


$PublicKey  = "AIWMFIAEQGPKI3LFRADW";
$PrivateKey = "HC9Yt3ZGK+A8TU2GrH8Llr+M378FZqu04ur8S+eY";

date_default_timezone_set('UTC');

$Params["Action"]         = $_REQUEST["Action"];
$Params["DomainName"]     = $_REQUEST["Domain"];
$Params["Version"]        = "2009-04-15";
$Params["AWSAccessKeyId"] = $PublicKey;
$Params["Timestamp"]      = date("Y-m-d\TH:i:s").".000Z";

// Amazon requires a signature which is calculated from all parameters which are sent and your private key.
// The parameters must include the public key and a valid UTC timestamp
AddAmazonSignature($Params, $PrivateKey);

if ($_REQUEST["Debug"] == "on") $Service->PRINT_DEBUG = true;

flush();
$Response = $Service->SendRequest($Params);

/* returns $Response["Body"]=

<?xml version="1.0"?>
<Response>
	<Errors>
		<Error>
			<Code>AuthFailure</Code>
			<Message>AWS was not able to validate the provided access credentials</Message>
		</Error>
	</Errors>
	<RequestID>7d63d0fa-740b-0113-2bea-c92c5d7f4198</RequestID>
</Response>

*/

$XPath = $Response["XPath"];

echo "<h3>Result:</h3><pre>";	


echo "<b>Error</b>: ".Utils::GetValue($XPath, "//Response/Errors/Error/Message");

echo "</pre>";


function AddAmazonSignature(&$Params, $PrivateKey)
{
	$Params["SignatureVersion"] = 1;
	$Params["SignatureMethod"]  = "HmacSHA256";
	
    uksort($Params, 'strcasecmp');

    $Data = '';
    foreach ($Params as $Name => $Value) 
    {
        $Data .= "$Name$Value";
    }
    $Params["Signature"] = base64_encode(hash_hmac('sha256', $Data, $PrivateKey, true));
}

?>
<b><a href="index.php">Back to Startpage</a></b>
</body>
</html>

