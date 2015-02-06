<?php
// **********************************************
// Webservice  by  Sundas
// **********************************************
?>
<html>
<head>
<title>Weather Webservice Client</title>
<style>
h1  { color:#000066; }
h3  { color:#666600; }
pre { background-color:#FFFFE0; padding:5px; border:1px solid #666600; }
</style>
</head>
<body>
<h1>Weather Webservice</h1>

<?php


$SERVER_URL = "http://xml.weather.com/weather/local";

$Url = $SERVER_URL ."/". $_REQUEST["CityCode"];

require_once("classUtils.php");
require_once("classWebservice.php");
$Service = new Webservice($Url, "GET", "ISO-8859-1");

$Params["cc"]   = "*";               // get current weather
$Params["dayf"] = "0";               // get x days of weather forecast
$Params["unit"] = $_REQUEST["Unit"]; // get Celsius, kilometer, kilometer/hour, millibar versus Fahrenheit, miles, miles/hour, inch

if ($_REQUEST["Debug"] == "on") $Service->PRINT_DEBUG = true;

flush();
$Response = $Service->SendRequest($Params);

/* returns $Response["Body"]=

<?xml version="1.0" encoding="ISO-8859-1"?>
<!--This document is intended only for use by authorized licensees of The Weather Channel. Unauthorized use is prohibited. Copyright 1995-2005, The Weather Channel Interactive, Inc. All Rights Reserved.-->
<weather ver="2.0">
  <head>
    <locale>en_US</locale>
    <form>MEDIUM</form>
    <ut>F</ut>
    <ud>mi</ud>
    <us>mph</us>
    <up>in</up>
    <ur>in</ur>
  </head>
  <loc id="ARBA0009">
    <dnam>Buenos Aires, Argentina</dnam>
    <tm>12:37 PM</tm>
    <lat>-34.61</lat>
    <lon>-58.37</lon>
    <sunr>8:01 AM</sunr>
    <suns>5:53 PM</suns>
    <zone>-3</zone>
  </loc>
  <cc>
    <lsup>6/30/09 12:00 PM Local Time</lsup>
    <obst>SABE</obst>
    <tmp>52</tmp>
    <flik>52</flik>
    <t>Partly Cloudy</t>
    <icon>30</icon>
    <bar>
      <r>29.83</r>
      <d>steady</d>
    </bar>
    <wind>
      <s>17</s>
      <gust>N/A</gust>
      <d>270</d>
      <t>W</t>
    </wind>
    <hmid>76</hmid>
    <vis>6.2</vis>
    <uv>
      <i>2</i>
      <t>Low</t>
    </uv>
    <dewp>45</dewp>
    <moon>
      <icon>8</icon>
      <t>Waxing Gibbous</t>
    </moon>
  </cc>
</weather>
*/ 

$XPath = $Response["XPath"];

$UnitTemp  = Utils::GetValue ($XPath, "//weather/head/ut");
$UnitDist  = Utils::GetValue ($XPath, "//weather/head/ud");
$UnitSpeed = Utils::GetValue ($XPath, "//weather/head/us");
$UnitPress = Utils::GetValue ($XPath, "//weather/head/up");
$IconSky   = Utils::GetValue ($XPath, "//weather/cc/icon");
$IconMoon  = Utils::GetValue ($XPath, "//weather/cc/moon/icon");
$ImgSky    = "http://i.uk.imwx.com/global/images/52x52/$IconSky.png";
$ImgMoon   = "http://image.weather.com/web/common/moonicons/52/$IconMoon.gif";

echo "<h3>Result:</h3><pre>";
echo "<b>Error</b>:          " .Utils::GetValue ($XPath, "//error/err").        "<br>";
echo "<hr width=350 align=left>";
echo "<b>Location</b>:       " .Utils::GetValue ($XPath, "//weather/loc/dnam"). "<br>";
echo "<b>Local Time</b>:     " .Utils::GetValue ($XPath, "//weather/loc/tm").   "<br>";
echo "<b>Sunrise</b>:        " .Utils::GetValue ($XPath, "//weather/loc/sunr"). "<br>";
echo "<b>Sunset</b>:         " .Utils::GetValue ($XPath, "//weather/loc/suns"). "<br>";
echo "<b>Longitude</b>:      " .Utils::GetValue ($XPath, "//weather/loc/lon").  "<br>";
echo "<b>Latitude</b>:       " .Utils::GetValue ($XPath, "//weather/loc/lat").  "<br>";
echo "<hr width=350 align=left>";
echo "<img src='$ImgSky' align=middle width=52 height=52><br>";
echo "<b>Sky</b>:            " .Utils::GetValue ($XPath, "//weather/cc/t").     "<br>";
echo "<b>Temperature</b>:    " .Utils::GetValue ($XPath, "//weather/cc/tmp").   "&deg;$UnitTemp<br>";
echo "<b>Feels Like</b>:     " .Utils::GetValue ($XPath, "//weather/cc/flik").  "&deg;$UnitTemp<br>";
echo "<b>Dew Point</b>:      " .Utils::GetValue ($XPath, "//weather/cc/dewp").  "&deg;$UnitTemp<br>";
echo "<b>Pressure</b>:       " .Utils::GetValue ($XPath, "//weather/cc/bar/r"). " $UnitPress<br>";
echo "<b>Humidity</b>:       " .Utils::GetValue ($XPath, "//weather/cc/hmid").  "%<br>";
echo "<b>Visibility</b>:     " .Utils::GetValue ($XPath, "//weather/cc/vis").   " $UnitDist<br>";
echo "<b>Wind Speed</b>:     " .Utils::GetValue ($XPath, "//weather/cc/wind/s")." $UnitSpeed<br>";
echo "<b>Wind Direction</b>: " .Utils::GetValue ($XPath, "//weather/cc/wind/t")."<br>";
echo "<b>UV Index</b>:       " .Utils::GetValue ($XPath, "//weather/cc/uv/i").  "<br>";
echo "<hr width=350 align=left>";
echo "<img src='$ImgMoon' align=middle width=52 height=52><br>";
echo "<b>Moon</b>:           " .Utils::GetValue ($XPath, "//weather/cc/moon/t")."<br>";
echo "<hr width=350 align=left>";
echo "<b>WeatherStation</b>: " .Utils::GetValue ($XPath, "//weather/cc/obst").  "<br>";

echo "</pre>";

?>
<b><a href="index.php">Back to Startpage</a></b>
</body>
</html>

