<head 
 <html xmlns="http://www.w3.org/1999/xhtml">

<head><title>SVGGraph example</title></head>
<body background="Pictures/b_g.jpg">
	 <h1><font color="white" style="position:absolute;top:10px;left:600px;width:550px;height:400px;z-index:999;position:fixed;">WaterFall</font>  </h1>
	<div style="position:absolute;top:100px;left:400px;width:550px;height:400px;z-index:999;position:fixed;"><center>  
	<?php
	 
		require_once("Rectangular/Lib_DocArea.php"); 
		require_once("Rectangular/Lib_Grid.php"); 

		$g = new DocArea(400, 300); 

		$obj=new Grid();
		$obj->Grid();

		$g->SetValArray1(5,2,1);
		$g->Text_H('x1','x2','x3');
		$g->Text_V('y1','y2','y3');
		echo $g->Fetch('WaterFall');
?>
  </center></div>
   </body>
  </html>
