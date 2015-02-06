<?php
// **********************************************
// Webservice By Sundas
// **********************************************
?>
<html>
<head>
<title>Sabre Travel WebService Client </title>
<style>
h1  { color:#000066; }
h3  { color:#666600; }
pre { background-color:#FFFFE0; padding:5px; border:1px solid #666600; }
</style>
</head>
<body>
<h1>Sabre Travel Webservice</h1>

<?php
// ----------- Sabre Travel Webservice  --------------



$SERVER_URL = "https://webservices.sabre.com/websvc";

require_once("classUtils.php");
require_once("classWebservice.php");
$Service = new Webservice($SERVER_URL, "SOAP", "utf-8");

$Action  = $_REQUEST["Action"];
$Message = $_REQUEST["Message"];
$Message = str_replace("<", "", $Message); // should be encoded for XML
$Message = str_replace(">", "", $Message);
$Message = str_replace("&", "", $Message);

$Soap = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<soap:Envelope xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">
  <soap:Header>
  </soap:Header> 
  <soap:Body>
  <$Action Version=\"2002A\">
    <EchoData>$Message</EchoData>
  </$Action>
  </soap:Body>
</soap:Envelope>";

if ($_REQUEST["Debug"] == "on") $Service->PRINT_DEBUG = true;

flush();
$Response = $Service->SendRequest($Soap, $Action);

/* returns $Response["Body"]=

<?xml version="1.0" encoding="UTF-8"?>
<soap-env:Envelope xmlns:soap-env="http://schemas.xmlsoap.org/soap/envelope/">
  <soap-env:Header>
    <wsse:Security xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext"/>
  </soap-env:Header>
  <soap-env:Body>
    <soap-env:Fault>
      <faultcode>soap-env:Client.InvalidAction</faultcode>
      <faultstring>Action specified in EbxmlMessage does not exist.</faultstring>
      <detail>
        <StackTrace>com.sabre.universalservices.base.exception.ApplicationException: errors.xml.USG_INVALID_ACTION</StackTrace>
      </detail>
    </soap-env:Fault>
  </soap-env:Body>
</soap-env:Envelope>
*/ 
$XPath = $Response["XPath"];

echo "<h3>Result:</h3><pre>";
echo "<b>Error</b>: " .Utils::GetValue ($XPath, "//soap-env:Body/soap-env:Fault/faultstring")."<br>";

echo "</pre>";

?>
<b><a href="index.php">Back to Startpage</a></b>
</body>
</html>

