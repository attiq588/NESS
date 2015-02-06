<?php
// **********************************************
// Webservice by Sundas
// **********************************************
?>
<html>
<head>
<title>WebService Client Demo</title>
</head>
<style>
h1      { color:#000066; margin-bottom:5px; }
.TxtBox { width:180px; }
</style>
<body>

<h1>Yahoo Maps Webservice</h1>
<b><font color=green>Web service by Sundas and Rehana</font></b><br>

<Form action="Client_Yahoo.php" method="POST">
	Street:
	<br><input type="text" class="TxtBox" name="Street" value="701 First Ave">
	<br>City:
	<br><input type="text" class="TxtBox" name="City" value="New York">
	<br>State:
	<br><input type="text" class="TxtBox" name="State" value="NY">
	<Input type="submit" value="Execute">
	<br><input type="checkbox" name="Debug" id="Debug1" checked> <label for="Debug1">Print Debug Output</label>
</Form>

<h1>Weather Webservice</h1>
<b><font color=green>Web service by Sundas and Rehana</font></b><br>

<Form action="Client_Weather.php" method="POST">
	City:<br>
	<Select class="TxtBox" name="CityCode">
		<Option value="NLXX0002">Amsterdam</Option>
		<Option value="THXX0002">Bangkok</Option>
		<Option value="UKXX0015">Belfast</Option>
		<Option value="GMXX0007">Berlin</Option>
		<Option value="ARBA0009">Buenos Aires</Option>
		<Option value="TUXX0014">Istanbul</Option>
		<Option value="ISXX0010">Jerusalem</Option>
		<Option value="UKXX0085">London</Option>
		<Option value="SPXX0050">Madrid</Option>
		<Option value="MOXX0004">Marrakech</Option>
		<Option value="SAXX0013">Mecca</Option>
		<Option value="MXDF0132">Mexico City</Option>
		<Option value="SOXX0002">Mogadishu</Option>
		<Option value="RSXX0063">Moscow</Option>
		<Option value="KEXX0009">Nairobi</Option>
		<Option value="INXX0087">Mumbai</Option>
		<Option value="USNY0996">New York</Option>
		<Option value="FRXX0076">Paris</Option>
		<Option value="ITXX0067">Rome</Option>
		<Option value="CIXX0020">Santiago de Chile</Option>
		<Option value="SWXX0031">Stockholm</Option>
		<Option value="JAXX0085">Tokyo</Option>
		<Option value="SZXX0033">Zuerich</Option>
	</Select>
	<br>Units:<br>
	<Select class="TxtBox" name="Unit">
		<Option value="m">Celsius, km, km/h, mb</Option>
		<Option value="">Fahrenheit, mi, mi/h, in</Option>
	</Select>
	<Input type="submit" value="Execute">
	<br><input type="checkbox" name="Debug" id="Debug2" checked> <label for="Debug2">Print Debug Output</label>
</Form>

<h1>Amazon SimpleDB Webservice</h1>
<b><font color=#FF6600>It  requires subscription for Amazon Webservices</font></b><br>

<Form action="Client_Amazon.php" method="POST">
	Domain Name:
	<br><input type="text" class="TxtBox" name="Domain" value="TestDomain">
	<br>Action:
	<br><Select class="TxtBox" name="Action">
		<Option value="CreateDomain">Create Domain</Option>
	</Select>
	<Input type="submit" value="Execute">
	<br><input type="checkbox" name="Debug" id="Debug3" checked> <label for="Debug3">Print Debug Output</label>
</Form>

<h1>Math Calculation Webservice</h1>
<b><font color=green>It connects to localhost</font></b><br>

<Form action="Client_Math.php" method="POST">
	Value 1:
	<br><input type="text" class="TxtBox" name="Value1" value="21">
	<br>Value 2:
	<br><input type="text" class="TxtBox" name="Value2" value="3">
	<br>Operation:
	<br><Select class="TxtBox" name="Operation">
		<Option value="Multiply">Multiply</Option>
		<Option value="Add">Add</Option>
		<Option value="Concat">Concat</Option>
	</Select>
	<Input type="submit" value="Execute">
	<br><input type="checkbox" name="Debug" id="Debug4" checked> <label for="Debug4">Print Debug Output</label>
</Form>

<h1>Soap String Transformation Webservice</h1>
<b><font color=green>It connects to localhost</font></b><br>
	
<Form action="Client_Soap.php" method="POST">
	Action:<br>
	<Select class="TxtBox" name="Action">
		<Option value="STR_RevertRQ">Revert String</Option>
		<Option value="STR_UpperRQ">Make Uppercase</Option>
		<Option value="STR_LowerRQ">Make Lowercase</Option>
	</Select>
	<br>Test String:
	<br><input type="text" class="TxtBox" name="Message" value="This is a little Text">
	<Input type="submit" value="Execute">
	<br><input type="checkbox" name="Debug" id="Debug5" checked> <label for="Debug5">Print Debug Output</label>
</Form>

<h1>Sabre Webservice</h1>
<b><font color=red>Incomplete Unable to fix the errors</font></b><br>

<Form action="Client_Sabre.php" method="POST">
	Action:<br>
	<Select class="TxtBox" name="Action">
		<Option value="OTA_PingRQ">OTA_PingRQ</Option>
	</Select>
	<br>Test String:<br>
	<input type="text" class="TxtBox" name="Message" value="This is a little Text">
	<Input type="submit" value="Execute">
	<br><input type="checkbox" name="Debug" id="Debug6" checked> <label for="Debug6">Print Debug Output</label>
</Form>
</body>
</html>

