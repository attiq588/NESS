<?php
// **********************************************
// Webservice By Sundas
// **********************************************
?>
<html>
<head>
<title>Yahoo WebService Client </title>
<style>
h1  { color:#000066; }
h3  { color:#666600; }
pre { background-color:#FFFFE0; padding:5px; border:1px solid #666600; }
</style>
</head>
<body>
<h1>Yahoo Maps Webservice</h1>

<?php
// ----------- Yahoo Maps Webservice (5000 requests/month free) --------------

$SERVER_URL = "http://local.yahooapis.com/MapsService/V1/geocode";

require_once("classUtils.php");
require_once("classWebservice.php");
$Service = new Webservice($SERVER_URL, "GET", "utf-8");


$ApplicationID = "YD-9G7bey8_JXxQP6rxl.fBFGgCdNjoDMACQA--";

$Params["street"] = $_REQUEST["Street"];
$Params["city"]   = $_REQUEST["City"];
$Params["state"]  = $_REQUEST["State"];
$Params["appid"]  = $ApplicationID;

if ($_REQUEST["Debug"] == "on") $Service->PRINT_DEBUG = true;

flush();
$Response = $Service->SendRequest($Params);

/* returns $Response["Body"]=

<?xml version="1.0"?>
<ResultSet xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="urn:yahoo:maps" xsi:schemaLocation="urn:yahoo:maps http://api.local.yahoo.com/MapsService/V1/GeocodeResponse.xsd">
	<Result precision="address">
		<Latitude>37.416397</Latitude>
		<Longitude>-122.025055</Longitude>
		<Address>701 1st Ave</Address>
		<City>Sunnyvale</City>
		<State>CA</State>
		<Zip>94089-1019</Zip>
		<Country>US</Country>
	</Result>
</ResultSet>
<!-- ws03.search.re2.yahoo.com uncompressed  -->

*/ 
$XPath = $Response["XPath"];
if (!empty($XPath))
{
	$XPath->registerNamespace("map", "urn:yahoo:maps");
	$XPath->registerNamespace("api", "urn:yahoo:api");
}		

echo "<h3>Result:</h3><pre>";
echo "<b>Error</b>: " .Utils::GetValue ($XPath, "//api:Error/api:Message")."<br>";

if (!empty($XPath))
{
	$ResultNodes = $XPath->query("//map:ResultSet/map:Result");
	
	// A query may return multiple results (a street may exist with the same name multiple times in a city)
	for($N=1; $N<=$ResultNodes->length; $N++)
	{
		
		echo "--- RESULT $N ---<br>";
		echo "<b>Warning</b>:   " .Utils::GetAttrib($XPath, "//map:ResultSet/map:Result[$N]",  "warning")."<br>";
		echo "<b>Precision</b>: " .Utils::GetAttrib($XPath, "//map:ResultSet/map:Result[$N]",  "precision")."<br>";
		echo "<b>Address</b>:   " .Utils::GetValue ($XPath, "//map:ResultSet/map:Result[$N]/map:Address")."<br>";
		echo "<b>ZIP</b>:       " .Utils::GetValue ($XPath, "//map:ResultSet/map:Result[$N]/map:Zip")."<br>";
		echo "<b>Latitude</b>:  " .Utils::GetValue ($XPath, "//map:ResultSet/map:Result[$N]/map:Latitude")."<br>";
		echo "<b>Longitude</b>: " .Utils::GetValue ($XPath, "//map:ResultSet/map:Result[$N]/map:Longitude")."<br>";
	}
}
echo "</pre>";

?>
<b><a href="index.php">Back to Startpage</a></b>
</body>
</html>

