<?php



require_once("Lib_DocArea.php");
//require_once("Lib_Grid.php");

Class RadarGraph extends Graph {
 var $bar_space = 20;  
 
	function Draw(){ 
				///////////////////////////////////// BACK LINES ///////////////////////////////
		$valu[] = 20;
		$valu[] = 20;
		$valu[] = 20;
		$valu[] = 20; 
		$valu[] = 20;
		$valu[] = 20;
		$valu[] = 20;
		$valu[] = 20;	
		$valu[] = 20;
		$valu[] = 20;
		$valu[] = 20;
		$valu[] = 20;
		$valu[] = 20;
		$valu[] = 20;
 
		 
		$width = 300; // canvas size
		$height = 400; 
		$centerx = $width / 2; // centre of the pie chart
		$centery = $height / 2;
		$radius = min($centerx,$centery) - 10; // radius of the pie chart
		if ($radius < 10) {
			die("Your chart is too small to draw.");
		}  
		//$values =$this->GetValues();
		$values =$this->GetValues();
		array_unshift($values,"2","1");
	//	$values=$this->values;
		$max = count($values); 	
	$b = ""; 
	$data=$valu;
	//echo $this->values;
	$max1 = count($valu); 
	$cx=$centerx;
	$cy=$centery;
	$sum = 0;
	foreach ($data as $key=>$valu) {
		$sum += $valu; 
	}
	$deg = $sum/360; // one degree
	$jung = $sum/2;  
	$dx = $radius; // Starting point: 
	$dy = 0; // first slice starts in the East
	$oldangle = 0;
	
	/* Loop through the slices */
	for ($i = 0; $i<$max1; $i++) {
		$angle = $oldangle + $data[$i]/$deg; // cumulative angle
		$x = cos(deg2rad($angle)) * $radius; // x of arc's end point
		$y = sin(deg2rad($angle)) * $radius; // y of arc's end point
		if ($data[$i] > $jung) {
			// arc spans more than 180 degrees
			$laf = 1;
		}
		else {
			$laf = 0;
		}
		 
		$w=$width; // canvas size
		$h=$height;
		$a="<svg width=\"$w\" height=\"$h\">";
		 	$a.= "<rect width=\"$w\" height=\"$h\" style=\"fill:#FFF; stroke-width:3;stroke:rgb(10,0,0)\"  \>";
			$a.= "<animate attributeName=\"height\" attributeType=\"XML\" from=\"100\" to=\"400\" begin=\"0s\" dur=\"3s\" fill=\"none\"/>";
			$a.= "</rect>";
		$ax = $cx - $x; // absolute $x
		$ay = $cy - $y; // absolute $y
		$adx = $cx - $dx; // absolute $dx
		$ady = $cy - $dy; // absolute $dy 
		$b .= "<path d=\"M$cx,$cy "; // move cursor to center
		$b .= " L$adx,$ady "; // draw line away away from cursor
		$b .= " A$radius,$radius 0 0,1 $ax,$ay "; // draw arc
		$b .= " z\" "; // z = close path
		$b .= " fill=\"none\" stroke=\"black\" stroke-width=\"1\"  fill-opacity=\"0.4\"";
		$b .= "  stroke-linejoin=\"round\" />";
		  
		$dx = $x; // old end points become new starting point
		$dy = $y; // id.
		$oldangle = $angle;
		 }
			$a.= $b;
		  ///////////////////////////////////// BACK CRICLES ///////////////////////////////
			$rx ="";
			for ($i = 0; $i<10; $i++) { 
				$rx = $rx + 14;  
				$b.= "  <circle cx=\"150\" cy=\"200\" r=\"$rx\" stroke=\"black\" stroke-width=\"1\" fill=\"none\" fill-opacity=\"0.4\"/>";
			}	 
		  ///////////////////////////////////// POLAR  ///////////////////////////////
		  
		$radius = min($centerx,$centery) ; // radius of the pie chart
		if ($radius < 5) {
		die("Your chart is too small to draw.");
		}  
		$values =$this->GetValues();
  
		$max = count($values);
	 
		$cx=$centerx;
		$cy=$centery;
		$sum = 0;
		 
		$radius = min($centerx,$centery) - 90;
		$dy = 0;$oldangle = 0; $sum = 0;
		$cx=$centerx;
		$cy=$centery; 
		foreach ($values as $key=>$val) 
		{
			$sum += $val; 
		}
		$deg = $sum/360;  
		$jung = $sum/2;  
		$dx = $radius;  
		$dy = 0; // first slice starts in the East
		$oldangle = 0;
		$smax=max($values);
		$radius=$radius/$smax;
		
		for ($i = 0; $i<$max; $i++) {
			$r1=$radius*$values[$i]; 
			$angle = $oldangle + $values[$i]/$deg; // cumulative angle
			$x = cos(deg2rad($oldangle)) * $r1; // x of arc's end point
			$y = sin(deg2rad($oldangle)) * $r1; // y of arc's end point
			$x1 = cos(deg2rad($angle)) * $r1; // x of arc's end point
			$y1 = sin(deg2rad($angle)) * $r1; // y of arc's end point
			 
			$colours = array('yellow','black','red','pink','grey','purple','blue','blueviolet','brown','burlywood','cadetblue','coral','crimson','cyan','darkblue','darkgreen','darkkhaki','darkmagenta','darkolivegreen','darkorange','darkorchid','darksalmon','darkseagreen','darkslateblue','darkslategray','darkslategrey','darkturquoise','darkviolet','deeppink','deepskyblue','dodgerblue','firebrick','fuchsia','pink','grey','purple','black','red','pink','grey','purple','black','red','pink','grey','purple','black','red','pink','grey','purple','black','red','pink','grey','purple','black','red','pink','grey','purple','black','red','pink','grey','purple','black','red','pink','grey','purple','black','red','pink','grey','purple','black','red','pink','grey','purple','black','red','pink','grey','purple');
			$colour = $colours[$i];
		
			if ($values[$i] > $jung) { 
				$laf = 1;
			}
			else {
				$laf = 0;
			}
			$w=$width; // canvas size
			$h=$height;
			$a .="<svg width=\"$w\" height=\"$h\">";
		 
			$x += $cx;
			$y += $cy;
			$x1 += $cx;
			$y1 += $cy; 
			$b .= "\n"; 
			$b .= "<path d=\"M$cx,$cy "; // move cursor to center
			$b .= " L$x,$y "; // draw line away away from cursor
			$b .= " A$r1,$r1 0 $laf,1 $x1,$y1 "; // draw arc
			$b .= " z\" "; // z = close path
			$b .= " fill=\"$colour\" stroke=\"black\" stroke-width=\"2\" />";
			 
			$dx = $x; // old end points become new starting point
			$dy = $y; // id.
			$oldangle = $angle;
		}
		 
		   
	$a.= $b; 
	$a.="</svg>";
	return $a; 

}
}
?>