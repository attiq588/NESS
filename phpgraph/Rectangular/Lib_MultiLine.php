<?php

	Class MultiLine extends Graph{

		function Draw() {
		$width = 400; // canvas size
		$height = 400; 
		$var_2 = "";
		$values=$this->GetValues();  
		$n = count($values); 
		array_push($values,"0");
		$maxVal = $this->GetMaxValue();
		
		$values1=$this->GetValues1();
		$n1 = count($values1);
		array_push($values1,"0");
		$maxVal1 = $this->GetMaxValue1();

		$var_2 = "\n<g transform=\"translate(10,370) scale(1,-1)\" >";
		$var_2 .= "\n" ; 
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////
		$var_2 .= "<polyline points=\"";
			 
			$var_2 .= "50" . " " . "0" . ", "; 

			for ($i=0; $i<$n ; $i++)
			$var_2 .= (($i+5)*20) . " " . $values[$i] . ", "; 
			$var_2 = substr($var_2,0,-2);
			$var_2 .= "\" style=\"fill:  none; stroke:red;\" />\n";
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////		
		$var_2 .= "<polyline points=\"";
		$var_2 .= "50" . " " . "0" . ", ";
 
		for ($i=0; $i<$n ; $i++) 
			$var_2 .= (($i+5)*20) . " " . $values1[$i] . ", "; 
			$var_2 = substr($var_2,0,-2);
			$var_2 .= "\" style=\"fill: none; stroke:blue;\" />\n";
			 
			$var_2 .= "</g>" ;
 
		 
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
			$var_2.="\n <text x=\"$j\" y=\"$y\" font-family=\"Verdana\" fill=\"blue\" font-size=\"13\">" .$text_h;
			$var_2.= "\n</text>";
			++$h;
			$j=$j+56; 
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
			$var_2.="\n <text x=\"$x\" y=\"$y\" font-family=\"Verdana\" fill=\"red\" font-size=\"13\">" .$text_v;
			$var_2.= "\n</text>";
			++$v;
			$y=$y-50;
		}
		 
		return $var_2;
 
	}
}
?>