<html>
<h1><img src="WELL.jpg"></h1>
<body background="back.jpg">
<h2>Simple Type Charts</h2>
<form action="makegraph.php" method="post">
Data Set   : 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="dataset">
<option>malaria</option>
<option>rainfall</option>
<option>Crimes</option>
<option>Prices</option>
<option>stock</option>
<option>Population</option>
</select>
</br>
Graph Type :
<select name="charttype">
<option>PieGraph</option>
<option>BarGraph</option>
<option>LineGraph</option>
<option>CylinderGraph</option>
<option>RadarGraph</option>
<option>AreaGraph</option>
<option>ScatterGraph</option>
<option>BubbleGraph</option>
<option>StackedLineGraph</option>
<option>StackedBarGraph</option>
<option>PopulationPyramid</option>
<option>CandleChart</option>
<option>GanttChart</option>

</select>

<input type="submit">
</form>
<h2>Multitype Charts</h2>
<form action="makegraph2.php" method="post">
Data Set   : 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="dataset">
<option>multivalue</option>
</select>
</br>
Graph Type :
<select name="charttype">
<option>MultiBarGraph</option>
<option>MultiLineGraph</option>
<option>MultiRadarGraph</option>
<option>MultiScatterGraph</option>
</select>
<input type="submit">
</form>
</body>
</html>