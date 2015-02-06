<?php

require_once('Lib_DocArea.php');
require_once('Lib_Grid.php');

		class Candle extends Graph {
		var $b=array();
		function Draw()
			{
			$width = 400; // canvas size
			$height = 400;
			$values =$this->GetValues();
			sort($values);
			$n = count($values);
			$HeighestValue=max($values);
			$LowestValue=min($values);

			$values=$this->GetValues();
			$n = count($values);
			if($n>4){
			$var_4="<svg>";
			$var_4.="\n <text x=\"30 \" y=\"40\" font-family=\"Verdana\" font-size=\"20\">" ."Please give only 4 values as one for (high,low,open,close)";

			$var_4.= "\n</text>";
			echo "error in values";
			echo $var_4;

			}
				else if($n=4){
	 
				if($n==0)
				{
					return null;
				}
	 
				if($n/2===0)
				{
					//sort($values,Sort_Numeric);
					$middleIndex=floor($n/2);
					$median=$values[$middleIndex];
					//echo "DataValues=".$data=$this->values;
					$Median=($n/2);
					$LowerQuar=(($values[$middleIndex])/4);
					$UpperQuar=(3*($values[$middleIndex])/4);
				}
				//_________________________________________________
				else 
				{
					$middleIndex=floor($n/2);
					$median=$values[$middleIndex];
					$LowerQuar=(($values[$middleIndex]+1)/4);
					$UpperQuar=(3*($values[$middleIndex]+1)/4);
				}
				$w=$width; // canvas size
				$h=$height;

				$var_1="<svg width=\"$w\" height=\"$h\">";
				//$var_1.= "<line transform=\"rotate(-45 101.49999999999997,101.50000000000003)\" x1=\"-9\" y1=\"182\" x2=\"13.9\" y2=\"205\" style=\"stroke:rgb(0,0,0);stroke-width:2\" />";

				$var_1.= "\n<g transform=\"translate(110,250) scale(1,-1)\" >";
				$UpperQ=$UpperQuar*2;
				$UpperQ2=$UpperQuar-25;
				$y2= $median + $LowerQuar; //110
				$x= $n * 3 ;
				$y1= $middleIndex * (-15) ;// -30

				$var_1.=" <line y2=\"$y2\" x2=\"$x\" y1=\"$y1\" x1=\"$x\" stroke-width=\"2\" stroke=\"red\" fill=\"none\"/>";

				//Q1 to Q2
				$var_1.= " <rect x1=\"$LowerQuar\" y1=\"90\" width=\"30\" height=\"$median\" fill=\"#FF0000\" stroke=\"#000000\" stroke-width=\"2\" stroke-dasharray=\"null\" stroke-linejoin=\"null\" stroke-linecap=\"null\" id=\"svg_3\"/>";
				//Q2 to Q3
				$Upper = $UpperQuar * -1;
				//$var_1.="<line x1=\"$Upper\" y1=\"$Upper\" x2=\"50\" y2=\"$Upper\" style=\"stroke:blue;stroke-width:2\" />";

				$var_1.= " <rect x1=\"$median\" y1=\"90\" width=\"30\" height=\"$UpperQuar\" fill=\"blue\" stroke=\"#000000\" stroke-width=\"2\" stroke-dasharray=\"null\" stroke-linejoin=\"null\" stroke-linecap=\"null\" id=\"svg_3\"/>";

				$var_1 .= "</g>" ;

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
			  
				return $var_1;
	 
				}
				}
			}

?>