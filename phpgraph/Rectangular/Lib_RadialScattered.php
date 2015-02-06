<?php



require_once("Lib_DocArea.php");
require_once("Lib_Grid.php");

Class RadialScattered extends Graph{
	var $bar_space = 20;  
 
	function Draw(){ 
	
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
		//$values=$this->values;
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
			//$a.= "<animate attributeName=\"height\" attributeType=\"XML\" from=\"100\" to=\"400\" begin=\"0s\" dur=\"3s\" fill=\"none\"/>";
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
			$rx ="";
			$ry ="";
 ///////////////////////////////////// BACK CRICLES ///////////////////////////////
			for ($i = 0; $i<10; $i++) { 
				$rx = $rx + 14;  
				$a.= "  <circle cx=\"150\" cy=\"200\" r=\"$rx\" stroke=\"black\" stroke-width=\"1\" fill=\"none\" fill-opacity=\"0.4\"/>";
			}	//____________________________________	
///////////////////////////////////// POINTS ///////////////////////////////
		 $v_max = $this->GetMaxValue();
		$this->g_height = $this->height - 150;
		$this->g_width = $this->width - 150;

		$values = $this->GetValues();
		$v_count = count($values);
		$MaxKey = $v_count+1;

		$x_axis = new Axis($this->g_width, $MaxKey);
		$y_axis = new Axis($this->g_height, $v_max); 
	 
		$this->bar_unit_width = $x_axis->Unit();
		$this->bar_unit_height = $y_axis->Unit(); 
		$this->axes_calc_done = true;
			$sum=0;
			$bnum=0; 
			$bar_width = ($this->bar_space >= $this->bar_unit_width ? '1' : 
			$this->bar_unit_width - $this->bar_space);  
			$bar = array('width' => $bar_width); 
			$b_start = 60 + ($this->bar_space / 2);
		 
			$values = $this->GetValues();
			$sum = 1;
			foreach($values as $key => $value) {
			$rad = $value/$sum * 20;	 
			$sum += $value;  
			$x = $b_start + ($this->bar_unit_width * $bnum) +20;
			$height = $value * $this->bar_unit_height+120;
			$y = $this->g_height - 80; 
			//$m= $values[$i];
			$u=5*$i;
			$a.= "<defs>";
			$a.= "<clipPath id=\"clipPath3\">";
			$a.= "<circle cx=\"150\" cy=\"200\" r=\"140\" stroke=\"black\" stroke-width=\"1\" fill=\"none\" fill-opacity=\"0.4\"/>";
			$a.= "</clipPath>";
			$a.= "</defs>";
			 
			$a .= "  <defs>";
			$a .= " <radialGradient  id=\"grad2\" cx=\"50%\" cy=\"50%\" r=\"70%\" fx=\"50%\" fy=\"50%\">";
			$a .= "  <stop offset=\"0%\" style=\"stop-color:rgb(255,255,0);stop-opacity:1\" />";
			$a .= "  <stop offset=\"100%\" style=\"stop-color:rgb(255,0,250);stop-opacity:1\" />";
			$a .= " </radialGradient >";
			$a .= " </defs>";
			$a .= " <circle cx=\"$x\" cy=\"$height\" r=\"$rad\" stroke=\"black\" stroke-width=\"2\" fill-opacity=\"0.8\"
					style=\" fill:url(#grad2); clip-path: url(#clipPath3);\">";
			
			$a .= "<animate attributeName=\"r\" from=\"0\" to=\"$rad\" dur=\"3s\"/>";
			$a .= "<animate attributeName=\"stroke-width\" from=\"0\" to=\"2\" dur=\"3s\"/>";
			$a .= "</circle>";
			
			++$bnum; 
			 }		
	  
	$a.="</svg>";
	return $a; 

}
}
?>