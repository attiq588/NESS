<?php



require_once("Lib_DocArea.php");
//require_once("Lib_Grid.php");

Class PieGraph extends Graph {
 
	function Draw(){ 
	
		$width = 300; // canvas size
		$height = 400; 
		$centerx = $width / 2; // centre of the pie chart
		$centery = $height / 2;
		$radius = min($centerx,$centery) - 10; // radius of the pie chart
		if ($radius < 5) {
			die("Your chart is too small to draw.");
		}  
		$values =$this->GetValues();
			
	$b = "";
	$c = "";
	//$G_labl = 120;
	//$values=$this->values;
	//echo $this->values;
	$max = count($values);
	
	
	$cx=$centerx;
	$cy=$centery;
	$sum = 0;
	foreach ($values as $key=>$val) {
		$sum += $val;
		//echo $val;
	}
	$deg = $sum/360; // one degree
	$jung = $sum/2; // necessary to test for arc type
	
	/* values for grid, circle, and slices */ 
	
	$dx = $radius; // Starting point: 
	$dy = 0; // first slice starts in the East
	$oldangle = 0;
	
	/* Loop through the slices */
	for ($i = 0; $i<$max; $i++) {
		$angle = $oldangle + $values[$i]/$deg; // cumulative angle
		$x = cos(deg2rad($angle)) * $radius; // x of arc's end point
		$y = sin(deg2rad($angle)) * $radius; // y of arc's end point
		$colours = array('yellow','green','red','blue','grey','purple','green','red','blue','grey','purple','green','red','blue','grey','purple','green','red','blue','grey','purple','green','red','blue','grey','purple','green','red','blue','grey','purple','green','red','blue','grey','purple','green','red','blue','grey','purple','green','red','blue','grey','purple');
		$colour = $colours[$i];
	
		if ($values[$i] > $jung) {
			// arc spans more than 180 degrees
			$laf = 1;
		}
		else {
			$laf = 0;
		}
		 
		$w=$width; // canvas size
		$h=$height;
		$a="<svg width=\"$w\" height=\"$h\">";
		//$a.= "<rect width=\"$w\" height=\"$h\" style=\"fill:#FFF; stroke-width:3;stroke:rgb(10,0,0)\" />";
		$a.= "<rect width=\"$w\" height=\"$h\" style=\"fill:#FFF; stroke-width:3;stroke:rgb(10,0,0)\"  \>";
			 $a.= "<animate attributeName=\"height\" attributeType=\"XML\" from=\"100\" to=\"400\" begin=\"0s\" dur=\"3s\" fill=\"none\"/>";
			 $a.= "</rect>";
		$ax = $cx - $x; // absolute $x
		$ay = $cy - $y; // absolute $y
		$adx = $cx - $dx; // absolute $dx
		$ady = $cy - $dy; // absolute $dy
		$b .= "\n";
		$b .= "<path d=\"M$cx,$cy "; // move cursor to center
		$b .= " L$adx,$ady "; // draw line away away from cursor
		$b .= " A$radius,$radius 0 $laf,1 $ax,$ay "; // draw arc
		$b .= " z\" "; // z = close path
		$b .= " fill=\"$colour\" stroke=\"black\" stroke-width=\"2\" ";
		$b .= "  stroke-linejoin=\"round\" />";
		 
		$dx = $x; // old end points become new starting point
		$dy = $y; // id.
		$oldangle = $angle;
		 }
		 
		 
		$a.= $b; 
	$a.="</svg>";
	return $a.$c;
	//echo PieGraph();

}
}
?>