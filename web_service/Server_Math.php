<?php
// **********************************************
// Webservice by Sundas Fiaz
// **********************************************

// =============== Webservice Server =============

// This server will work with GET and with POST requests.



$Operation = $_REQUEST["Operation"];
$Value1    = $_REQUEST["Value1"];
$Value2    = $_REQUEST["Value2"];

switch (strtoupper($Operation))
{
	case "MULTIPLY":
		echo "<Result><Value>".($Value1 * $Value2)."</Value></Result>";
		exit;
		
	case "ADD":
		echo "<Result><Value>".($Value1 + $Value2)."</Value></Result>";
		exit;

	case "CONCAT":
		echo "<Result><Value>$Value1$Value2</Value></Result>";
		exit;
		
	default:
		header("HTTP/1.1 501 Not supported");
		echo "<Result><Error>The operation is not supported.</Error></Result>";
		exit;
}

