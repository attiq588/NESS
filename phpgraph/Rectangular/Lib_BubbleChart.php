<?php 
require_once("Lib_DocArea.php"); 

require_once('Lib_Grid.php');

class  BubbleChart  extends Grid {
var $bar_space = 15;  
	
	function CalcAxes()

	{
		$v_max = $this->GetMaxValue();
		$this->g_height = 400;
		$this->g_width = 400;

		$values = $this->GetValues();
		$v_count = count($values);
		$MaxKey = $v_count;

		$x_axis = new Axis($this->g_width, $MaxKey);
		$y_axis = new Axis($this->g_height, $v_max); 
	

		$this->bar_unit_width = $x_axis->Unit();
		$this->bar_unit_height = $y_axis->Unit(); 
		$this->axes_calc_done = true;
		
	} 
	function Draw()
	{
		$width = 500; // canvas size
		$height = 400;
		$this->CalcAxes(); 
	    
		$body="";
		$bar_width = ($this->bar_space >= $this->bar_unit_width ? '1' :
		$this->bar_unit_width - $this->bar_space);
		$bar = array('width' => $bar_width);

		$bnum = 0;
		$b_start = 50 + ($this->bar_space / 2); 
		$values = $this->GetValues();
		//array_unshift($values,"2","1"); 
		$sum = 1;
			$var_2 = "  <defs>";
			$var_2 .= " <radialGradient  id=\"grad2\" cx=\"50%\" cy=\"50%\" r=\"70%\" fx=\"50%\" fy=\"50%\">";
			$var_2 .= "  <stop offset=\"0%\" style=\"stop-color:rgb(255,255,0);stop-opacity:1\" />";
			$var_2 .= "  <stop offset=\"100%\" style=\"stop-color:rgb(255,0,250);stop-opacity:1\" />";
			$var_2 .= " </radialGradient >";
			$var_2 .= " </defs>";
			
			$var_2.= "<defs>";
			$var_2.= "<clipPath id=\"clipPath4\">";
			$var_2.= "<rect  x=\"40\" y=\"90\" width=\"$width\" height=\"$height\" style=\"fill:yellow; stroke-width:3; stroke:rgb(10,0,0) fill-opacity:0.2; \"  \>";
			$var_2.= "</clipPath>";
			$var_2.= "</defs>";
		
		foreach($values as $key => $value) {
			//b_start=70
			$rad = $value/$sum *0.7 ;
			//$sum += $value;
			$x = $b_start + ($this->bar_unit_width * $bnum) +20;
			$height = $value * $this->bar_unit_height+120;
			$y = $this->g_height - 80;
			$var_1 = "\n<g transform=\"translate(10,460) scale(1,-1)\" >";
				  $u=5*$bnum;
							
			$var_1 .= " <circle cx=\"$x\" cy=\"$height\" r=\"$rad\" stroke=\"black\" stroke-width=\"2\" fill-opacity=\"0.6\"
					style=\" fill:url(#grad2); clip-path: url(#clipPath4);\">";
			
			$var_1 .= "<animate attributeName=\"r\" from=\"0\" to=\"$rad\" dur=\"1s\"/>";
			$var_1 .= "<animate attributeName=\"stroke-width\" from=\"0\" to=\"2\" dur=\"1s\"/>";
			$var_1 .= "</circle>";
			$var_1 .= "</g>" ;
			$body .= $var_1;
			++$bnum;

		}   
			
			//_________________________HORIZONTAL T E X T________________________
			$var_1="";
			$h = 0; 
			$txt_h = $this->GetMaxText_H();
			$Text_h = $this->GetText_H();
			$t_h = count($Text_h); 
		foreach($Text_h as $key1 => $text_h)
		{
			$x = $b_start + ($this->bar_unit_width * $h);
			$height = $text_h * $this->bar_unit_height;
			$y =(120+$this->g_height - $height );
			$var_1 .="\n <text x=\"$x \" y=\"390\" font-family=\"Verdana\" fill=\"red\" font-size=\"10\">" .$text_h; 
			$var_1 .= "\n</text>"; 
			
			++$h;
		}
		 
		//_________________________VERTICAL T E X T________________________
				$v=0;
				$txt_v = $this->GetMaxText_V();
				$Text_v = $this->GetText_V();
				$t_v = count($Text_v);

				$y=361;
				$x=18;
				//$values=array_reverse($Text_v);

				foreach($Text_v as $key1 => $text_v)
				{
				 
					$key1=$key1+5;
					$var_1.="\n <text x=\"$x\" y=\"$y\" font-family=\"Verdana\" fill=\"red\" font-size=\"13\">" .$text_v;
					$var_1.= "\n</text>";
					++$v;
					$y=$y-50;
				}
		return $body.$var_2.$var_1; 
			
	}

}
?>
