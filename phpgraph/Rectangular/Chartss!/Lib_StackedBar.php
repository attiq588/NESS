<?php

require_once('Lib_DocArea.php');
//require_once('Lib_Grid.php');

class StackedBar extends Graph {

	var $bar_space = 20;
	var $g_height=1200;
	var $g_width=800;
	
	function CalcAxes()

	{
		$v_max = $this->GetMaxValue();
		$this->g_height = $this->height - 20;
		$this->g_width = $this->width - 20;

		$values = $this->GetValues(); 
		$max = count($values);
		$MaxKey = $max+1; 
		
		$x_axis = new Axis($this->g_width, $MaxKey);
		$y_axis = new Axis($this->g_height, $v_max); 
	

		$this->bar_unit_width = $x_axis->Unit();
		$this->bar_unit_height = $y_axis->Unit(); 
		$this->axes_calc_done = true;
		
	} 
	function Draw()
	{
		$width = 400; // canvas size
		$height = 300;
		$this->CalcAxes(); 	
		$body="";
		$bar_width = ($this->bar_space >= $this->bar_unit_width ? '1' : $this->bar_unit_width - $this->bar_space);  
		//$bar = array('width' => $bar_width);
		$bnum = 0;
		$b_start = 60 + ($this->bar_space / 2); 
		$ccount = count($this->colours);
		$values = $this->GetValues();
		$max = count($values);
		$MaxKey = $max+1;
		
		foreach($values as $key => $value) {
		//echo "values h yeh omg  ".$Text;
			$x = $b_start + ($this->bar_unit_width * $bnum);
			$height = ($value * $this->bar_unit_height)/4;
			$y =($this->g_height - $height -10); 
			$fill = $this->GetColour($bnum % $ccount); 
			$var_1 = "<rect    x=\"$x\" y=\"$y\" width=\"20\" height=\"$height\" fill=\"red\" stroke=\"#000000\" 
							stroke-width=\"1\" stroke-dasharray=\"null\" stroke-linejoin=\"bavel\" stroke-linecap=\"square\"  id=\"svg_3\"/>";	
			$body .= $var_1; 
			++$bnum;
		}
		//=========================================================================================//
		$bnum1 = 0; 
		$values1 = $this->GetValues1(); 
		//$i=0;
		//echo "value".$values;
		for($i = 0; $i < count($MaxKey); ++$i) 
		{
			$x = $b_start + ($this->bar_unit_width * $bnum);
			$height = ($value * $this->bar_unit_height)/4;
			$y =($this->g_height - $height -10); 
			//echo "value".$values= ($values[$i]);
			foreach($values1 as $key => $value1) {
				
				$x1 = ($b_start + ($this->bar_unit_width * $bnum1)) ;
				$height1 = ($value1 * $this->bar_unit_height) / 4;
				$y1 =  ( $this->g_height - $height1 - 10 ) ; 
				$y1 .= ($y1 - $y)  ;
				$fill = $this->GetColour($bnum1 % $ccount); 
				$var_1 = "<rect    x=\"$x1\" y=\"$y1\" width=\"20\" height=\"$height1\" fill=\"blue\" stroke=\"#000000\" 
								stroke-width=\"1\" stroke-dasharray=\"null\" stroke-linejoin=\"bavel\" stroke-linecap=\"square\"  id=\"svg_3\"/>";	
				$body .= $var_1; 
				++$bnum1; 
			} 	
		} 
			//_________________________T E X T________________________

				//_________________________HORIZONTAL T E X T________________________
				//$var_2="";
				$h = 0;
				$txt_h = $this->GetMaxText_H();
				$Text_h = $this->GetText_H();
				$t_h = count($Text_h);
				$j=56;
				$y=390;
				
				foreach($Text_h as $key2 => $text_h)
				{

					$key2=$key2+5;
					$var_1.="\n <text x=\"$j\" y=\"$y\" font-family=\"Verdana\" fill=\"blue\" font-size=\"13\">" .$text_h;
					$var_1.= "\n</text>";
					++$h;
					$j=$j+56;
				//$y=$y-2;
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
			  
				return $body.$var_1;
			
			
	}

}
?>
