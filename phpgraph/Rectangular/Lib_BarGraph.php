<?php

require_once('Lib_DocArea.php');
require_once('Lib_Grid.php');


class BarGraph extends Graph {

	var $bar_space = 10; 
	var $g_height=1200;
	var $g_width=900;
	
	function CalcAxes()

	{
		$v_max = $this->GetMaxValue();
		$this->g_height = $this->height - 20;
		$this->g_width = $this->width - 20;

		$values = $this->GetValues();
		$v_count = count($values);
		$MaxKey = $v_count+150;
 
		$x_axis = new Axis($this->g_width, $MaxKey);
		$y_axis = new Axis($this->g_height, $v_max); 
	

		$this->bar_unit_width = $x_axis->Unit();
		$this->bar_unit_height = $y_axis->Unit(); 
		$this->axes_calc_done = true;
		
	} 
	function Draw()
	{
		$width = 400; // canvas size
		$height = 400;
		$this->CalcAxes(); 
 
	 
		$body="";
		$bar_width = ($this->bar_space >= $this->bar_unit_width ? '1' : $this->bar_unit_width - $this->bar_space); 
		//$bar_style = array('stroke' => $this->stroke_colour);
		$bar = array('width' => $bar_width);
	 
		$bnum = 0;
		$b_start = 45 + ($this->bar_space / 2);
		
		 $ccount = count($this->colours);
		 $values = $this->GetValues();
		 
		foreach($values as $key => $value) {
	 
			$bar['x'] = $b_start + ($this->bar_unit_width * $bnum);
			$bar['height'] = $value * $this->bar_unit_height;
			$bar['y'] = 90 + $this->g_height - $bar['height']; 
			$bar['fill'] = $this->GetColour($bnum % $ccount + $bnum);  
			$rect =$this->Element('rect',$bar); 
			$body .= $rect; 
			
			++$bnum; 
		}
								//_________________________T E X T________________________		
			 	
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
			$y =(100+$this->g_height - $height );
			$var_1 .="\n <text x=\"$x \" y=\"390\" font-family=\"Verdana\" fill=\"black\" font-size=\"6\">" .$text_h; 
			$var_1 .= "\n</text>"; 
			
			++$h;
		}
		$l = 0;
	
		//_________________________VERTICAL T E X T________________________
		$v=0;
				$txt_v = $this->GetMaxText_V();
				$Text_v = $this->GetText_V();
				$t_v = count($Text_v);

				$y=350;
				$x=15;
				//$values=array_reverse($Text_v);

				foreach($Text_v as $key1 => $text_v)
				{
				 
					$key1=$key1+10;
					$var_1.="\n <text x=\"$x\" y=\"$y\" font-family=\"Verdana\" fill=\"blue\" font-size=\"10\">" .$text_v;
					$var_1.= "\n</text>";
					++$v;
					$y=$y-49;
				}
			
		return $body.$var_1;
			
			
	}

}
?>
