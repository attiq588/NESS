<?php

Class MultiScattered extends Graph{ 


	function Draw() {

		$width = 400; // canvas size
		$height = 400; 
		$var_2 = "";
		$values=$this->GetValues();
		$n1 = count($values);
			$values1=$this->GetValues1();
		$n = count($values1);
		
		$maxVal = $this->GetMaxValue(); 
		$var_2 .= "<defs>";
        $var_2 .= "<marker id = \"circle\" viewBox = \"0 0 12 12\" 
					refX = \"15\" refY = \"8\" markerWidth = \"9\" markerHeight = \"9\" stroke = \"green\" 
					stroke-width = \"2\" fill = \"red\" orient = \"auto\">";
        $var_2 .= " <circle cx = \"6\" cy =\"6\" r = \"5\"/>";
        $var_2 .= "</marker>";
		$var_2 .= " <marker id = \"cross\" viewBox = \"0 0 10 10\" refX = \"15\" 
					 refY = \"8\" markerUnits = \"strokeWidth\" markerWidth = \"9\" markerHeight = \"9\" 
					 stroke = \"red\" stroke-width = \"2\" fill = \"green\" orient = \"auto\">";
        $var_2 .= "     <path d = \"M 0 0 L 10 10 M 0 10 L 10 0\"/>";
        $var_2 .= " </marker>";
        $var_2 .= " <marker id = \"rectangle\" viewBox = \"0 0 10 10\" refX = \"15\" 
					 refY = \"8\" markerUnits = \"strokeWidth\" markerWidth = \"9\" markerHeight = \"9\"
					 stroke = \"black\" stroke-width = \"2\" fill = \"blue\">";
        $var_2 .= "    <rect x = \"0\" y = \"0\" width = \"20\" height = \"20\"/>";
        $var_2 .= " </marker>";
		$var_2 .= "</defs>";
		
		$var_2 .= "\n<g transform=\"translate(10,370) scale(1,-1)\" >";
			$var_2 .= "\n" ; 

			$var_2 .= "<polyline points=\"";

			$var_2 .= "50" . " " . "0" . ", "; 

			for ($i=0; $i<$n1 ; $i++)
				$var_2 .= (($i+5)*20) . " " . $values[$i] . ", ";

				$var_2 = substr($var_2,0,-2);
				 $var_2 .= "\" style=\"fill: none; stroke-opacity: 0.1; stroke: none; stroke-linecap: bevel; stroke-width:1; 
								 stroke-linejoin:miter;  marker-start = \"url(#rectangle)\" marker-mid = \"url(#rectangle)\"
								marker-end = \"url(#rectangle)\"
								stroke-dashoffset:10;\" />\n";
								
									$var_2 .= "<polyline points=\"";
									
									
									
							
									
									

			$var_2 .= "50" . " " . "0" . ", "; 

			for ($i=0; $i<$n ; $i++)
				$var_2 .= (($i+5)*20) . " " . $values1[$i] . ", ";

				$var_2 = substr($var_2,0,-2);
				$var_2 .= "\" style=\"fill: none; stroke-opacity: 0.1; stroke: none; stroke-linecap: bevel; stroke-width:1; 
								 stroke-linejoin:miter;  marker-start = \"url(#circle)\" marker-mid = \"url(#circle)\"
								marker-end = \"url(#circle)\"
								stroke-dashoffset:10;\" />\n";
			$var_2 .= "</g>" ;

		//_________________________T E X T________________________ 
		 
				//_________________________HORIZONTAL T E X T________________________
				//$var_2="";
				$h = 0;
				$txt_h = $this->GetMaxText_H();
				$Text_h = $this->GetText_H();
				$t_h = count($Text_h);
				$j=56;
				$y=390;
				$var_1="";
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
			  
				return $var_2.$var_1;
}
}
?>