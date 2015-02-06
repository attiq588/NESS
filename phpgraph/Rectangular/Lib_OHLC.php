<?php

require_once('Lib_DocArea.php');
require_once('Lib_Grid.php');

class OHLC extends Graph {

	function draw()
		{
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

			 
			$high=$values[0]; 
			//$low=$values[1]; 
$low=$high/2;
			$open=$values[2];
			$close=$values[3];

			$var="<svg height=\"210\" width=\"500\" >";
			
			//$high=$high+50;
			$x1=100;
			if($high<$x1){
				$high=$x1;
			}
			$low=$low+100;
			$low1=$low+10;
			$high1=$high-10;
			$var="<line x1=\"100\" y1=\"$low1\" x2=\"100\" y2=\"$high1\" style=\"stroke:rgb(255,0,0);stroke-width:2\" />";
			//$Low=min($values);
			$var1="";
			$var2="";
			
			if($open <50)
			{
				$open=$open+50;
			}
			if($close>100 || $close<150)
			{
				$close=$close-50;
			}
			else if($close>150||$close<200)
			{
				$close=$close-100;
			}
			else if($close>200 || $close>250)
			{
				$close=$close -130;
			}
			else if($close>250){
				$var_5="<svg>";
				$var_5.="\n <text x=\"30 \" y=\"40\" font-family=\"Verdana\" font-size=\"20\">" ."Please give CLOSE value is less than 250"; 

				$var_5.= "\n</text>"; 
				echo "error in values"; 
			}
			
			
		
			/* if($close>$open){

				$var_5="<svg>";
				$var_5.="\n <text x=\"30 \" y=\"40\" font-family=\"Verdana\" font-size=\"20\">" ."error in values"; 

				$var_5.= "\n</text>"; 
				echo "error in values";
				echo $var_5;

			} */
			//green mai x2 same ho
			//nd blue mai x1
			
			
			
			if($close<101 ||$close=101){
			$close=$close+101;
			
			}
			
			/* if($low>$high){
			
			

				$var_5="<svg>";
				$var_5.="\n <text x=\"30 \" y=\"40\" font-family=\"Verdana\" font-size=\"20\">" ."error in values"; 

				$var_5.= "\n</text>"; 
				echo "error in values";
				echo $var_5;

			} */
			 if($high>200){
			$var_5="<svg>";
				$var_5.="\n <text x=\"30 \" y=\"40\" font-family=\"Verdana\" font-size=\"20\">" ."error in values"; 

				$var_5.= "\n</text>"; 
				echo "error in values";
				echo $var_5;
			} 
			
			if($open>=100){
			$open=90;
			
			}
			if($close>=100){
			$close=130;
			
			}
			
			$var1="<line x1=\"$open\" y1=\"$high\" x2=\"100\" y2=\"$high\" style=\"stroke:green;stroke-width:2\" />";
			$var2="<line x1=\"$close\" y1=\"$low1\" x2=\"100\" y2=\"$low1\"    style=\"stroke:blue;stroke-width:2\" />";
			 
		
			
		
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
			$var1.="\n <text x=\"$j\" y=\"$y\"    font-family=\"Verdana\" fill=\"blue\" font-size=\"13\">" .$text_h; 
			$var1.= "\n</text>"; 
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
			//$x = $b_start + ($this->bar_unit_width * $v);
			
			$key1=$key1+5;
			$var1.="\n <text x=\"$x\" y=\"$y\" font-family=\"Verdana\" fill=\"red\" font-size=\"13\">" .$text_v; 
			$var1.= "\n</text>"; 
			++$v;
			$y=$y-80;
		}
			$var1 .= "";
			$var1 .= "\n<g transform=\"translate(10,370) scale(1,-1)\" >"; 
			$var1 .= "\n<line x1=\"40\" y1=\"0\" x2=\"370\" y2=\"0\" style=\"stroke: black; stroke-width:2;\"/>";
			$var1 .= "\n" ;
			

  //<line id="svg_1" y2="12" x2="61" y1="371" x1="61" stroke-width="5" stroke="red" fill="none"/>
			
			$var1 .= "</g>" ; 
			
			$var1 .= "<line y2=\"0\" x2=\"50\" y1=\"371\" x1=\"50\" style=\"stroke: black; stroke-width:2;\"/>";
 
			//y-axis labels

 
			return $var.$var1.$var2;
			}
 
		}

}

?>