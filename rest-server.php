<?
$amount=$_GET["amount"];
$taxcalc=$amount*.15;
echo "<?xml version=\"1.0\"?>";
echo "<taxinfo>";
echo "<result>".$taxcalc."</result>";
echo "</taxinfo>";
?>