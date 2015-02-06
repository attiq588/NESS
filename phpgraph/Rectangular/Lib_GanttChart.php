<?php 
require_once("Lib_DocArea.php"); 

require_once('Lib_Grid.php');

class GanttChart extends Graph{
	var $bar_space = 20; 
	var $g_height=1200;
	var $g_width=800;
	
	function CalcAxes()

	{
		$v_max = $this->GetMaxValue();
		$this->g_height = $this->height - 20;
		$this->g_width = $this->width - 20;

		$values = $this->GetValues();
		$v_count = count($values);
		$MaxKey = $v_count+1;
 
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
		//$bar_style = array('stroke' => $this->stroke_colour);
		$bar = array('width' => $bar_width);
	 
		$bnum = 0;
		$b_start = 60 + ($this->bar_space / 2);
		
		 $ccount = count($this->colours);
		 $values = $this->GetValues();
		 $bar['y'] = 0;
		foreach($values as $key => $value) {
		
			$bar['x'] = $b_start + ($this->bar_unit_width * $bnum) -190;
			$bar['height'] = $value * $this->bar_unit_height;
			$bar['y'] = $bar['y']  + $this->g_height - $bar['height'] +30; 
			$bar['fill'] = $this->GetColour($bnum % $ccount);  
			$rect = "<g  transform=\"rotate(-90 85.00000000000004,160.00000000000003) \">" ;
			$rect .=$this->Element('rect',$bar); 
			 $bar['y']=$bar['y']-5;
			$rect .= "</g>" ;
			$body .= $rect; 
			
			++$bnum; 
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
				$var_1 ="";
				foreach($Text_h as $key2 => $text_h)
				{

					$key2=$key2+5;
					$var_1 .="\n <text x=\"$j\" y=\"$y\" font-family=\"Verdana\" fill=\"blue\" font-size=\"13\">" .$text_h;
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
			
			foreach($Text_v as $key2 => $text_v) 
			{ 
				$x = $b_start + ($this->bar_unit_width * $v);
				$y =$b_start +($this->g_height - $height )* $v ;
				$var_1.="\n <text x=\"20\" y=\"$x\" font-family=\"Verdana\" fill=\"blue\" font-size=\"13\">" .$text_v; 
				$var_1.= "\n</text>"; 
				++$v;
			}
			  
				//return $var_1; 
		return $body.$var_1;
			
			
	}

}
?>
