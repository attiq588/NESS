<?php
//var width= 400;
//var height=400;
require_once("Rectangular/Lib_DocArea.php");

class Grid extends Graph
{
	var $ShowGrid=true; 
	
	 function Grid()
	{
		if(!$this->ShowGrid)
		{
			return "";
		}
		else if($this->ShowGrid)
		{
			$a = "<svg width=\"100%\" height=\"100%\" xmlns=\"http://www.w3.org/2000/svg\">";
			$a.="<g   transform=\"translate(51,370) scale(1,-1)\" >";
			for($w=1; $w<=600;$w+49.70)
			{	
				$a.=  "  <rect x1=\"$w\" y1=\"10\" width=\"$w\" height=\"370\" style=\"stroke:rgb(220,220,220); stroke-width:1; fill:none;\" />";
				$w=$w+49.70;
			}
			for($h=1; $h<=480;$h+10)
			{
				$a.=  "  <rect x1=\"1\" y1=\"$h\" width=\"590\" height=\"$h\" style=\"stroke:rgb(220,220,220); stroke-width:3; fill:none;\" />";
				$h=$h+7;
			}
				$a.="</g>";
				
			$a .= "";
			$a .= "\n<g transform=\"translate(10,370) scale(1,-1)\" >"; 
			$a .= "\n<line x1=\"41\" y1=\"0\" x2=\"633\" y2=\"0\" style=\"stroke: black; stroke-width:2;\"/>";
			$a .= "\n" ;
			$a .= "<line x1=\"41\" y1=\50\" x2=\"41\" y2=\"370\" style=\"stroke: black; stroke-width:2;\"/>";
			$a .= "</g>" ;
			  
			  echo $a; 
		} 
	 }
 }
?>