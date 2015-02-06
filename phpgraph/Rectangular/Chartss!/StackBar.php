 
 <html xmlns="http://www.w3.org/1999/xhtml">

<head><title>SVGGraph example</title></head>
<body background="Pictures/b_g.jpg">
	 <h1><font color="white" style="position:absolute;top:10px;left:600px;width:550px;height:400px;z-index:999;position:fixed;">Histogram</font>  </h1>
	<div style="position:absolute;top:100px;left:400px;width:550px;height:400px;z-index:999;position:fixed;"><center>  
	 <?php
	 
		require_once("Rectangular/Lib_DocArea.php"); 
		require_once("Rectangular/Lib_Grid.php"); 

		$g = new DocArea(400, 400);  

		$obj=new Grid();
		$obj->Grid();
 
		$g->SetValArray1(6,5,4,3,2,1);
		$g->SetValArray2(10,2,3,4,5,6);
		$g->Text_H('x1','x2','x3');
		$g->Text_V('y1','y2','y3');
		echo $g->Fetch('StackedBar');
?>
  </center></div>
   </body>
  </html>